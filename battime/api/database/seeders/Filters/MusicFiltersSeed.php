<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicFiltersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'ROCK',
            'category_filter' => 'Music',
            'mame_filter' => 'Rock',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'POP1',
            'category_filter' => 'Music',
            'mame_filter' => 'Pop',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'HIPH',
            'category_filter' => 'Music',
            'mame_filter' => 'Hip-hop',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'KPOP',
            'category_filter' => 'Music',
            'mame_filter' => 'K-pop',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'TECH',
            'category_filter' => 'Music',
            'mame_filter' => 'Techno',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'RAP1',
            'category_filter' => 'Music',
            'mame_filter' => 'Rap',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'JAZZ',
            'category_filter' => 'Music',
            'mame_filter' => 'Jazz',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'CLAS',
            'category_filter' => 'Music',
            'mame_filter' => 'Classical',
        ]);

        DB::table('filter_category')->insert([
            'id_filt' => 'MIXE',
            'category_filter' => 'Music',
            'mame_filter' => 'Mixed Music',
        ]);
    }
}
