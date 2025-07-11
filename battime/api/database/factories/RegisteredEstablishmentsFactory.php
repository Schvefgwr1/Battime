<?php

namespace Database\Factories;

use App\Models\RegisteredEstablishments;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Establishment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisteredEstablishments>
 */
class RegisteredEstablishmentsFactory extends Factory
{
    protected $model = RegisteredEstablishments::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'establishment_id' => function () {
                // Убедитесь, что фабрика Establishment существует и работает правильно
                return Establishment::factory()->create()->id;
            },
            // 'likes' больше нет в таблице registered_establishments, поэтому это поле нужно удалить из фабрики
            'description' => $this->faker->paragraph,
            'contact_email' => $this->faker->safeEmail,
            'contact_vk' => $this->faker->url,
            'contact_inst' => $this->faker->url,
            'contact_tg' => $this->faker->url,
            'link_to_avatar' => $this->faker->imageUrl(640, 480, 'people'),
            // Вы можете добавить остальные поля, соответствующие вашей модели если они есть
        ];
    }
}
