<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablishmentDesignFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'MODE',
            'category_filter' => 'Establishment_design',
            'mame_filter' => 'Modern',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'CLAD',
            'category_filter' => 'Establishment_design',
            'mame_filter' => 'Classic',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'HITE',
            'category_filter' => 'Establishment_design',
            'mame_filter' => 'High-tech',
        ]);
    }
}
