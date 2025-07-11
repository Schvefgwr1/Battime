<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceForDancingFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'AVAI',
            'category_filter' => 'Place_for_dancing',
            'mame_filter' => 'Available',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'NAVA',
            'category_filter' => 'Place_for_dancing',
            'mame_filter' => 'Not available',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'INDO',
            'category_filter' => 'Place_for_dancing',
            'mame_filter' => 'Indoor',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'OUTD',
            'category_filter' => 'Place_for_dancing',
            'mame_filter' => 'Outdoor',
        ]);
    }
}
