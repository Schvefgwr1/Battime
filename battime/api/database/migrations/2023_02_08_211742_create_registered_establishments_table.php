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
        Schema::create('registered_establishments', function (Blueprint $table) {
            $table->id();
            $table->integer('likes')->default(0);
            $table->foreignId('establishment_id')->constrained()->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_vk')->nullable();
            $table->string('contact_inst')->nullable();
            $table->string('contact_tg')->nullable();
            $table->string('link_to_avatar')->nullable();
        });
    }

    public function down()
    {
        if(Schema::hasTable('menu_links')) {
            Schema::table('menu_links', function (Blueprint $table) {
                $table->dropForeign(['establishment_id']); // Assuming 'establishment_id' is the correct column name
            });
        }
        Schema::dropIfExists('registered_establishments');
    }
};
