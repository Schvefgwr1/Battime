<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Establishment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Establishment>
 */
class EstablishmentFactory extends Factory
{
    protected $model = Establishment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'link_to_emoji' => $this->faker->emoji,
            'address_latitude' => $this->faker->latitude,
            'address_longitude' => $this->faker->longitude,
            'name' => $this->faker->name,

        ];
    }
}
