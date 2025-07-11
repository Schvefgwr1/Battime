<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterCategoryEstablishmentRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("filter_category_establishment_relation")->insert([
            ['filter_category_id' => 'BEER', 'establishment_id' => 1],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 1],
            ['filter_category_id' => 'CAFE', 'establishment_id' => 1],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 1],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 1],
            ['filter_category_id' => 'INDO', 'establishment_id' => 1],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 1],
            ['filter_category_id' => 'MODE', 'establishment_id' => 1],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 1],
            ['filter_category_id' => 'BEER', 'establishment_id' => 2],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 2],
            ['filter_category_id' => 'CAFE', 'establishment_id' => 2],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 2],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 2],
            ['filter_category_id' => 'INDO', 'establishment_id' => 2],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 2],
            ['filter_category_id' => 'MODE', 'establishment_id' => 2],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 2],
            ['filter_category_id' => 'BEER', 'establishment_id' => 3],
            ['filter_category_id' => 'REST', 'establishment_id' => 3],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 3],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 3],
            ['filter_category_id' => 'INDO', 'establishment_id' => 3],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 3],
            ['filter_category_id' => 'MODE', 'establishment_id' => 3],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 3],
            ['filter_category_id' => 'BEER', 'establishment_id' => 4],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 4],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 4],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 4],
            ['filter_category_id' => 'INDO', 'establishment_id' => 4],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 4],
            ['filter_category_id' => 'MODE', 'establishment_id' => 4],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 4],
            ['filter_category_id' => 'BEER', 'establishment_id' => 5],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 5],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 5],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 5],
            ['filter_category_id' => 'INDO', 'establishment_id' => 5],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 5],
            ['filter_category_id' => 'MODE', 'establishment_id' => 5],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 5],
            ['filter_category_id' => 'LIQR', 'establishment_id' => 6],
            ['filter_category_id' => 'CLAD', 'establishment_id' => 6],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 6],
            ['filter_category_id' => 'DOL1', 'establishment_id' => 6],
            ['filter_category_id' => 'AVAI', 'establishment_id' => 6],
            ['filter_category_id' => 'TECH', 'establishment_id' => 6],
            ['filter_category_id' => 'VODK', 'establishment_id' => 6],
            ['filter_category_id' => 'SING', 'establishment_id' => 6],
            ['filter_category_id' => 'FAIN', 'establishment_id' => 6],
            ['filter_category_id' => 'INDO', 'establishment_id' => 6],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 7],
            ['filter_category_id' => 'REST', 'establishment_id' => 7],
            ['filter_category_id' => 'WHIS', 'establishment_id' => 7],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 7],
            ['filter_category_id' => 'CAFE', 'establishment_id' => 7],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 7],
            ['filter_category_id' => 'WINE', 'establishment_id' => 7],
            ['filter_category_id' => 'CLAD', 'establishment_id' => 7],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 7],
            ['filter_category_id' => 'JAZZ', 'establishment_id' => 7],
            ['filter_category_id' => 'DOL3', 'establishment_id' => 8],
            ['filter_category_id' => 'CLUB', 'establishment_id' => 8],
            ['filter_category_id' => 'RUM1', 'establishment_id' => 8],
            ['filter_category_id' => 'HITE', 'establishment_id' => 8],
            ['filter_category_id' => 'OUTD', 'establishment_id' => 8],
            ['filter_category_id' => 'TEQU', 'establishment_id' => 8],
            ['filter_category_id' => 'RAP1', 'establishment_id' => 8],
            ['filter_category_id' => 'CHAM', 'establishment_id' => 8],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 8],
            ['filter_category_id' => 'MODE', 'establishment_id' => 8],
            ['filter_category_id' => 'DOL1', 'establishment_id' => 9],
            ['filter_category_id' => 'BAR1', 'establishment_id' => 9],
            ['filter_category_id' => 'CIDR', 'establishment_id' => 9],
            ['filter_category_id' => 'AVAI', 'establishment_id' => 9],
            ['filter_category_id' => 'LIQR', 'establishment_id' => 9],
            ['filter_category_id' => 'ROCK', 'establishment_id' => 9],
            ['filter_category_id' => 'BRDY', 'establishment_id' => 9],
            ['filter_category_id' => 'INDO', 'establishment_id' => 9],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 9],
            ['filter_category_id' => 'CLAD', 'establishment_id' => 9],
            ['filter_category_id' => 'DOL2', 'establishment_id' => 10],
            ['filter_category_id' => 'MIXE', 'establishment_id' => 10],
            ['filter_category_id' => 'SAKE', 'establishment_id' => 10],
            ['filter_category_id' => 'CLUB', 'establishment_id' => 10],
            ['filter_category_id' => 'NAVA', 'establishment_id' => 10],
            ['filter_category_id' => 'HIPH', 'establishment_id' => 10],
            ['filter_category_id' => 'ABST', 'establishment_id' => 10],
            ['filter_category_id' => 'LOUD', 'establishment_id' => 10],
            ['filter_category_id' => 'MODE', 'establishment_id' => 10],
            ['filter_category_id' => 'POP1', 'establishment_id' => 10]
        ]);
    }
}
