<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     * @table kecamatan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama_kecamatan', 45)->nullable();
            $table->string('nama_pimpinan', 45)->nullable();
            $table->string('alamat')->nullable();
            $table->string('faks', 45)->nullable();
            $table->string('website', 45)->nullable();
            $table->string('email', 45)->nullable();
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
       Schema::dropIfExists('kecamatan');
     }
}
