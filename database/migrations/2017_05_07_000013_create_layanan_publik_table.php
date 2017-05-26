<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayananPublikTable extends Migration
{
    /**
     * Run the migrations.
     * @table layanan_publik
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_publik', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('judul', 45)->nullable();
            $table->text('content')->nullable();
            $table->integer('jenis_layanan_publik_id')->unsigned();;


            $table->foreign('jenis_layanan_publik_id')
                ->references('id')->on('jenis_layanan_publik');

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
       Schema::dropIfExists('layanan_publik');
     }
}
