<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuspidaTable extends Migration
{
    /**
     * Run the migrations.
     * @table muspida
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muspida', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->text('alamat_kantor')->nullable();
            $table->integer('grup_muspida_id')->unsigned();


            $table->foreign('grup_muspida_id')
                ->references('id')->on('grup_muspida');
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
       Schema::dropIfExists('muspida');
     }
}
