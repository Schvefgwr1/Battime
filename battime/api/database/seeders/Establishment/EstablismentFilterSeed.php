<?php

namespace Database\Seeders\Establishment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablismentFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_establishments')->insert([
            'id' => '1',
            'establishment_id' => '1',
            'ROCK' => true,
            'LABE' => true,
            'DOL2' => true,
            "DAR1" => true,

        ]);
        DB::table('filter_establishments')->insert([
            'id' => '2',
            'establishment_id' => '2',
            'LABE' => true,
        ]);
    }
}
