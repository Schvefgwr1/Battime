<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_links')->insert([
           [
               'id' => 1,
               'establishment_id' => 1,
               'list_number' => 1,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst1.png'
           ],
           [
               'id' => 2,
               'establishment_id' => 2,
               'list_number' => 1,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst1.png'
           ],
           [
               'id' => 3,
               'establishment_id' => 3,
               'list_number' => 1,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst1.png'
           ],
           [
               'id' => 4,
               'establishment_id' => 4,
               'list_number' => 1,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst1.png'
           ],
           [
               'id' => 5,
               'establishment_id' => 1,
               'list_number' => 2,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst2.png'
           ],
           [
               'id' => 6,
               'establishment_id' => 2,
               'list_number' => 2,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst2.png'
           ],
           [
               'id' => 7,
               'establishment_id' => 2,
               'list_number' => 3,
               'link_to_menu_photo' => 'http://localhost:8000/storage/establishment_menu/TestMenuEst2.png'
           ]
        ]);
    }
}
