<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function dish_items(){
    	
    	return $this->hasMany('App\Dishitem');
    }
}
