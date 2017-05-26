<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplikasiDaerahTable extends Migration
{
    /**
     * Run the migrations.
     * @table aplikasi_daerah
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplikasi_daerah', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->string('link')->nullable();
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
       Schema::dropIfExists('aplikasi_daerah');
     }
}
