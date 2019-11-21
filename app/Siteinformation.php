<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siteinformation extends Model
{
    public function gallery(){

    	return $this->belongsTo('App\Sitegallery');
    }
}
