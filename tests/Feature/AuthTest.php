<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_post()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = '123456'),
        ]);

        $response = $this->post('/login', [
            'nickname' => $user->nickname,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_register_post()
    {
        $user = User::factory()->create([
            'password' => '12345678',
            'email_verified_at' => null
        ])->toArray();

        $response = $this->post('/register', $user);

        $results = [
            'nickname' => $user['nickname'],
            'email' => $user['email']
        ];

        $this->assertDatabaseHas('users', $results);
    }
}
