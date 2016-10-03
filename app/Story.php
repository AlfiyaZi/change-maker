<?php

namespace App;

use App\Elegant;
use Illuminate\Database\Eloquent\Model;

class Story extends Elegant
{
    public function media($query){
      return $this->hasMany('App\StoryMedia');
    }
    public function owner(){
      return $this->belongsTo('App\User');
    }
}
