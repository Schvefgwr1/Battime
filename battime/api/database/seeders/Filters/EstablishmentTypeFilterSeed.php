<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablishmentTypeFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'BAR1',
            'category_filter' => 'Establishment_type',
            'mame_filter' => 'Bar',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'CAFE',
            'category_filter' => 'Establishment_type',
            'mame_filter' => 'Cafe',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'CLUB',
            'category_filter' => 'Establishment_type',
            'mame_filter' => 'Club',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'REST',
            'category_filter' => 'Establishment_type',
            'mame_filter' => 'Restaurant',
        ]);
    }
}
