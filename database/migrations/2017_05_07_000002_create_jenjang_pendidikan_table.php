<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenjangPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     * @table jenjang_pendidikan
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenjang_pendidikan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('jenjang', 45)->nullable();
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
       Schema::dropIfExists('jenjang_pendidikan');
     }
}
