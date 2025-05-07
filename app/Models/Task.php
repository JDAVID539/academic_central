<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

protected $fillable = [
        'name',
        'description',
        'deadline',
        'subject_id',
        'course_id',
    ];

    public function subject(){
        return $this ->belongsTo('App\Models\Subject');
    }
    public function attendances(){
        return $this ->hasMany('App\Models\Attendance');
    }

    //relacion con materias de uno a muchos
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    //relacion con entrega de tareas de muchos a uno
    public function submit_assignment()
    {
        return $this->hasMany('App\Models\Submit_assignment');
    }

    //relacion con estudiante 
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
