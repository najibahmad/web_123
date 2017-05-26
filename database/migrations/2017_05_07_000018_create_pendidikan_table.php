<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     * @table pendidikan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->string('alamat', 45)->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('jenjang_pendidikan_id')->unsigned();;


            $table->foreign('jenjang_pendidikan_id')
                ->references('id')->on('jenjang_pendidikan');
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
       Schema::dropIfExists('pendidikan');
     }
}
