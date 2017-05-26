<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupMuspidaTable extends Migration
{
    /**
     * Run the migrations.
     * @table grup_muspida
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_muspida', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama_grup')->nullable();
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
       Schema::dropIfExists('grup_muspida');
     }
}
