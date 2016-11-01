<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Elegant
{

  protected $fillable = [
    'name','description','rsvpMax','minimumAge','sexRestrictedTo',
    'backgroundCheckRequired', 'is_virtual'
  ];

  protected $rules = [
    'name'        => 'required|min:5|max:140',
    'description' => 'required|min:5',
    'rsvpCount'   =>  'integer',
    'rsvpMax'     =>  'integer|min:1',
    'minimumAge'  =>  'digits:0,120',
    'sexRestrictedTo' => 'in:m,f,t,n,o',
    'backgroundCheckRequired' =>'boolean',
    'privacy' => 'in:private,public,unlisted',
    'status'  => 'in:draft,ready',
  ];

  public function durations(){
    return $this->hasMany('App\Duration');
  }

  public function locations(){
    return $this->hasMany('App\Location');
  }

  public function rsvps(){
    return $this->belongsToMany('App\User')
                ->withPivot('role','rating');
  }

  public function setStatus($status){
    $this->status = $status;
    $this->save();
  }
  public function setPrivacy($privacy){
    $this->privacy = $privacy;
    $this->save();
  }

}
