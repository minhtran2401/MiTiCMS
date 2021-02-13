<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_service', function (Blueprint $table) {
            $table->id('domain_id');
            $table->string('sku');    
            $table->string('price_show');                     // ( dabcxyz | dngheyd | ...)
            $table->string('domain_type');              // ( [1] Phổ Biến | [2] VN | [3] Quốc tế )
            $table->string('domain_image')->nullable(); // ( Hình ảnh )
            $table->string('name');              // ( .com | .net | ... )
            $table->integer('status');                  // ( [1] Nổi bật | [2] Khuyến mãi | [3] Ẩn )
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
        Schema::dropIfExists('domain_service');
    }
}
