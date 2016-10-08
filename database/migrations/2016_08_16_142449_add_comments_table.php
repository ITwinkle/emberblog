<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function (Blueprint $table) {
        $table->increments('id');
        $table->string('text');
        $table->timestamps();
      });

      Schema::table('comments', function(Blueprint $table){
        $table->integer('post_id')->index()->unsigned();
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
