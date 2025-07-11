<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;
class Profile_Test extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Get_Profile_without_berrtoken()
    {
        $user = User::factory()->create();
        $response = $this->get('/api/get_profile');
        $response->assertStatus(204);

        $this->assertTrue(true);
    }
    public function test_GetProfile_with_valid_bearer_token()
    {
        $user = User::factory()->create();
        $token = $user->createToken(str($user['Users_PhoneNumber']))->plainTextToken;
        $user = User::factory()->create([
            'remember_token' => $token,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('get', '/api/get_profile');
        //$response = $this->actingAs($user, 'api')->get('/api/get_profile');
        $response->assertStatus(200);
        $response->assertJson([
            'User_id' => $user->id,
            'profile_image' => $user->profile_image,
            'user_firstname' => $user->name,
            'user_lastname' => $user->user_lastname,
            'user_mail' => $user->email,
            'phone_number' => $user->Users_NumberPhone
        ]);
    }
}
