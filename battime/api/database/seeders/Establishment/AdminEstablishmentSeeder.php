<?php

namespace Database\Seeders\Establishment;

use App\Models\AdminEstablishment;
use Illuminate\Database\Seeder;

class AdminEstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminEstablishment::factory()->create([
            'email' => 'pasha123jarcov@gmail.com',
            'password' => bcrypt('cevapishifront')
        ]);
        AdminEstablishment::factory()->create([
            'email' => 'irobin.battime@yandex.ru',
            'password' => bcrypt('cevapishifront')
        ]);
        AdminEstablishment::factory()->count(1)->create();
    }
}
