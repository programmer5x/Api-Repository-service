<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_register_get()
    {
        $response = $this->getJson('/api/auth/register');
        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
//        $user = User::factory(1)->create();
//        $response = $this->postJson('/api/auth/register', [
//            'name' => $user->name,
//            'email' => $user->email,
//            'password' => $user->password,
//        ]);
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_user_login_get()
    {
        $user = User::factory()->make();
        dd($user);
        $response = $this->actingAs($user)->getJson('/api/auth/login');
        $response->assertStatus(200);
        $response = $this->actingAs($user)->get('/login');
    }
    public function test_user_can_login(): void
    {
//        $user = User::find(1);
//        $response = $this->postJson('/api/auth/login', [
//            'email' => $user->email,
//            'password' => $user->password,
//        ]);
        $response = $this->postJson('/api/auth/login', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }
}
