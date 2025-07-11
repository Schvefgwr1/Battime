<?php

namespace Database\Seeders\Establishment;

use App\Models\RegisteredEstablishments;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegisteredEstablishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('registered_establishments')->insert([
            [
                'id' => 1,
                'likes' => 0,
                'establishment_id' => 6,
                'description' => 'Уютный винный бар с атмосферой старого города. Предлагает широкий выбор вин со всего мира и вкусные закуски. Идеально подходит для романтических вечеров.',
                'contact_email' => 'tom38@example.org',
                'contact_vk' => 'http://hessel.org/debitis',
                'contact_inst' => 'http://gleason.com/',
                'contact_tg' => 'http://rutherford.net/',
                'link_to_avatar' => 'http://localhost:8000/storage/establishment_avatars/reg_est_1.png'
            ],
            [
                'id' => 2,
                'likes' => 0,
                'establishment_id' => 7,
                'description' => 'Бар с ярким интерьером и дружелюбной атмосферой. Здесь можно насладиться свежесваренным пивом и живой музыкой по выходным. Отличное место для встреч с друзьями.',
                'contact_email' => 'schoen.tyree@example.org',
                'contact_vk' => 'http://www.mann.info/libero',
                'contact_inst' => 'http://wisozk.org/accusl',
                'contact_tg' => 'https://ernser.com/autem',
                'link_to_avatar' => 'http://localhost:8000/storage/establishment_avatars/reg_est_2.png'
            ],
            [
                'id' => 3,
                'likes' => 0,
                'establishment_id' => 8,
                'description' => 'Современный ресторан с авторской кухней. Шеф-повар удивляет необычными сочетаниями вкусов. Идеальное место для гастрономического путешествия и незабываемых кулинарных впечатлений.',
                'contact_email' => 'gmuller@example.org',
                'contact_vk' => 'http://www.price.biz/',
                'contact_inst' => 'http://www.pollich.com/volp',
                'contact_tg' => 'https://hane.org/numquam',
                'link_to_avatar' => 'http://localhost:8000/storage/establishment_avatars/reg_est_3.png'
            ],
            [
                'id' => 4,
                'likes' => 0,
                'establishment_id' => 9,
                'description' => 'Уютная кофейня, открытая круглосуточно. В меню ароматные сорта кофе и домашняя выпечка. Прекрасное место для утреннего кофе или вечернего десерта.',
                'contact_email' => 'yfadel@example.net',
                'contact_vk' => 'https://www.crona.com/similique',
                'contact_inst' => 'http://www.emmerich.com/adipisci',
                'contact_tg' => 'http://ondricka.com/',
                'link_to_avatar' => 'http://localhost:8000/storage/establishment_avatars/reg_est_4.png'
            ],
            [
                'id' => 5,
                'likes' => 0,
                'establishment_id' => 10,
                'description' => ' Популярное место среди местных жителей и туристов. Приятная атмосфера, широкий выбор напитков и вкусные закуски. Отлично подходит для вечерних встреч с друзьями.',
                'contact_email' => 'tom38@example.org',
                'contact_vk' => 'rschoen@example.org',
                'contact_inst' => 'http://www.schimmel.com/',
                'contact_tg' => 'http://pouros.com/laudantiu',
                'link_to_avatar' => 'http://localhost:8000/storage/establishment_avatars/reg_est_5.png'
            ]
        ]);
    }
}

