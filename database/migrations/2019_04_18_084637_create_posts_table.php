<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unique_id');
            $table->string('title',255);
            $table->text('short_text',500);
            $table->text('html_code');
            $table->string('img');
            $table->text('meta_k',500);
            $table->text('meta_d',500);
            $table->string('status')->default('published');
            $table->date('date');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('langs');
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
        Schema::dropIfExists('posts');
    }
}
