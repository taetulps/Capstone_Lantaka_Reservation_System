<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController; 
use App\Http\Controllers\AccountController; 
use App\Http\Controllers\RoomVenueController;
use App\Http\Controllers\ReservationController;

/* --- 1. Public Routes --- */
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/client_room_venue', [RoomVenueController::class, 'index'])->name('client_room_venue');
Route::get('/view/{category}/{id}', [RoomVenueController::class, 'show'])->name('client.show');


Route::get('/client_my_bookings', [ReservationController::class, 'checkout'])->name('client_my_bookings');

Route::get('/client_my_reservations', function () {
    return view('client_my_reservations');
})->name('client_my_reservations');

Route::get('/client_food_option', function () {
    return view('client_food_option');
})->name('client_food_option');

// Add this under your other public routes
Route::get('/checkout/{category}/{id}', [App\Http\Controllers\RoomVenueController::class, 'show'])->name('client.show');

/* --- 2. Login & Signup --- */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('register.post');

Route::post('/signup', [SignupController::class, 'store'])->name('register.post');



/* --- 3. Protected Routes (SECURE) --- */
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // 1. The Checkout Page (calculates price)
    Route::get('/checkout', [ReservationController::class, 'checkout'])->name('checkout');
    
    // 2. The Action to Save the Reservation
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    
    // 3. My Reservations (Shows database data instead of static view)
    Route::get('/client_my_reservations', [ReservationController::class, 'index'])->name('client_my_reservations');

    Route::middleware(['role:admin,staff'])->group(function () {
        
        Route::get('/employee_dashboard', function () {
            return view('employee_dashboard');
        })->name('employee_dashboard');

        Route::get('/employee_accounts', [AccountController::class, 'index'])->name('employee_accounts');

        //  Now shows real reservations from the database
        Route::get('/employee_reservations', [ReservationController::class, 'adminIndex'])
             ->name('employee_reservations');

        Route::get('/employee_room_venue', [RoomVenueController::class, 'adminIndex'])
             ->name('employee_room_venue');
    });

    Route::post('/employee_room_venue/store', [RoomVenueController::class, 'store'])->name('room_venue.store');


});
  
// TEST ONLY DO NOT TOUCH (CALENDAR)
Route::get('/test_client_room_venue_viewing', function () {
    return view('test_client_room_venue_viewing');
})->name('test_client_room_venue_viewing');
// TEST ONLY DO NOT TOUCH (CALENDAR)
