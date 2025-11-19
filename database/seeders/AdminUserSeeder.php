<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// The file name and class name must match exactly.
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. CRITICAL: Delete the old default admin user to prevent unique constraint errors
        DB::table('users')->where('email', 'admin@example.com')->delete();
        
        // 2. Add an additional safety check: delete the user with the NEW email too, 
        // in case the seeder was run partially before.
        DB::table('users')->where('email', 'my-new-admin@secure.com')->delete();

        // 3. Insert the new admin user
        DB::table('users')->insert([
            'name' => 'Store Administrator',
            // --- NEW ADMIN EMAIL ---
            'email' => 'my-new-admin@secure.com',
            // --- NEW ADMIN PASSWORD (MUST be hashed) ---
            'password' => Hash::make('MySecureAdminPass123'),
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}