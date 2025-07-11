<?php

namespace Tests\Unit;

use Database\Factories\AdminEstablishmentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AdminEstablishmentAuthControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    private $route = 'api/login/reset_password';
    public function test_reset_password_success()
    {
        $user = AdminEstablishmentFactory::new()->create();

        $token = Password::broker('admin_establishments')->createToken($user);

        $response = $this->postJson($this->route, [
            'email' => $user->email,
            'password' => 'newpassword123',
            'token' => $token,
        ]);

        $response->assertStatus(201);
        $response->assertJson(['success' => true]);

        $user->refresh();
        $this->assertTrue(Hash::check('newpassword123', $user->password));

    }

    public function test_reset_password_invalid_token()
    {
        $user = AdminEstablishmentFactory::new()->create();

        $response = $this->postJson($this->route, [
            'email' => $user->email,
            'password' => 'newpassword123',
            'token' => 'invalid-token',
        ]);

        $response->assertStatus(403); // Ожидаем, что статус будет "forbidden"
        $response->assertJson(['success' => false, 'message' => 'invalid token']);
    }

    public function test_reset_password_invalid_email()
    {
        $token = 'some-valid-token';

        $response = $this->postJson($this->route, [
            'email' => 'nonexistentemail@example.com',
            'password' => 'newpassword123',
            'token' => $token,
        ]);

        $response->assertStatus(404);
        $response->assertJson(['success' => false, 'message' => 'invalid user email']);
    }
}
