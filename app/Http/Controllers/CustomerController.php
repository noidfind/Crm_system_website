<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'tax_number' => 'nullable|string|max:255',
            'tax_office' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        Customer::create([
            'company_name' => $request->company_name,
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'tax_number' => $request->tax_number,
            'tax_office' => $request->tax_office,
            'notes' => $request->notes
        ]);

        return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla oluşturuldu.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'tax_number' => 'nullable|string|max:255',
            'tax_office' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $customer->update($request->except('password'));

        if ($request->filled('password')) {
            $customer->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla güncellendi.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla silindi.');
    }
}
