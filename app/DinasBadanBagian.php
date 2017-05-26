<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DinasBadanBagian extends Model
{
    //
    protected $table = 'dinas_badan_bagian';


    protected $fillable = [
        'jenis',
        'nama',
        'pimpinan',
        'jabatan',
        'alamat',
        'telp',
        'website',
        'email',
        'post',
    ];
}
