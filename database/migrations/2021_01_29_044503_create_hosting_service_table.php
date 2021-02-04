<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosting_service', function (Blueprint $table) {
            $table->id('hosting_id');
            $table->integer('service_group_id');
            $table->integer('service_type_id');
            $table->string('sku');
            $table->string('hosting_image')->nullable();
            $table->string('hosting_name');
            $table->text('hosting_profile');
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
        Schema::dropIfExists('hosting_service');
    }
}
