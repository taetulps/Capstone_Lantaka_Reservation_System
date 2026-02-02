<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // Get the filter from the URL (e.g., ?status=pending)
        $status = $request->query('status');

        $query = User::query();

        // If a tab is clicked, filter the results
        if ($status) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        return view('employee_accounts', compact('users'));
    }
}