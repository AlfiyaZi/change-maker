<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Elegant
{
  protected $fillable = ['organization_id', 'email', 'tags', 'image_url', 'location', 'uid', 'provider', 'name'];
  protected $rules = ['email' => 'required|email'];
  public function organization() {
    return $this->belongsTo('App\Organization');
  }
  public function friends() {
    return $this->hasMany('App\ContactFriend');
  }
}
