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
        Schema::create('menu_links', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement()->from(0);
            $table->unsignedBigInteger('establishment_id')->unsigned();
            $table->foreign('establishment_id')->references('id')->on('registered_establishments');
            $table->integer('list_number');
            $table->string('link_to_menu_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_links');
    }
};
