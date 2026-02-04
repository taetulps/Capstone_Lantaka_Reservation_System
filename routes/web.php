<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController; 
use App\Http\Controllers\AccountController; 

/* --- 1. Public Routes --- */
Route::get('/', function () {
    return view('index');
})->name('index');

/* --- 2. Login & Signup --- */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('register.post');


/* --- 3. Protected Routes (SECURE) --- */
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['role:admin,staff'])->group(function () {
        
        Route::get('/employee_dashboard', function () {
            return view('employee_dashboard');
        })->name('employee_dashboard');

        Route::get('/employee_accounts', [AccountController::class, 'index'])->name('employee_accounts');

        Route::get('/employee_reservations', function () {
            return view('employee_reservations');
        })->name('employee_reservations');

        Route::get('/employee_room_venue', function () {
            return view('employee_room_venue');
        })->name('employee_room_venue');
    });


});
  Route::get('/client_room_venue', function () {
        return view('client_room_venue');
    })->name('client_room_venue');

  Route::get('/client_room_venue_viewing', function () {
        return view('client_room_venue_viewing');
    })->name('client_room_venue_viewing');