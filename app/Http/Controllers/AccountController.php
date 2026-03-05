<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // REQUIRED for email
use App\Mail\AccountStatusMail;      // REQUIRED for email

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $role = $request->query('role');

        $query = User::query();

        if ($role === 'employee') {
            $query->whereIn('role', ['admin', 'staff', 'Admin', 'Staff']);
        } elseif ($status) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        return view('employee.accounts', compact('users'));
    }
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $status = $request->input('status'); // 'approved' or 'declined'

        if ($status === 'approved') {
            $user->status = 'approved'; // Matches your "Approved" badge in the UI
        } else {
            $user->status = 'declined';
        }
        
        $user->save();
        $user = User::findOrFail($id);
        // Send the email with the dynamic data
        Mail::to($user->email)->send(new AccountStatusMail($user, $status));

        return response()->json([
            'success' => true,
            'message' => 'Account has been ' . $status . ' and the client has been notified.'
        ]);
    }
}