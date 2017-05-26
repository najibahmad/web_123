<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    protected $table = 'pendidikan';
    protected $fillable = [
      'nama',
      'alamat',
      'status',
      'jenjang_pendidikan_id',
    ];

    public function jenjang_pendidikan(){
      return $this->belongsTo('App\JenjangPendidikan','jenjang_pendidikan_id');
    }
}
