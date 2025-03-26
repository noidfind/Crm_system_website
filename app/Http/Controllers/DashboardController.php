<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Task;
use App\Models\Project;
use App\Models\SupportTicket;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $data = [
            'totalCustomers' => Customer::count(),
            'activeProjects' => Project::where('status', 'active')->count(),
            'pendingTasks' => Task::where('status', 'pending')->count(),
            'openTickets' => SupportTicket::where('status', 'open')->count(),
        ];

        return view('admin.dashboard', $data);
    }

    public function userDashboard()
    {
        $user = auth()->user();
        
        $data = [
            'assignedTasks' => Task::where('assigned_to', $user->id)
                                 ->where('status', 'pending')
                                 ->count(),
            'activeProjects' => Project::where('status', 'active')->count(),
            'supportTickets' => SupportTicket::where('assigned_to', $user->id)
                                           ->where('status', 'open')
                                           ->count(),
            'upcomingTasks' => Task::where('assigned_to', $user->id)
                                  ->where('status', 'pending')
                                  ->where('due_date', '>=', Carbon::now())
                                  ->orderBy('due_date', 'asc')
                                  ->take(5)
                                  ->get(),
            'recentTickets' => SupportTicket::where('assigned_to', $user->id)
                                          ->where('status', 'open')
                                          ->orderBy('created_at', 'desc')
                                          ->take(5)
                                          ->get(),
        ];

        return view('dashboard', $data);
    }
} 