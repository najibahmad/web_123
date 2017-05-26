<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinasBadanBagianTable extends Migration
{
    /**
     * Run the migrations.
     * @table dinas_badan_bagian
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas_badan_bagian', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('jenis', 45)->nullable();
            $table->string('nama', 45)->nullable();
            $table->string('pimpinan', 45)->nullable();
            $table->string('jabatan', 45)->nullable();
            $table->string('alamat')->nullable();
            $table->string('telp', 45)->nullable();
            $table->string('website', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->text('post')->nullable();
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
       Schema::dropIfExists('dinas_badan_bagian');
     }
}
