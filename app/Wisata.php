<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    //
    protected $table = 'wisata';
    protected $fillable = [
      'nama',
      'keterangan',
      'foto',
      
    ];

}
