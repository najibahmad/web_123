<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksekutif extends Model
{
    //
    protected $table = 'eksekutif';
    protected $fillable = [
      'nama',
      'alamat',
      'jabatan',
      'grup_eksekutif_id',
    ];

    public function grup_eksekutif(){
      return $this->belongsTo('App\GrupEksekutif','grup_eksekutif_id');
    }
}
