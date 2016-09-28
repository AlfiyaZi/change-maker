<?php

namespace App;

use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','avatar','location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function stories(){
      return $this->hasMany('App\Story');
    }
    public function organizations(){
    
      return $this->hasMany('App\Organization');
    }
    public function attribs(){
      return $this->hasMany('App\Attribute');
    }
    public function actions(){
      return $this->hasMany('App\Action');
    }
}
