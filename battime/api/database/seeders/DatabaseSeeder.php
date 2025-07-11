<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Establishment\AdminEstablishmentSeeder;
use Database\Seeders\Establishment\EstablismentSeed;
use Database\Seeders\Establishment\RegisteredEstablishmentsSeeder;
use Database\Seeders\Filters\BackgroundNoiseLevelFilterSeed;
use Database\Seeders\Filters\DrinksFiltersSeed;
use Database\Seeders\Filters\EstablishmentDesignFilterSeed;
use Database\Seeders\Filters\EstablishmentTypeFilterSeed;
use Database\Seeders\Filters\MusicFiltersSeed;
use Database\Seeders\Filters\PlaceForDancingFilterSeed;
use Database\Seeders\Filters\PriceFilterSeed;
use Database\Seeders\SuperAdmins\SuperAdminSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_category')->delete();
        $this->call(MusicFiltersSeed::class);
        $this->call(DrinksFiltersSeed::class);
        $this->call(PriceFilterSeed::class);
        $this->call(EstablishmentTypeFilterSeed::class);
        $this->call(EstablishmentDesignFilterSeed::class);
        $this->call(BackgroundNoiseLevelFilterSeed::class);
        $this->call(PlaceForDancingFilterSeed::class);
        DB::table('establishments')->delete();
        $this->call(EstablismentSeed::class);
        $this->call(RegisteredEstablishmentsSeeder::class);
        $this->call(MenuLinksSeeder::class);
        $this->call(FilterCategoryEstablishmentRelationSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(AdminEstablishmentSeeder::class);
    }
}
