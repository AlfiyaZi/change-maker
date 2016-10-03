<?php

namespace App;

use App\Elegant;
use Illuminate\Database\Eloquent\Model;

class Organization extends Elegant
{
    //
  protected $fillable = ['name','ein','avatar','description',
                       'address','city','region','postalCode',
                       'country','missionStatement','phone',
                       'organizationURL','donateURL'];

  protected $rules = ['name' => 'min:3|max:254|required|unique:organizations,name',
                    'ein' => 'unique:organizations,ein|digits:9',
                    'description' => 'required|min:3',
                    'organizationURL' => 'url',
                    'donateURL' => 'url',
                    'missionStatement' => 'min:5'];



  protected $errors;


  public function owner(){
    return $this->belongsTo('App\User');
  }
  public function isOwnedBy(User $user){
    return $user->id === $this->user_id;
  }
  public function verify($status=true){
    $this->is_verified = $status;
    $this->save();
    return true;
  }
  public function make_charitable($status=true){
    $this->is_charitable = $status;
    $this->save();
    return true;
  }
  public function sanitize(){
    $this->ein = str_replace('-', '', $this->ein);
  }
  public function updateRules(){
    $this->rules['name'] = 'min:3|max:254|required|unique:organizations,name,' . $this->id;
    $this->rules['ein'] = 'digits:9|unique:organizations,ein,' . $this->id;
    return $this->rules;
  }
}
