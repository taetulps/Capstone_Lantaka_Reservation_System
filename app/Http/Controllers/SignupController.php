<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('pages/signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName'   => 'required|string|max:100',
            'lastName'    => 'required|string|max:100',
            'username'    => 'required|unique:users|max:50',
            'email'       => 'required|email|unique:users',
            'phone'       => ['required', 'regex:/^0[0-9]{10}$/'],
            'affiliation' => 'required|string',
            'validId'     => 'required|image|max:2048',
        ]);

        $path = $request->file('validId')->store('ids', 'public');

        $mappedUserType = match($request->affiliation) {
            'student', 'faculty', 'staff' => 'Internal',
            default                        => 'External',
        };

        User::create([
            'name'          => trim($request->firstName . ' ' . $request->lastName),
            'username'      => $request->username,
            'email'         => $request->email,
            // Placeholder hash — plain text is unknown, login is impossible until admin approves
            'password'      => Hash::make(Str::uuid()),
            'phone'         => $request->phone,
            'affiliation'   => $request->affiliation,
            'usertype'      => $mappedUserType,
            'valid_id_path' => $path,
            'role'          => 'client',
            'status'        => 'pending',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registration submitted! Your account is under review. Once approved, your login credentials will be sent to your registered email.');
    }
}