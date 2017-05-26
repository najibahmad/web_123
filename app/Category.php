<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'category';

  protected $fillable = [
    'nama',
  ];
  public function post(){
    return $this->hasMany('App\Post','catogery_id','id');
  }
}