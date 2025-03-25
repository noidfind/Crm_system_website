<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.admin');
    }

    public function userDashboard()
    {
        return view('dashboard.user');
    }

    public function customerDashboard()
    {
        return view('dashboard.customer');
    }
}
