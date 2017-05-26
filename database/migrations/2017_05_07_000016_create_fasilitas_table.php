<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     * @table fasilitas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->string('alamat')->nullable();
            $table->integer('jenis_fasilitas_id')->unsigned();;


            $table->foreign('jenis_fasilitas_id')
                ->references('id')->on('jenis_fasilitas');
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
       Schema::dropIfExists('fasilitas');
     }
}
