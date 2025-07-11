<?php

namespace Tests\Unit;

use App\Models\Establishment;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class EstablishmentControllerTest extends TestCase
{
    use DatabaseMigrations;

   /* public function testGetAllEstablishmentsSuccess()
    {
        $establishment = Establishment::factory()->create();


        $user = SuperAdmin::factory()->create();
        $this->actingAs($user, 'sanctum')->withHeaders(['Accept' => 'application/json']);

        $response = $this->get('/get_establishments');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'registered',
            ],
        ]);
    }

    public function testGetAllEstablishmentsForbidden()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum')->withHeaders(['Accept' => 'application/json']);

        // У пользователя не должно быть прав super.admin

        $response = $this->get('/get_establishments');

        // Проверяем, что доступ запрещен
        $response->assertStatus(403);
    }*/
}
