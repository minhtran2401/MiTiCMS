<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobangbilling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->integer('user_id');
            $table->integer('service_group_id');
            $table->integer('service_type_id');
            $table->string('sku');
            $table->integer('invoice_payment');
            $table->string('total_invoice');
            $table->string('pack_price');
            $table->text('invoice_note');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
