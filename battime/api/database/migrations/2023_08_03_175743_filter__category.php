<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        //создание таблицы
        Schema::create('filter_category', function (Blueprint $table) {
            $table->string('id_filt')->unique()->primary();
            $table->string('mame_filter')->nullable();
            $table->string('category_filter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_establishments');
    }

};
