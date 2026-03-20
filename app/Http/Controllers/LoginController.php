<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Needed for password checking
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\Account;
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))

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
            'Account_Username' => ['required'],
            'Account_Password' => ['required'],
            'Account_Username' => ['required'],
            'Account_Password' => ['required'],
        ]);

        // 2. Find the user
        $user = Account::where('Account_Username', $request->Account_Username)->first();
        $user = Account::where('Account_Username', $request->Account_Username)->first();

        // 3. CHECK: Does the username exist?
       // 1. USER NOT FOUND
        if (!$user) {
            return back()->withErrors([
                'Account_Username' => 'Invalid username or password. Please try again.',
            ])->onlyInput('Account_Username');
                'Account_Username' => 'Invalid username or password. Please try again.',
            ])->onlyInput('Account_Username');
        }

        // 2. WRONG PASSWORD
        if (!Hash::check($request->Account_Password, $user->Account_Password)) {
        if (!Hash::check($request->Account_Password, $user->Account_Password)) {
            return back()->withErrors([
                'Account_Password' => 'Invalid username or password. Please try again.',
            ])->onlyInput('Account_Username');
                'Account_Password' => 'Invalid username or password. Please try again.',
            ])->onlyInput('Account_Username');
        }

        // 3. ACCOUNT PENDING
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'pending') {
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'pending') {
            return back()->with('error', 'Your account is currently pending approval. Please wait for the administrator to review your registration.')
                        ->withInput($request->only('Account_Username'));
                        ->withInput($request->only('Account_Username'));
        }

        // 4. ACCOUNT DEACTIVATED
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'deactivate') {
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'deactivate') {
            return back()->with('error', 'Your account has been deactivated. Please contact support or the administrator for assistance.')
                        ->withInput($request->only('Account_Username'));
                        ->withInput($request->only('Account_Username'));
        }

        // 5. ACCOUNT DECLINED
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'declined') {
        if (strtolower($user->Account_Role) === 'client' && $user->Account_Status === 'declined') {
            return back()->with('error', 'Your account registration was not approved. Please contact the administrator for more information.')
                        ->withInput($request->only('Account_Username'));
                        ->withInput($request->only('Account_Username'));
        }
        // --- NEW FEATURE END ---

        // 5. If all checks pass, log the user in
        Auth::login($user);
        $request->session()->regenerate();

        // Track first-ever login (enables cleanup of never-logged-in approved accounts)
<<<<<<< HEAD
        if (Schema::hasColumn('users', 'last_login_at') && empty($user->last_login_at)) {
=======
        if (Schema::hasColumn('Account', 'last_login_at') && empty($user->last_login_at)) {
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
            $user->last_login_at = now();
            $user->save();
        }

<<<<<<< HEAD
        $role = strtolower($user->role);
=======
        $role = strtolower($user->Account_Role);
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))

        // 6. Redirect based on role
        if (in_array($role, ['admin', 'staff'])) {
            return redirect()->route('employee.dashboard');
        }


        if ($role === 'client') {
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

