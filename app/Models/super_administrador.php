<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class super_administrador extends model
{
    protected $table = 'super_administradors';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
