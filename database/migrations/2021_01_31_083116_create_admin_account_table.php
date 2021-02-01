<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_account', function (Blueprint $table) {
            $table->id('admin_account_id');                     // 1
            $table->string('admin_account_type');               // AWS
            $table->integer('admin_account_email')->nullable;   // 1 (despacitolv1@gmail.com)
            $table->string('password');                         // 123456
            $table->string('phone');                            // 0834518640
            $table->timestamps();                               // 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_account');
    }
}
