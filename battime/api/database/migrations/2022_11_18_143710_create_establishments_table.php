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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('workload_parameter')->default(0);
            $table->string('link_to_emoji')->nullable();
            $table->float('address_latitude', 10, 6)->default(0);
            $table->float('address_longitude', 10, 6)->default(0);
            $table->string('address')->default("0");
        });
    }

    public function down()
    {
        if(Schema::hasTable('registered_establishments')) {
            Schema::table('registered_establishments', function (Blueprint $table) {
                $table->dropForeign(['establishment_id']);
            });
        }
        if(Schema::hasTable('likes')) {
            Schema::table('likes', function (Blueprint $table) {
                $table->dropForeign(['establishment_id']);
            });
        }
        if(Schema::hasTable('filter_category_establishment_relation')) {
            Schema::table('filter_category_establishment_relation', function (Blueprint $table) {
                $table->dropForeign(['establishment_id']);
            });
        }
        Schema::dropIfExists('establishments');
    }
};
