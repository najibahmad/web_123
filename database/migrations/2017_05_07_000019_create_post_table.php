<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     * @table post
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('content')->nullable();
            $table->string('title')->nullable();
            $table->string('tanggal_post', 45)->nullable();
            $table->string('author', 45)->nullable();
            $table->string('keyword', 45)->nullable();
            $table->integer('category_id')->unsigned();;


            $table->foreign('category_id')
                ->references('id')->on('category');
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
       Schema::dropIfExists('post');
     }
}
