<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JaringanInformasi extends Model
{
    //
    protected $table = 'jaringan_informasi';
    protected $fillable = [
      'nama',
      'link',
    ];
}
