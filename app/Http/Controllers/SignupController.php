<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Important: This allows you to use the Auth system

class SignupController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:confirmPassword',
            'validId' => 'required|image|max:2048',
        ]);

        // Handle File Upload
        $path = $request->file('validId')->store('ids', 'public');

        User::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'affiliation' => $request->affiliation,
            'valid_id_path' => $path,
            'role' => 'client',   // Forces the role to client
            'status' => 'pending',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please wait for admin approval.');
    }
}