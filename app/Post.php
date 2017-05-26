<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $fillable = [
      'content',
      'title',
      'tanggal_post',
      'author',
      'keyword',
      'category_id',
    ];

    public function category(){
      return $this->belongsTo('App\Category','category_id');
    }
}
