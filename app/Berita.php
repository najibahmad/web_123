<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $table = 'berita';
    protected $fillable = [
      'content',
      'title',
      'tanggal_post',
      'author',
      'keyword',
      'kategori_berita_id',
    ];

    protected $dates = ['tanggal_post'];

    public function kategori_berita(){
      return $this->belongsTo('App\KategoriBerita','kategori_berita_id');
    }
}
