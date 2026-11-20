<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (blank($email) && blank($password)) {
            $this->command?->warn('Super admin seed skipped. Run php artisan admin:create-super-admin to create one securely.');

            return;
        }

        if (blank($email) || blank($password)) {
            throw new \RuntimeException('Set both ADMIN_EMAIL and ADMIN_PASSWORD, or create the account with php artisan admin:create-super-admin.');
        }

        if (strlen($password) < 12) {
            throw new \RuntimeException('ADMIN_PASSWORD must contain at least 12 characters.');
        }

        User::updateOrCreate(
            ['email' => mb_strtolower(trim($email))],
            [
                'name' => env('ADMIN_NAME', 'Super Admin'),
                'password' => Hash::make($password),
                'role' => 'super_admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
