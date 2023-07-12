<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('thumbnail');
            $table->unsignedBigInteger('category_id');
            $table->text('content');
            $table->integer('is_headline');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::create('comment', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('post_id');
            $table->string('name');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts');
        });
        Schema::create('sliders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->string('url');
            $table->integer('order');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
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
