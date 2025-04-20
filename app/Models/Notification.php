<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function task(){
        return $this ->belongsTo('app\models\task');
    }
    public function student(){
        return $this ->belongsTo('app\models\student');
    }

    //relacion con usuarios 
    public function user(){
        return $this ->hasMany('app\models\user');
    }
}
