<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiPajakTable extends Migration
{
    /**
     * Run the migrations.
     * @table informasi_pajak
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_pajak', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('judul', 45)->nullable();
            $table->text('content')->nullable();
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
       Schema::dropIfExists('informasi_pajak');
     }
}
