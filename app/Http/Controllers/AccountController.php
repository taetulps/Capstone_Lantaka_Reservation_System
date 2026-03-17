<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoomReservation;
use App\Models\VenueReservation;
use App\Models\Room;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Mail\AccountApprovedMail;
use App\Mail\AccountDeclinedMail;
use App\Mail\AccountReactivatedMail;
use App\Mail\AccountUpdatedMail;
use App\Http\Controllers\EventLogController;

class AccountController extends Controller
{
    /**
     * Delete approved accounts that have NEVER logged in
     * and whose password has been sitting unused for more than 7 days.
     * Silently skipped if the tracking columns don't exist yet.
     */
    private function cleanupExpiredAccounts(): void
    {
        if (! Schema::hasColumn('users', 'password_set_at')) {
            return; // Migration not run yet — skip silently
        }

        User::where('status', 'approved')
            ->whereNull('last_login_at')
            ->where('password_set_at', '<', now()->subDays(7))
            ->delete();
    }

    public function index(Request $request)
    {
        $this->cleanupExpiredAccounts();

        $status = $request->query('status');
        $role   = $request->query('role');
        $search = $request->query('search');

        $query = User::query();

        // Search by name or email
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name',  'ILIKE', "%{$search}%")
                  ->orWhere('email', 'ILIKE', "%{$search}%");
            });
        }

        if ($role === 'employee') {
            $query->whereIn('role', ['admin', 'staff', 'Admin', 'Staff']);
        } elseif ($status) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();

        return view('employee.accounts', compact('users'));
    }
    public function updateStatus(Request $request, $id)
    {
        $user   = User::findOrFail($id);
        $status = $request->input('status'); // 'approved' or 'declined'

        if ($status === 'approved') {
            // Generate a secure password: prefix "lrs" + 9 random alphanumeric chars
            $plainPassword = 'lrs' . Str::random(9);

            $user->status   = 'approved';
            $user->password = Hash::make($plainPassword);

            // Only set tracking columns if the migration has been run
            if (Schema::hasColumn('users', 'password_set_at')) {
                $user->password_set_at = now();
                $user->last_login_at   = null; // ensure clean state
            }

            $user->save();

            Mail::to($user->email)->send(new AccountApprovedMail($user, $plainPassword));

            EventLogController::log(
                'account_approved',
                "Account approved for {$user->name} ({$user->email}). Credentials sent via email."
            );

            return response()->json([
                'success' => true,
                'message' => 'Account approved. Login credentials have been sent to the user\'s email.',
            ]);
        }

        // Declined
        $user->status = 'declined';
        $user->save();

        Mail::to($user->email)->send(new AccountDeclinedMail($user));

        EventLogController::log(
            'account_declined',
            "Account declined for {$user->name} ({$user->email})."
        );

        return response()->json([
            'success' => true,
            'message' => 'Account declined. The user has been notified via email.',
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // 1a. Handle Deactivation
        if ($request->action === 'deactivate') {
            $user->status = 'deactivate';
            $user->save();
            EventLogController::log(
                'account_deactivated',
                "Account deactivated for {$user->name} ({$user->email})."
            );
            return redirect()->back()->with('success', 'Account deactivated.');
        }

        // 1b. Handle Reactivation — generate a fresh password and email it
        if ($request->action === 'reactivate') {
            $plainPassword = 'lrs' . Str::random(9);

            $user->status   = 'approved';
            $user->password = Hash::make($plainPassword);

            if (Schema::hasColumn('users', 'password_set_at')) {
                $user->password_set_at = now();
                $user->last_login_at   = null; // reset so cleanup timer restarts
            }

            $user->save();

            try {
                Mail::to($user->email)->send(new AccountReactivatedMail($user, $plainPassword));
            } catch (\Throwable $e) {
                // Mail failure should not block the response
            }

            EventLogController::log(
                'account_reactivated',
                "Account reactivated for {$user->name} ({$user->email}). New credentials sent via email."
            );

            return redirect()->back()->with('success', 'Account reactivated. New login credentials have been sent to the user\'s email.');
        }

        // 2. Validation
        $request->validate([
            'username'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $id,
            'phone_no'   => 'nullable|string', // Matches your Modal "name" attribute
        ]);

        // 3. Mapping Data to DB Columns
        // Combine names into the 'name' column
        $user->name = trim($request->first_name . ' ' . $request->last_name);
        
        $user->username = $request->username;
        $user->email = $request->email;
        
        // VERY IMPORTANT: Map 'phone_no' (HTML) to 'phone' (DB)
        $user->phone = $request->phone_no; 

        // Only update if you have the 'id_info' column in your DB
        // $user->id_info = $request->id_info; 

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Notify the user that their account details were changed
        try {
            Mail::to($user->email)->send(new AccountUpdatedMail($user));
        } catch (\Throwable $e) {
            // Mail failure should not block the response
        }

        EventLogController::log(
            'account_updated',
            "Account details updated for {$user->name} ({$user->email})."
        );

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

        public function searchAccounts(Request $request)
        {
            $search = $request->search;

            $users = User::where('name','ilike',"%{$search}%")
                ->orWhere('email','ilike',"%{$search}%")
                ->limit(10)
                ->get(['id','name','email']);

            return response()->json($users);
        }

    /* ────────────────────────────────────────────────
     *  Client Account Page
     * ──────────────────────────────────────────────── */
    public function showClientAccount()
    {
        $user = Auth::user();

        // Reservation counts
        $roomReservations  = RoomReservation::where('Client_ID', $user->id)->get();
        $venueReservations = VenueReservation::where('Client_ID', $user->id)->get();

        $allStatuses = $roomReservations->merge($venueReservations);

        $totalCount     = $allStatuses->count();
        $pendingCount   = $allStatuses->whereIn('status', ['pending'])->count();
        $confirmedCount = $allStatuses->whereIn('status', ['confirmed', 'approved'])->count();
        $completedCount = $allStatuses->whereIn('status', ['completed', 'checked-out'])->count();

        // Build recent reservations (latest 5 across both types)
        $recentRoom = $roomReservations->sortByDesc('created_at')->take(5)->map(function ($r) {
            $room = Room::find($r->room_id);
            return [
                'id'        => $r->getKey(),
                'name'      => $room ? 'Room ' . ($room->room_number ?? $room->id) : 'Room',
                'type'      => 'room',
                'check_in'  => $r->Room_Reservation_Check_In_Time,
                'check_out' => $r->Room_Reservation_Check_Out_Time,
                'status'    => $r->status,
                'created_at'=> $r->created_at,
            ];
        });

        $recentVenue = $venueReservations->sortByDesc('created_at')->take(5)->map(function ($r) {
            $venue = Venue::find($r->venue_id);
            return [
                'id'        => $r->Venue_Reservation_ID,
                'name'      => $venue ? ($venue->name ?? 'Venue') : 'Venue',
                'type'      => 'venue',
                'check_in'  => $r->Venue_Reservation_Check_In_Time,
                'check_out' => $r->Venue_Reservation_Check_Out_Time,
                'status'    => $r->status,
                'created_at'=> $r->created_at,
            ];
        });

        $recentReservations = $recentRoom->merge($recentVenue)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();

        return view('client.account', compact(
            'user',
            'totalCount',
            'pendingCount',
            'confirmedCount',
            'completedCount',
            'recentReservations'
        ));
    }

    public function updateClientAccount(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'                  => 'required|string|max:255',
            'username'              => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'                 => 'required|email|unique:users,email,' . $user->id,
            'phone'                 => 'nullable|string|max:20',
            'password'              => 'nullable|string|min:8|confirmed',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('client.account')
            ->with('success', 'Your profile has been updated successfully.');
    }
}