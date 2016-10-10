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
        'password', 'remember_token','email','phone'
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
    public function follows($organization)
    {
      if($this->orgFollows->contains($organization->id)){
        return true;
      }
      return false;
    }
    public function emoted($object)
    {
      return $object->emotions->contains($this);
    }
    public function projects()
    {
      return $this->hasMany('App\Project');
    }
    public function rsvps()
    {
      return $this->belongsToMany('App\Project')
                  ->withPivot('role','rating');
    }
    public function emotes()
    {
        return $this->belongsToMany('App\Story')
                    ->withPivot('emotion');
      
    }
    public function is_attending($project){
        return $this->rsvps->contains($project);
    }

    public function emote($object, $emotion){
      if($object->emotions->contains($this)){
        $object->emotions()->detach($this);
      }
      $object->emotions()->attach($this, ['emotion'=>$emotion]);
      return $object;
    }
    public function setRole($level){
      $this->role=$level;
      $this->save();
    }
    public function user_follows(){
      return $this->belongsToMany('App\User','user_follows','user_id','target_id');
    }
    public function followUser(User $user){
      if(auth()->user()->id != $user->id){
        $this->user_follows()->toggle($user->id);
        $this->save();
      }
    }
    public function unfollowUser(User $user){
      $this->user_follows()->detach($user->id);
    }


}
