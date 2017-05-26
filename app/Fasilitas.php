<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    //
    //
    protected $table = 'fasilitas';
    protected $fillable = [
      'nama',
      'alamat',
      'jenis_fasilitas_id',
    ];

    public function jenis_fasilitas(){
      return $this->belongsTo('App\JenisFasilitas','jenis_fasilitas_id');
    }
}
