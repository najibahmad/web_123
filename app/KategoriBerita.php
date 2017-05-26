<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    //
    protected $table = 'kategori_berita';

    protected $fillable = [
      'nama',
    ];
    public function berita(){
      return $this->hasMany('App\Berita','kategori_berita_id','id');
    }
}
