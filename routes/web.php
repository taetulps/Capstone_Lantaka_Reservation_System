<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController; 
use App\Http\Controllers\AccountController; 

/* --- Public Routes --- */
Route::get('/', function () {
    return view('index');
})->name('index');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Signup Routes
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('register.post'); // Handle form submission


/* --- Protected Routes (Requires Login) --- */
Route::middleware(['auth'])->group(function () {

    // Employee & Admin Access
    Route::middleware(['role:admin,staff'])->group(function () {
        
        Route::get('/employee_dashboard', function () {
            return view('employee_dashboard');
        })->name('employee_dashboard');

        Route::get('/employee_reservations', function () {
            return view('employee_reservations');
        })->name('employee_reservations');

        Route::get('/employee_accounts', [AccountController::class, 'index'])->name('employee_accounts');
        
       
    });

   
});