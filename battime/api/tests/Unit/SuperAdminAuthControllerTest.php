<?php

namespace Tests\Unit;

use App\Models\SuperAdmin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase; // Импортируйте TestCase из Tests пространства имен, а не из PHPUnit\Framework

class SuperAdminAuthControllerTest extends TestCase
{
    use RefreshDatabase;
    private $route = '/api/superadmin/login';

    public function setUp(): void
    {
        parent::setUp();
        SuperAdmin::factory()->create([
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password')
        ]);
    }

    /** @test
     */
    public function a_super_admin_can_login_with_correct_credentials()
    {

        $response = $this->postJson($this->route, [
            'email' => 'superadmin@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Код двухфакторной аутентификации отправлен.']);
    }


    /** @test
     */
    public function a_super_admin_cannot_login_with_incorrect_password()
    {
        $response = $this->postJson($this->route, [
            'email' => 'superadmin@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Неправильный логин или пароль']);
    }

    /** @test
     */
    public function a_super_admin_cannot_login_with_non_existent_email()
    {
        $response = $this->postJson($this->route, [
            'email' => 'nonexistent@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Неправильный логин или пароль']);
    }
}
