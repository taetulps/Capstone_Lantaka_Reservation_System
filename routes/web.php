<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController; 
use App\Http\Controllers\AccountController; 
use App\Http\Controllers\RoomVenueController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FoodController;

/* --- 1. Public Routes --- */
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/client_room_venue', [RoomVenueController::class, 'index'])->name('client_room_venue');
Route::get('/view/{category}/{id}', [RoomVenueController::class, 'show'])->name('client.show');

Route::get('/client_my_bookings', [ReservationController::class, 'checkout'])->name('client_my_bookings');

// Note: Removed the duplicate static 'client_my_reservations' route here to prevent conflicts!

Route::get('/client/food-options', [FoodController::class, 'showFoodOptions'])->name('client.food.options');

Route::get('/booking/prepare', [RoomVenueController::class, 'prepareBooking'])->name('booking.prepare');

Route::get('/checkout/{category}/{id}', [RoomVenueController::class, 'show'])->name('client.show');

/* --- 2. Login & Signup --- */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('register.post');
// Note: Removed the second duplicated signup route here.


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
            // Fetch the food for the dashboard modal
            $foods = \App\Models\Food::all()->groupBy('food_category');
            return view('employee_dashboard', compact('foods'));
        })->name('employee_dashboard');

        Route::get('/employee_accounts', [AccountController::class, 'index'])->name('employee_accounts');

        Route::get('/employee_reservations', [ReservationController::class, 'adminIndex'])
             ->name('employee_reservations');

        Route::get('/employee_room_venue', [RoomVenueController::class, 'adminIndex'])
             ->name('employee_room_venue');
             
        // ⭐ ADDED THIS: Now Laravel knows how to open your Employee Food Menu
        Route::get('/employee_food', [FoodController::class, 'showEmployeeFood'])->name('employee.food');
        
        // ⭐ MOVED THIS: Moved your Add Food route here so ONLY employees can add food to the database
        Route::post('/admin/food/store', [FoodController::class, 'store'])->name('admin.food.store');
    });

    Route::post('/employee_room_venue/store', [RoomVenueController::class, 'store'])->name('room_venue.store');

});
  
// TEST ONLY DO NOT TOUCH (CALENDAR)
Route::get('/test_client_room_venue_viewing', function () {
    return view('test_client_room_venue_viewing');
})->name('test_client_room_venue_viewing');
// TEST ONLY DO NOT TOUCH (CALENDAR)