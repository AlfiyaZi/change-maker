<?php

namespace App;

use App\Elegant;
use Illuminate\Database\Eloquent\Model;

class Story extends Elegant
{
  protected $fillable = ['title','body'];
  protected $rules = ['title' => 'min:3|max:254|required',
                      'body' => 'required|min:3'];
  public function media($query){
    return $this->hasMany('App\StoryMedia');
  }
  public function owner(){
    return $this->hasOne('App\User');
  }
  public function emotes(){
    return $this->belongsToMany('App\User')->withPivot('emotion');
  }
}
