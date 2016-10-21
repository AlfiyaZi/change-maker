<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = ['organization_id', 'email', 'tags'];
  
  public function organization() {
    return $this->belongsTo('App\Organization');
  }
}
