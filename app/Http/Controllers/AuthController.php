<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,user,customer'
        ]);

        $role = $credentials['role'];
        unset($credentials['role']);

        if ($role === 'customer') {
            $customer = Customer::where('email', $credentials['email'])->first();
            if ($customer && Hash::check($credentials['password'], $customer->password)) {
                Auth::guard('customer')->login($customer);
                return redirect()->route('customer.dashboard');
            }
        } else {
            $user = User::where('email', $credentials['email'])
                       ->where('role', $role)
                       ->first();
            if ($user && Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                return redirect()->route($role . '.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,customer'
        ]);

        if ($request->role === 'customer') {
            $customer = Customer::create([
                'company_name' => $request->company_name,
                'contact_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'tax_number' => $request->tax_number,
                'tax_office' => $request->tax_office
            ]);

            Auth::guard('customer')->login($customer);
            return redirect()->route('customer.dashboard');
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            Auth::login($user);
            return redirect()->route('user.dashboard');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
