<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplikasiDaerah extends Model
{
    //
    protected $table = 'aplikasi_daerah';

    protected $fillable = [
        'nama',
        'link',
        
    ];
}
