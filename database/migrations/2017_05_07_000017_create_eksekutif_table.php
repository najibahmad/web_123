<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEksekutifTable extends Migration
{
    /**
     * Run the migrations.
     * @table eksekutif
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksekutif', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->string('alamat', 45)->nullable();
            $table->string('jabatan', 45)->nullable();
            $table->integer('grup_eksekutif_id')->unsigned();;


            $table->foreign('grup_eksekutif_id')
                ->references('id')->on('grup_eksekutif');
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
       Schema::dropIfExists('eksekutif');
     }
}
