<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'DOL1',
            'category_filter' => 'Price',
            'mame_filter' => '$',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'DOL2',
            'category_filter' => 'Price',
            'mame_filter' => '$$',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'DOL3',
            'category_filter' => 'Price',
            'mame_filter' => '$$$',
        ]);
    }
}
