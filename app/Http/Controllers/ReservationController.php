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
        // 1. Get the current list of bookings from session (or an empty array if none exist)
        $allBookings = session('pending_bookings', []);

        // 2. If coming from the "Proceed" button, add the new selection to the list
        if ($request->has('accommodation_id')) {
            $newEntry = $request->all();
            
            // Use the ID and Type as a unique key to prevent duplicate entries of the SAME room
            $uniqueKey = $newEntry['type'] . '_' . $newEntry['accommodation_id'];
            $allBookings[$uniqueKey] = $newEntry;
            
            session(['pending_bookings' => $allBookings]);
        }

        $processedItems = [];
        $grandTotal = 0;

        foreach ($allBookings as $key => $item) {
            $checkIn = \Carbon\Carbon::parse($item['check_in']);
            $checkOut = \Carbon\Carbon::parse($item['check_out']);
            $days = $checkIn->diffInDays($checkOut) ?: 1;

            if ($item['type'] === 'room') {
                $model = \App\Models\Room::find($item['accommodation_id']);
                $name = $model->room_number;
                $price = $model->price;
                $img = $model->image;
            } else {
                $model = \App\Models\Venue::find($item['accommodation_id']);
                $name = $model->Venue_Name ?? $model->name;
                $price = $model->Venue_Pricing ?? $model->price;
                $img = $model->Venue_Image ?? $model->image;
            }

            if ($model) {
                $total = $price * $days;
                $grandTotal += $total;
                
                $processedItems[] = [
                    'key' => $key,
                    'id' => $model->id,
                    'name' => $name,
                    'type' => $item['type'],
                    'price' => $price,
                    'img' => $img,
                    'check_in' => $checkIn->format('F d, Y'), // For display
                    'check_out' => $checkOut->format('F d, Y'), // For display
                    'check_in_raw' => $checkIn->format('Y-m-d'), // For JavaScript/Database
                    'check_out_raw' => $checkOut->format('Y-m-d'), // For JavaScript/Database
                    'days' => $days,
                    'pax' => $item['pax'],
                    'total' => $total
                ];
            }
        }

        return view('client_my_bookings', compact('processedItems', 'grandTotal'));
    }

    // 2. Store the Reservation (Confirm Button)
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'type' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'pax' => 'required|integer',
            'total_amount' => 'required|numeric',
        ]);

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'accommodation_id' => $request->id,
            'type' => $request->type,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'pax' => $request->pax,
            'total_amount' => $request->total_amount,
            'status' => 'pending'
        ]);

        $uniqueKey = $request->type . '_' . $request->id;
        $allBookings = session('pending_bookings', []);
        if (isset($allBookings[$uniqueKey])) {
            unset($allBookings[$uniqueKey]);
            session(['pending_bookings' => $allBookings]);
        }

        return redirect()->route('client_my_reservations')->with('success', 'Reservation confirmed!');
    }

    public function showMyBookings()
    {
        $booking = session('pending_booking');

        if (!$booking) {
            return redirect()->route('client_room_venue')->with('error', 'No active booking found.');
        }
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