<?php

namespace Database\Seeders\Filters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackgroundNoiseLevelFilterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->insert([
            'id_filt' => 'LOUD',
            'category_filter' => 'Background_noise_level',
            'mame_filter' => 'Loud',
        ]);
        DB::table('filter_category')->insert([
            'id_filt' => 'FAIN',
            'category_filter' => 'Background_noise_level',
            'mame_filter' => 'Faint',
        ]);

    }
}
