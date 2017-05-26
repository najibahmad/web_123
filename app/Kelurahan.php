<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $table = 'kelurahan';
    protected $fillable = [
      'nama_kelurahan',
      'nama_pimpinan',
      'alamat',
      'email',
      'kecamatan_id',
    ];

    public function kecamatan(){
      return $this->belongsTo('App\Kecamatan','kecamatan_id');
    }
}
