<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    //
    protected $table = 'jenjang_pendidikan';
    protected $fillable = [
      'jenjang',
    ];
    public function pendidikan(){
      return $this->hasMany('App\Pendidikan','jenjang_pendidikan_id','id');
    }
}
