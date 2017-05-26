<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisLayananPublikTable extends Migration
{
    /**
     * Run the migrations.
     * @table jenis_layanan_publik
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_layanan_publik', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('jenis_layanan_publik', 45)->nullable();
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
       Schema::dropIfExists('jenis_layanan_publik');
     }
}
