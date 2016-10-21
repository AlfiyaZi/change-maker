<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Elegant
{
  protected $fillable = ['organization_id', 'email', 'tags'];
  protected $rules = ['email' => 'required|email'];
  public function organization() {
    return $this->belongsTo('App\Organization');
  }
}
