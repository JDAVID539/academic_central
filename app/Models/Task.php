<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function subject(){
        return $this ->belongsTo('app\models\subject');
    }
    public function attendances(){
        return $this ->hasMany('app\models\attendance');
    }

    //relacion con materias de uno a muchos
    public function tasks()
    {
        return $this->hasMany('App\Models\task');
    }

    //relacion con entrega de tareas de muchos a uno
    public function submit_assignment()
    {
        return $this->hasMany('App\Models\submit_assignment');
    }

    //relacion con estudiante 
    public function students()
    {
        return $this->hasMany('App\Models\student');
    }
}
