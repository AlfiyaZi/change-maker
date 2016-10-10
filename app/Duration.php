<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duration extends Elegant
{
    protected $fillable = ['start','end','timezone'];
    protected $rules = ['start'=>'required|date',
                        'end'=>'required|date',
                        'timezone'=>'required'];
    public function project()
    {
      return $this->belongsTo('App\Project');
    }
}
