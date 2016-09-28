<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function media($query){
      return $this->hasMany('App\StoryMedia');
    }
    public function owner(){
      return $this->belongsTo('App\User');
    }
}
