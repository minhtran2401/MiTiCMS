<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_service', function (Blueprint $table) {
            $table->id('server_id');
            $table->integer('service_group_id');
            $table->integer('service_type_id');
            $table->string('sku');
            $table->string('server_image')->nullable();
            $table->string('name');
            $table->text('server_profile');
            $table->integer('display');
            $table->string('slug')->nullable()->unique();
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
        Schema::dropIfExists('server_service');
    }
}
