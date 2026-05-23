<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Karang Taruna',
            'email' => env('ADMIN_EMAIL', 'admin@karangtaruna.local'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'admin12345')),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Demo',
            'email' => 'user@karangtaruna.local',
            'password' => Hash::make('user12345'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
