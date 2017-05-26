<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenDaerah extends Model
{
    //
    protected $table = 'dokumen_daerah';

    protected $fillable = [
      'judul',
      'konten',
      'link_download',
      'kategori_dokumen_id',
      'format',
    ];

    public function kategori_dokumen(){
      return $this->belongsTo('App\KategoriDokumen','kategori_dokumen_id');
    }
}
