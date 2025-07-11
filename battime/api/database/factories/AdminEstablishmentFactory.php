<?php

namespace Database\Factories;

use App\Models\AdminEstablishment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminEstablishment>
 */
class AdminEstablishmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AdminEstablishment::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'admin_numberphone' => $this->faker->numberBetween(1,1456),
        ];
    }
}
