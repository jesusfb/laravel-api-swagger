<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_using_the_api(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('api');

        $response->assertStatus(200);
        $response->assertJson([
            'access_token' => true,
            'token_type' => "bearer",
            'expires_in' => 3600,
        ]);
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('api');
    }

    public function test_users_can_logout_using_the_api(): void
    {
        $this->test_users_can_authenticate_using_the_api();

        $response = $this->post('/api/auth/logout');

        $this->assertGuest('api');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => "Successfully logged out",
        ]);
    }

    public function test_users_token_refresh(): void
    {
        $this->test_users_can_authenticate_using_the_api();

        $response = $this->post('/api/auth/refresh');

        $response->assertStatus(200);
        $response->assertJson([
            'access_token' => true,
            'token_type' => "bearer",
            'expires_in' => 3600,
        ]);
    }

    public function test_api_function_me(): void
    {
        $user = User::factory()->create();

        $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/api/auth/me');

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at->toISOString(),
            'created_at' => $user->created_at->toISOString(),
            'updated_at' => $user->updated_at->toISOString(),
        ]);
    }

}
