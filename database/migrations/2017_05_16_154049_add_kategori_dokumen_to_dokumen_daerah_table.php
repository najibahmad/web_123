<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKategoriDokumenToDokumenDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_daerah', function (Blueprint $table) {
            //
            $table->integer('kategori_dokumen_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_daerah', function (Blueprint $table) {
            //
            $table->dropColumn('kategori_dokumen_id');
        });
    }
}
