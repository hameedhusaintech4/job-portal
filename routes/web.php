<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    $user = Auth::user();

    if (!$user) {
        return view('welcome');
    }

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($user->role === 'employer') {
        return redirect('/employer/dashboard');
    } else {
        return redirect('/employee/dashboard');
    }
});

//  LOGIN PAGES
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/admin/login', function () {
    return view('auth.admin-login');
});

Route::get('/employer/login', function () {
    return view('auth.employer-login');
});


Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::prefix('employer')->middleware(['auth','role:employer'])->group(function () {
    Route::get('/dashboard', function () {
        return "Employer Dashboard";
    });
});

Route::prefix('employee')->middleware(['auth','role:employee'])->group(function () {
    Route::get('/dashboard', function () {
        return "Employee Dashboard";
    });
});
