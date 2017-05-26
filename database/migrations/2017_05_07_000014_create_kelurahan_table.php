<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     * @table kelurahan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('kecamatan_id')->unsigned();;
            $table->string('nama_kelurahan', 45)->nullable();
            $table->string('nama_pimpinan', 45)->nullable();
            $table->string('alamat')->nullable();
            $table->string('email', 45)->nullable();


            $table->foreign('kecamatan_id')
                ->references('id')->on('kecamatan');
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
       Schema::dropIfExists('kelurahan');
     }
}
