<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['customer', 'assignedTo'])->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        return view('projects.create', compact('customers', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,cancelled',
            'priority' => 'required|in:urgent,high,medium,low',
            'customer_id' => 'nullable|exists:customers,id',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $project = Project::create([
            ...$validated,
            'created_by' => auth()->id()
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Proje başarıyla oluşturuldu.');
    }

    public function edit(Project $project)
    {
        $customers = Customer::all();
        $users = User::all();
        return view('projects.edit', compact('project', 'customers', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,cancelled',
            'priority' => 'required|in:urgent,high,medium,low',
            'customer_id' => 'nullable|exists:customers,id',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Proje başarıyla güncellendi.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Proje başarıyla silindi.');
    }
} 