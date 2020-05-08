<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

\Carbon\Carbon::setToStringFormat('d-m-Y');

class Student extends Model
{
    protected $dates = [
        'birth_date',
        'joining_date'
    ];

    public function board() {
        return $this->belongsTo('App\Models\Board');
    }
}
