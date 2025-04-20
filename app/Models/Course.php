<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_course', // Cambiado a 'name_course'
        'description_course', // Cambiado a 'description_course'
    ];
    //relacion de usuaario de uno a muchos de cursos con materiaS
    public function subjects()
    {
        return $this->hasMany('App\Models\subject');
    }

    //relacion de uno a muchos con estudiantes 
    public function students()
    {
        return $this->hasMany('App\Models\student');
    }
    public function teacher(){
        return $this -> belongsTo('app\models\teacher');
    }
}
