<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //Create relationship between models
    public function photos(){
        return $this->hasMany('App\Models\Photo');
    }
}
