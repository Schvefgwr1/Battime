<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Establishment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class Get_Points_Test extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    public function testGetPoints()
    {
        Establishment::factory()->count(2)->create();
        $response = $this->get('/api/establishment_emoji_point');
        $response->assertStatus(200);
        //$response->assertJson();
        //$response->assertJsonCount(2);
        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'id',
                    'emoji',
                    'coordinates' => [
                        'latitude',
                        'longitude'
                    ],
                    'name'
                ]
            ]
        ]);
    }
}
