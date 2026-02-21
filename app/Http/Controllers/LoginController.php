<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Needed for password checking
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('pages/login'); // This matches your login.blade.php
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // 1. Validate Input
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // 2. Find the user by username manually
        $user = User::where('username', $request->username)->first();

        // 3. CHECK: Does the username exist?
        if (!$user) {
            return back()->withErrors([
                'username' => 'This username does not exist.', // <--- Message for wrong username
            ])->onlyInput('username');
        }

        // 4. CHECK: Is the password correct?
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password.', // <--- Message for wrong password
            ])->onlyInput('username');
        }

        // 5. If both pass, log the user in manually
        Auth::login($user);
        $request->session()->regenerate();

        // 6. Redirect based on role (Your existing logic)
        if ($user->role === 'admin' || $user->role === 'staff') {
            return redirect()->route('employee.dashboard');
        }
        if ($user->role === 'client') {
            return redirect()->route('client.room_venue');
        }
        
        return redirect()->route('index');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}