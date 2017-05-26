<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupEksekutif extends Model
{
    //
    protected $table = 'grup_eksekutif';
    protected $fillable = [
      'nama_grup',
    ];
    public function eksekutif(){
      return $this->hasMany('App\Eksekutif','grup_eksekutif_id','id');
    }
}
