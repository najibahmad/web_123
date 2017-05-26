<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table = 'kecamatan';
    protected $fillable = [
      'nama_kecamatan',
      'nama_pimpinan',
      'alamat',
      'faks',
      'website',
      'email',
    ];
    public function kelurahan(){
      return $this->hasMany('App\Kelurahan','kecamatan_id','id');
    }
}
