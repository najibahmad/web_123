<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupMuspida extends Model
{
    //
    protected $table = 'grup_muspida';
    protected $fillable = [
      'nama_grup',
    ];
    public function muspida(){
      return $this->hasMany('App\Muspida','grup_muspida_id','id');
    }
}
