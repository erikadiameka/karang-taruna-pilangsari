<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateSuperAdminCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_be_created_with_private_password_prompts(): void
    {
        $this->artisan('admin:create-super-admin')
            ->expectsQuestion('Email', 'admin@example.test')
            ->expectsQuestion('Nama lengkap', 'Admin Pilangsari')
            ->expectsQuestion('Password (minimal 12 karakter)', 'PilangsariSecure2026!')
            ->expectsQuestion('Ulangi password', 'PilangsariSecure2026!')
            ->assertExitCode(0);

        $user = User::where('email', 'admin@example.test')->firstOrFail();

        $this->assertSame('super_admin', $user->role);
        $this->assertTrue($user->is_active);
        $this->assertTrue(Hash::check('PilangsariSecure2026!', $user->password));
    }
}
