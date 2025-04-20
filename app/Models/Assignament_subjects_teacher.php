<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignament_subjects_teacher extends Model
{
    public function teacher()
    {
        return $this->hasMany('App\Models\teacher');
    }

    //relacion con materiuas muchosa uno
    public function subject()
    {
        return $this->belongsTo('App\Models\subject');
    }
}
