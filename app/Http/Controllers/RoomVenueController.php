<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth; // Needed to get the logged-in user
use App\Models\Reservation;
use Carbon\CarbonPeriod;

class RoomVenueController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'category'       => 'required',
        'name'           => 'required|string',
        'internal_price' => 'required|numeric',
        'external_price' => 'required|numeric', // Validating external price
        'capacity'       => 'required|integer',
    ]);

    if ($request->category === 'Room') {
        Room::create([
            'user_id'        => Auth::id(),
            'room_number'    => $request->name,
            'room_type'      => $request->type ?? 'Standard',
            'capacity'       => $request->capacity,
            
            'price'          => $request->internal_price, // Saved to 'price'
            'external_price' => $request->external_price, // Saved to 'external_price'

            'status'         => 'Available',
            'description'    => $request->description,
        ]);
    } else {
        Venue::create([
            'user_id'        => Auth::id(),
            'name'           => $request->name,
            'capacity'       => $request->capacity,
            
            'price'          => $request->internal_price,
            'external_price' => $request->external_price,

            'status'         => 'Available',
            'description'    => $request->description,
        ]);
    }

    return redirect()->back()->with('success', 'Added successfully!');
    }

    public function index()
    {
        // 1. Get Rooms
        $rooms = Room::all()->map(function($room) {
            $room->category = 'Room';
            $room->display_name = "Room " . $room->room_number . " (" . $room->room_type . ")";
            return $room;
        });

        // 2. Get Venues
        $venues = Venue::all()->map(function($venue) {
            $venue->category = 'Venue';
            $venue->display_name = $venue->name;
            return $venue;
        });

        // 3. Merge them
        $all_accommodations = $rooms->concat($venues);

        // 4. Send to View 
        return view('client.room_venue', compact('all_accommodations'));
    }
    public function adminIndex()
    {
        // Fetch all rooms sorted by newest first
        $rooms = Room::all();
        
        // Fetch all venues
        $venues = Venue::all();

        // Send distinct lists because the Admin View has separate sections for Room vs Venue
        return view('employee.room_venue', compact('rooms', 'venues'));
    }
        public function show($category, $id)
    {
        // 1. Find the correct item based on category
        if ($category === 'Room') {
            $data = Room::findOrFail($id);
            // Standardize the name for the view
            $data->display_name = "Room " . $data->room_number . " (" . $data->room_type . ")"; 
        } else {
            $data = Venue::findOrFail($id);
            $data->display_name = $data->name;
        }

        // 2. Fetch occupied dates from the Reservations table
        // We use strtolower($category) because your DB saves it as 'room' or 'venue' (lowercase)
        $reservations = Reservation::where('accommodation_id', $id)
            ->where('type', strtolower($category))
            // ->where('status', 'Approved') // OPTIONAL: Uncomment this if you only want to block 'Approved' bookings, not 'Pending' ones
            ->get(['check_in', 'check_out']);

        $occupiedDates = [];
        foreach ($reservations as $res) {
            // CarbonPeriod automatically gets every single day between check-in and check-out
            $period = CarbonPeriod::create($res->check_in, $res->check_out);
            foreach ($period as $date) {
                $occupiedDates[] = $date->format('Y-m-d'); // Format for Day.js
            }
        }
        
        // Remove duplicate dates just in case, and reset array keys
        $occupiedDates = array_values(array_unique($occupiedDates));

        // 3. Pass the data AND the occupiedDates to the view
        return view('client.room_venue_viewing', compact('data', 'category', 'occupiedDates'));
    }
}