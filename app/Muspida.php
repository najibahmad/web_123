<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muspida extends Model
{
    //
    protected $table = 'muspida';
    protected $fillable = [
      'nama',
      'alamat_rumah',
      'alamat_kantor',
      'grup_muspida_id',
    ];

    public function grup_muspida(){
      return $this->belongsTo('App\GrupMuspida','grup_muspida_id');
    }
}
