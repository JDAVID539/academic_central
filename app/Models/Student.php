<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'teacher_assigned_id',
    ];

    //resivir la id de usuario
    public function user (){
        return $this -> belongsTo('App\Models\User');
    }
    public function course(){
        return $this ->belongsTo('App\Models\Course');
    }

    //estudiantes a calificaciones uno a muchos
    public function school_Grade(){
        return $this -> hasMany('App\Models\School_Grade');
    }

    public function notifications(){
        return $this -> hasMany('App\Models\Notification');
    }
    
    //estudiantes a asistencia uno a muchos
    public function attendance(){
        return $this -> belongsTo('App\Models\Attendance');
    }
}
