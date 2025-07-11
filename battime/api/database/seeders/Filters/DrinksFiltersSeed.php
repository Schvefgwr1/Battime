<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinksFiltersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'VODK',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Vodka',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'GIN1',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Dwin',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'TEQU',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Tequilla',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'BEER',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Beer',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'COCK',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Cocktails',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'SING',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Signature cocktails',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'WINE',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Wine',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'WHIS',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Whiskey',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'RUM1',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Rum',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'CHAM',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Champagne',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'SAKE',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Sake',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'CIDR',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Cider',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'MEAD',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Mead',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'LIQR',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Liqueurs',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'BRDY',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Brandy',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'ABST',
            'category_filter' => 'Drinks',
            'mame_filter' => 'Absinthe',
        ]);

    }
}
