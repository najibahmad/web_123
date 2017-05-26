<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisLayananPublik extends Model
{
    //
    protected $table = 'jenis_fasilitas';
    protected $fillable = [
      'jenis_layanan_publik',
    ];
    public function fasilitas(){
      return $this->hasMany('App\LayananPublik','jenis_layanan_publik_id','id');
    }
}
