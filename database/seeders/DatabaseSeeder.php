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
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        // 1. Create or update the ADMIN USER
        DB::table('users')->updateOrInsert(
            ['email' => 'angelodelossantostud@gmail.com'],
            [
                'name' => 'Angelo de los Santos',
                'password' => Hash::make('JILORARA27'),
                'is_admin' => 1,
                'active' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // 2. Create or update the REGULAR (NON-ADMIN) USER
        DB::table('users')->updateOrInsert(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'active' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}