<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenDaerahTable extends Migration
{
    /**
     * Run the migrations.
     * @table dokumen_daerah
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_daerah', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('judul', 45)->nullable();
            $table->string('konten')->nullable();
            $table->string('link_download', 45)->nullable();
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
       Schema::dropIfExists('dokumen_daerah');
     }
}
