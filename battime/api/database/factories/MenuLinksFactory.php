<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu_links>
 */
class MenuLinksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'establishment_id' => function () {
                return \App\Models\Establishment::factory()->create()->id;
            },
            'list_number' => $this->faker->randomDigitNotNull(),
            'link_to_menu_photo'=>$this->faker->address(),
        ];
    }
}
