<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     * @table jenis_fasilitas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_fasilitas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('jenis_fasilitas', 45)->nullable();
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
       Schema::dropIfExists('jenis_fasilitas');
     }
}
