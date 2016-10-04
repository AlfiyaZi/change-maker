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
    public $is_verified = true;
    public $is_authorized = true;
    protected $fillable = 
        ['name', 'email', 'password','phone','avatar','location'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email'
    ];
    public function stories(){
      return $this->hasMany('App\Story');
    }
    public function organizations(){
      return $this->hasMany('App\Organization');
    }
    public function actions(){
      return $this->hasMany('App\Action');
    }
    public function volunteer_activities(){
        return $this->hasMany('App\ServiceLog');
    }
    public function owns($object){
      return $object->user_id === $this->id;
    }
    public function orgFollows(){
      return $this->belongsToMany('App\Organization');
    }
    public function follows($organization){
      if($this->orgFollows->contains($organization->id)){
        return true;
      }
      return false;
    }

}
