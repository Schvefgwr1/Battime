<?php

namespace Tests\Unit;

use App\Models\Establishment;
use App\Models\RegisteredEstablishments;
use App\Models\MenuLinks;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class Get_Registered_Establishment_Test extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function testGetRegisteredEstablishment()
    {
        $establishment = Establishment::factory()->create();
        $registeredEstablishment = RegisteredEstablishments::factory()->create([
            'id' => $establishment->id
        ]);
        MenuLinks::factory()->count(1)->create([
            'establishment_id' => $registeredEstablishment->id
        ]);
        $response = $this->get('/api/establishment_card?establishment_id=' . $establishment->id);
        $response->assertStatus(200);
        //$response->assertJson();
        $response->assertJsonStructure([
            'name',
            'likes',
            'workload_parameter',
            'establishment_likes',
            'establishment_info' => [
                'description',
                'establishment_menu',
                'establishment_contacts' => [
                    'establishment_email',
                    'establishment_inst',
                    'establishment_vk',
                    'establishment_telegram'
                ]
            ],
            'establishment_addresses',
            'coordinates' => [
                'latitude',
                'longitude'
            ]
        ]);
    }
}
