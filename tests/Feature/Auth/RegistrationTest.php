<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'firstname' => 'Test User',
            'lastname' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }

    public function test_new_users_cannot_register_with_a_duplicate_mail(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/register', [
            'firstname' => 'Test User',
            'lastname' => 'Test User',
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
    }
}
