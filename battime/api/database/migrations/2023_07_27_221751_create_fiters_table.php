<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_establishments', function (Blueprint $table) {
            $table->id();
            //Music

            $table->boolean('ROCK')->default(false);
            $table->boolean('POPA')->default(false);
            $table->boolean('KPOP')->default(false);
            $table->boolean('TECH')->default(false);
            $table->boolean('RAP1')->default(false);
            $table->boolean('HIPH')->default(false);

            // Drinks

            $table->boolean('VODK')->default(false);
            $table->boolean('TEQU')->default(false);
            $table->boolean('wine')->default(false);
            $table->boolean('LABE')->default(false);

            // Food

            $table->boolean('american')->default(false);
            $table->boolean('georgian')->default(false);
            $table->boolean('german')->default(false);
            $table->boolean('vegan')->default(false);

            // Price

            $table->boolean('dollar1')->default(false);//           $
            $table->boolean('dollar2')->default(false);//           $$
            $table->boolean('dollar3')->default(false);//           $$$

            // Establishment type

            $table->boolean('bar')->default(false);
            $table->boolean('cafe')->default(false);
            $table->boolean('club')->default(false);
            $table->boolean('restaurant')->default(false);//    просто ресторан???

            // Establishment design

            $table->boolean('modern')->default(false);
            $table->boolean('classic')->default(false);
            $table->boolean('high-tech')->default(false);


            // Background noise level

            $table->boolean('loud')->default(false);
            $table->boolean('moderate')->default(false);
            $table->boolean('faint')->default(false);

            // Place for dancing

            $table->boolean('available')->default(false);
            $table->boolean('not_available')->default(false);
            $table->boolean('indoor')->default(false);
            $table->boolean('outdoor')->default(false);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('filter_establishments', function (Blueprint $table) {
//            $table->dropForeign(['establishment_id']); // Assuming 'establishment_id' is the correct column name
//        });

        Schema::dropIfExists('filter_establishments');
    }
};
