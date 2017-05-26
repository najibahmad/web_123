<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    protected $fillable = [
      'level',
      'nama',
      'id_parent',
      'type',
      'route',
      'id_post',
    ];
}
