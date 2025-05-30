<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['foto', 'phone', 'address', 'user_id'];

    //uno a uno con usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User', );	
    }
}
