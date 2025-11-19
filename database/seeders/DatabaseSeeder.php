<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create the ADMIN USER
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => 1, // Crucial for your middleware
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Create the REGULAR (NON-ADMIN) USER
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com', // <-- Use this email to log in as a regular user
            'password' => Hash::make('password'), // <-- Use this password
            'is_admin' => 0, // 0 means not admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}