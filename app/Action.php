<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'name', 'description', 'duration','type','is_certified'
    ];
    
    public function user(){
      return $this->belongsTo('App\User');
      
    }
}
