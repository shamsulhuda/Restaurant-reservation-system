<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitegallery extends Model
{
    public function siteinformation(){

    	return $this->hasOne('App\Siteinformation');
    }
}
