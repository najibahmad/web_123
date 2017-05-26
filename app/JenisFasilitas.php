<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisFasilitas extends Model
{
    //
    protected $table = 'jenis_fasilitas';
    protected $fillable = [
      'jenis_fasilitas',
    ];
    public function fasilitas(){
      return $this->hasMany('App\Fasilitas','jenis_fasilitas_id','id');
    }
}
