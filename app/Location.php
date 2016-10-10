<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Elegant
{
    //

  protected $fillable = [
    'name','address','city','region',
    'postalCode','lat','lng'
  ];
  protected $rules = [
    'name' => 'required|min:5',
  ];

  public function geocode(){
    //TODO
    if($this->is_geocodeable()){
      //get the geocode of the event and save it
    }
  }
  private function is_geocodeable(){
    if(isset($this->name)){

    }
  }
  public function project(){
    return $this->belongsTo('App\Project');
  }
}
