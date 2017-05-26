<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJaringanInformasiTable extends Migration
{
    /**
     * Run the migrations.
     * @table jaringan_informasi
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaringan_informasi', function (Blueprint $table) {
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
       Schema::dropIfExists('jaringan_informasi');
     }
}
