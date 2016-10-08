<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('post');
          $table->timestamps();
        });

        // Schema::table('posts', function(Blueprint $table){
          // $table->integer('comments')->unsigned();
          // $table->foreign('comments')->references('id')->on('comments');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
