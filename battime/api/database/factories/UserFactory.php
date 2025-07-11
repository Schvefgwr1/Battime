<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use function Symfony\Component\Translation\t;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->password(), // password
            'Users_NumberPhone' =>$this->faker->e164PhoneNumber(),
            'Sms_User_Sent' => 123456,
            'Sms_created' =>now(),
            'profile_image' =>$this->faker->address(),
            'user_lastname' =>$this->faker->name(),
            'remember_token' =>$this->faker->name(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
