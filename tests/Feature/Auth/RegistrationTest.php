<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_registration_redirects_to_login_with_notice(): void
    {
        $this->followingRedirects()
            ->get('/register')
            ->assertOk()
            ->assertSee('Pendaftaran akun publik ditutup.');
    }

    public function test_public_registration_does_not_create_users(): void
    {
        $this->followingRedirects()
            ->post('/register', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])->assertOk()
            ->assertSee('Pendaftaran akun publik ditutup.');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }
}
