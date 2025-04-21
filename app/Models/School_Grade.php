<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_Grade extends Model
{
    
    protected $table = 'school_grade';

    public function subject(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
