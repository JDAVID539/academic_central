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
        'photo'


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
    // Relación con el modelo User
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos con super_administrador
    public function super_administrador()
    {
        return $this->hasMany(super_administrador::class);
    }
}
