<?php
namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Elegant extends Model
{
  protected $rules = array();
  protected $errors;

  public function validate($data,$rules=[]){
    $rules = empty($rules) ? $this->rules : $rules;
    $v = Validator::make($data, $this->rules);

    if($v->fails()){
      $this->errors = $v->errors()->all();
      return false;
    }
    return true;
  }
  public function errors(){
    return $this->errors;
  }

  public function emotions()
  {
    return $this->belongsToMany('App\User',
      strtolower(class_basename($this)) . '_emotions');
  }

}
