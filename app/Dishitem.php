<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishitem extends Model
{
    public function dish(){
    	
    	return $this->belongsTo('App\Dish');
    }
}
