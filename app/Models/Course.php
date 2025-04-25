<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_course', 
        'description_course', 
        'teacher_id',
    ];
    //relacion de usuaario de uno a muchos de cursos con materiaS
    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

    //relacion de uno a muchos con estudiantes 
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
    public function teacher(){
        return $this -> belongsTo('App\Models\Teacher');
    }
}
