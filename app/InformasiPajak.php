<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiPajak extends Model
{
    //
    protected $table = 'informasi_pajak';
    protected $fillable = [
      'judul',
      'content',
    ];

}
