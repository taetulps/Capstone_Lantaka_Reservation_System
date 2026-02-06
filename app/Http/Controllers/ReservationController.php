<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;   
use App\Models\Venue;
use Carbon\Carbon;

class ReservationController extends Controller
{
    // 1. Show Checkout Page (Calculates Price)
    public function checkout(Request $request)
    {
        // 1. Validate that we receive the TYPE (room or venue)
        $request->validate([
            'accommodation_id' => 'required',
            'type' => 'required|in:room,venue', // <--- ADD THIS
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'pax' => 'required|integer|min:1'
        ]);

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $days = $checkIn->diffInDays($checkOut) ?: 1; 

        // 2. Strict Checking based on Type
        if ($request->type === 'room') {
            $data = Room::findOrFail($request->accommodation_id);
            $type = 'room';
            // CHANGE THIS LINE:
            $name = $data->room_number; 
            $price = $data->price; // Matches your $fillable 'price'
            $img = $data->image;   // Matches your $fillable 'image'
        } else {
            // FETCH VENUE
            $data = Venue::findOrFail($request->accommodation_id);
            $type = 'venue';
            $name = $data->Venue_Name ?? $data->name ?? 'Venue';
            $price = $data->Venue_Pricing ?? $data->price ?? 0;
            $img = $data->Venue_Image ?? $data->image ?? null;
        }

        $totalPrice = $price * $days;

        return view('client_my_bookings', compact(
            'data', 'type', 'name', 'img', 'price', 
            'checkIn', 'checkOut', 'days', 'totalPrice', 'request'
        ));
}

    // 2. Store the Reservation (Confirm Button)
    public function store(Request $request)
    {
        $request->validate([
        'id' => 'required',
        'total_amount' => 'required',
        'type' => 'required' // Ensure type is passed
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'accommodation_id' => $request->id,
            'type' => $request->type, // <--- SAVE THE TYPE HERE
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'pax' => $request->pax,
            'total_amount' => $request->total_amount,
            'status' => 'Pending'
        ]);

        return redirect()->route('client_my_reservations')
                     ->with('success', 'Reservation submitted successfully!');
    }

    // 3. Client: My Reservations Page
    public function index()
    {
        // --- FIX 3: Load 'room' and 'venue' separately for the list to work ---
        $reservations = Reservation::where('user_id', Auth::id())
                        ->with(['room', 'venue']) 
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('client_my_reservations', compact('reservations'));
    }

    // 4. Admin Page
    public function adminIndex()
    {
        $reservations = Reservation::with(['user', 'room', 'venue'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('employee_reservations', compact('reservations'));
    }
}