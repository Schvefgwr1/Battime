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
        Schema::create('filter_category_establishment_relation', function (Blueprint $table) {
            $table->string("filter_category_id");
            $table->unsignedBigInteger("establishment_id");
            $table->foreign('establishment_id', 'est_id_fk')->references('id')->on('establishments');
            $table->foreign('filter_category_id', 'fc_id_fk')->references('id_filt')->on('filter_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filter_category_establishment_relation');
    }
};
