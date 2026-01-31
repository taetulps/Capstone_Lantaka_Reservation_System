<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
{
   
    User::create([
        'name' => 'Admin User',
        'username' => 'admin01',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'), // This hashes the password
        'role' => 'admin',
    ]);


    User::create([
        'name' => 'Staff Member',
        'username' => 'staff01',
        'email' => 'staff@example.com',
        'password' => Hash::make('password123'),
        'role' => 'staff',
    ]);

  
    User::create([
        'name' => 'Regular Client',
        'username' => 'client01',
        'email' => 'client@example.com',
        'password' => Hash::make('password123'),
        'role' => 'client',
    ]);
    }
}