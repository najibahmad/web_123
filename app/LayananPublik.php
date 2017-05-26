<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananPublik extends Model
{
    //
    protected $table = 'fasilitas';
    protected $fillable = [
      'judul',
      'conten',
      'jenis_layanan_publik_id',
    ];

    public function jenis_layanan_publik(){
      return $this->belongsTo('App\JenisLayananPublik','jenis_layanan_publik_id');
    }
}
