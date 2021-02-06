<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id('blog_id');
            $table->integer('blog_type_id');
            $table->string('blog_name');
            $table->string('blog_image');
            $table->text('blog_summary');
            $table->date('blog_post_time');
            $table->text('blog_content');
            $table->integer('display');
            $table->string('slug')->unique();
            $table->integer('blog_view');
            $table->integer('user_id');
            $table->string('blog_tag');
            $table->integer('blog_special');
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
        Schema::dropIfExists('blog');
    }
}
