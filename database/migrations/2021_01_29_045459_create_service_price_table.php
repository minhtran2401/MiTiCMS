<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_price', function (Blueprint $table) {
            $table->id('service_price_id');
            $table->integer('service_group_id');
            $table->integer('service_type_id');
            $table->string('sku');
            $table->integer('service_price');
            $table->text('service_time');
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('service_price');
    }
}
