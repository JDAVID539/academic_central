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
        return $this -> belongsTo('app\models\User');
    }
    public function course(){
        return $this ->belongsTo('app\models\course');
    }

    //estudiantes a calificaciones uno a muchos
    public function school_grades(){
        return $this -> hasMany('app\models\school_grade');
    }

    public function notifications(){
        return $this -> hasMany('app\models\notification');
    }
    
    //estudiantes a asistencia uno a muchos
    public function attendance(){
        return $this -> belongsTo('app\models\attendance');
    }
}
