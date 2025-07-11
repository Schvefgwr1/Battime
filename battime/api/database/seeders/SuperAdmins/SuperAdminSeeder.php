<?php

namespace Database\Seeders\SuperAdmins;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuperAdmin::factory()->create([
            'name' => 'Pavel',
            'user_lastname' => 'Zharkov',
            'password' => bcrypt('iamthebest'),
            'Users_NumberPhone' => '79258862248',
            'email' => 'pasha123jarcov@gmail.com',
        ]);
        SuperAdmin::factory()->create([
            'name' => 'Ivan',
            'user_lastname' => 'Roben',
            'password' => bcrypt('Irs55555'),
            'Users_NumberPhone' => '79153469494',
            'email' => 'irobin.battime@yandex.ru',
        ]);
        SuperAdmin::factory()->create([
            'name' => 'Vsevolod',
            'user_lastname' => 'Schetov',
            'password' => bcrypt('pashaloxxx'),
            'Users_NumberPhone' => '79687243233',
            'email' => 'schetovvsevolod@yandex.ru',
        ]);
    }
}

