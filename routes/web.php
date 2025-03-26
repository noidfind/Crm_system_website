<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerReservationController;
use App\Http\Controllers\CustomerBookingController;
use App\Http\Controllers\CustomerSupportController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Giriş yapmamış kullanıcılar için
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/', [LoginController::class, 'login'])->name('login.post');
});

// Giriş yapmış kullanıcılar için
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin ve User rotaları
    Route::middleware(['role:admin,user'])->group(function () {
        Route::resource('customers', CustomerController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('opportunities', OpportunityController::class);
        Route::resource('tasks', TaskController::class);
    });

    // Sadece Admin rotaları
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });

    // Tüm kullanıcılar için
    Route::resource('tickets', SupportTicketController::class);

    // Müşteri Paneli Route'ları
    Route::prefix('customer')->middleware('customer')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
        Route::get('/reservations', [CustomerReservationController::class, 'index'])->name('customer.reservations');
        Route::get('/bookings', [CustomerBookingController::class, 'create'])->name('customer.bookings.create');
        Route::get('/support', [CustomerSupportController::class, 'index'])->name('customer.support');
        Route::get('/profile', [CustomerProfileController::class, 'index'])->name('customer.profile');
    });

    // Projeler
    Route::resource('projects', ProjectController::class);
});