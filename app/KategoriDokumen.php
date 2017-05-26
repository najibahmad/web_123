<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    //
    protected $table = 'kategori_dokumen';

    protected $fillable = [
      'nama',
    ];
    public function dokumen(){
      return $this->hasMany('App\DokumenDaerah','kategori_dokumen_id','id');
    }
}
