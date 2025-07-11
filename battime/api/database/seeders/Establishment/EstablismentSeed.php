<?php

namespace Database\Seeders\Establishment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablismentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('establishments')->insert([
            'id' => '1',
            'name' => 'РУССКИЙ ПАБ - крафтовый гастробар',
            'address_latitude' => 55.759076,
            'address_longitude' => 37.600540,
            'workload_parameter' => 10,
            'link_to_emoji' => 1,
            'address' => 'Тверской б-р, 10 с 1'
        ]);
        DB::table('establishments')->insert([
            'id' => '2',
            'name' => 'Beer Harbor | Крафтовый бар Курская | Паб, кейтеринг, кафе',
            'address_latitude' => '55.759714',
            'address_longitude' => '37.647181',
            'workload_parameter' => '12',
            'link_to_emoji' => 2,
            'address' => 'улица Покровка, 21-23/25 строение 1'
        ]);
        DB::table('establishments')->insert([
            'id' => '3',
            'name' => 'London Beer & Grill | Ресторан - паб Кузнецкий мост',
            'address_latitude' => '55.762004',
            'address_longitude' => '37.626448',
            'workload_parameter' => '2',
            'link_to_emoji' => 0,
            'address' => 'ул. Кузнецкий Мост, 21/5'
        ]);
        DB::table('establishments')->insert([
            'id' => '4',
            'name' => 'Three Tuns Pub',
            'address_latitude' => '55.774213',
            'address_longitude' => '37.584577',
            'workload_parameter' => '7',
            'link_to_emoji' => 1,
            'address' => '2-я Брестская ул., дом 39, строение 2'
        ]);
        DB::table('establishments')->insert([
            'id' => '5',
            'name' => 'Джон Булл Паб',
            'address_latitude' => '55.748265',
            'address_longitude' => '37.583257',
            'workload_parameter' => '26',
            'link_to_emoji' => 3,
            'address' => 'Карманицкий переулок, дом 9'
        ]);
        DB::table('establishments')->insert([
            'id' => '6',
            'name' => 'Myrna Roob',
            'address_latitude' => '55.749182',
            'address_longitude' => '37.537772',
            'workload_parameter' => '0',
            'link_to_emoji' => 0,
            'address' => 'Пресненская набережная, д. 2'
        ]);
        DB::table('establishments')->insert([
            'id' => '7',
            'name' => 'Ceasar Zulauf',
            'address_latitude' => '55.764724',
            'address_longitude' => '37.601618',
            'workload_parameter' => '1',
            'link_to_emoji' => 0,
            'address' => 'Тверская улица, д. 7'
        ]);
        DB::table('establishments')->insert([
            'id' => '8',
            'name' => 'Art Bergstrom',
            'address_latitude' => '55.738464',
            'address_longitude' => '37.519468',
            'workload_parameter' => '1',
            'link_to_emoji' => 1,
            'address' => 'Кутузовский проспект, д. 5'
        ]);
        DB::table('establishments')->insert([
            'id' => '9',
            'name' => 'Elnora Dickens',
            'address_latitude' => '55.686218',
            'address_longitude' => '37.557886',
            'workload_parameter' => '2',
            'link_to_emoji' => 2,
            'address' => 'Ленинский проспект, д. 119'
        ]);
        DB::table('establishments')->insert([
            'id' => '10',
            'name' => 'Chester Bergnaum MD',
            'address_latitude' => '55.753674',
            'address_longitude' => '37.587471',
            'workload_parameter' => '3',
            'link_to_emoji' => 3,
            'address' => 'Новый Арбат, д. 23'
        ]);
    }
}
