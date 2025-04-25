<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $hidden = [
        'password', 
    ];

    protected $fillable = [
        'name',
        'name_school',
        'address',
        'city',
        'email',
        'phone',
        'password',
    ];
    

    //relacion uno a muchos con estudiantes y profesores
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
