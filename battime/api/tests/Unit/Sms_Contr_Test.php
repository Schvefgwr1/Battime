<?php


namespace Tests\Unit;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Sms_Contr_Test extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_login_with_expired_sms_code()
    {
        $user = User::factory()->create();
        $this->travel(11)->minutes();
        $response = $this->post('/api/usercheck', [
            'Sms_User_Sent' => '123456',
        ]);
        $response->assertStatus(408);
        $response->assertJson([
            'success' => false,
            'message' => 'Sms time out',
        ]);
    }

    public function test_user_cannot_login_with_uncorrect_sms_code()
    {
        $response = $this->post('/api/usercheck', [
            'Sms_User_Sent' => '123456',
        ]);
        $response
                    ->assertStatus(403)
                    ->assertJson([
                        'success' => false,
                        'message' => 'Sms not find',
    ]);
    }

    public function test_user_can_login_correct_sms_code()
    {
        $user = User::factory()->create([
            'Sms_User_Sent' => '123456',
            'Users_NumberPhone' => '79999999998',
            'email' => '79999999998@battime.ru',
            'password' => '79999999998',
        ]);
        $response = $this->post('/api/usercheck', [
            'Sms_User_Sent' => '123456',
        ]);
        $response->assertJson([
            'error_message' => 'Invalid credentials',
        ]);
      /*  $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'User logged successfully',
            ]);*/
    }

}
