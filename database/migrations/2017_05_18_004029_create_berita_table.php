<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->text('content')->nullable();
          $table->string('title')->nullable();
          $table->string('tanggal_post', 45)->nullable();
          $table->string('author', 45)->nullable();
          $table->string('keyword', 45)->nullable();
          $table->integer('kategori_berita_id')->unsigned();


          $table->foreign('kategori_berita_id')
              ->references('id')->on('kategori_berita');
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
        Schema::dropIfExists('berita');
    }
}
