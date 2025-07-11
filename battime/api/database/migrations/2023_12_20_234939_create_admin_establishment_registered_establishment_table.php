<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_establishment_registered_establishment', function (Blueprint $table) {
            // Используем метод foreignId, но вместо метода constrained указываем конкретное имя таблицы и поля
            $table->unsignedBigInteger('admin_establishment_id');
            $table->foreign('admin_establishment_id', 'admin_est_id_fk')
                ->references('id')
                ->on('admin_establishments')
                ->onDelete('cascade');

            $table->unsignedBigInteger('registered_establishment_id');
            $table->foreign('registered_establishment_id', 'reg_est_id_fk')
                ->references('id')
                ->on('registered_establishments')
                ->onDelete('cascade');

            $table->timestamps();

            $table->primary(['admin_establishment_id', 'registered_establishment_id'], 'admin_reg_est_pk'); // Композитный первичный ключ с коротким именем
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_establishment_registered_establishment');
    }

};
