<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function task(){
        return $this ->belongsTo('App\Models\Task');
    }
    public function student(){
        return $this ->belongsTo('App\Models\Student');
    }

    //relacion con usuarios 
    public function user(){
        return $this ->hasMany('App\Models\User');
    }
}
