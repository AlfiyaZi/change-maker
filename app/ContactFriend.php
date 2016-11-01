<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFriend extends Model
{
  protected $fillable = [
    'name', 'uid', 'provider'
  ];
}
