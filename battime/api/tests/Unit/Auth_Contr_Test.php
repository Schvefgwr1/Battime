<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use App\Models\Establishment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class Auth_Contr_Test extends TestCase
{
    use DatabaseMigrations;
    /**
     *
     * @return void
     */
    public function test_authorize_For_User_Via_Number_When_add_new_number()
    {

        $response = $this->post('/api/userauth', [
            'Users_NumberPhone' => '79999999998',
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Sms send User',
        ]);
    }

    public function test_authorize_For_User_Via_Number_When_old_number()
    {
        $user = User::factory()->count(1)->create([
            'Users_NumberPhone' => '79999999998',
        ]);
        $response = $this->post('/api/userauth', [
            'Users_NumberPhone' => '79999999998',
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Sms send User',
        ]);
    }
    public  function test_authorize_For_User_Via_Unreal_Number()
    {
        $response = $this->post('/api/userauth', [
            'Users_NumberPhone' => '123',
        ]);
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => "Invalid number phone"
        ]);
    }
    public  function test_authorize_For_User_Via_Unreal_Key()
    {
        $response = $this->post('/api/userauth', [
            'dsasda' => '123',
        ]);
        $response->assertStatus(302);
    }
}
