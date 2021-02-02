<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_service', function (Blueprint $table) {
            $table->id('account_id');
            $table->integer('service_group_id');        // Tài khoản
            $table->integer('service_type_id');         // Gmail | Facebook | AWS 
            $table->string('sku');                      // afngheg | anghrje
            $table->string('account_image')->nullable();// Hình ảnh
            $table->string('account_name');             // Tài khoản drive unlimited
            $table->text('account_info');               // Thông tin chi tiết của tài khoản
            $table->integer('display');                 // Ẩn | Hiện
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
        Schema::dropIfExists('account_service');
    }
}
