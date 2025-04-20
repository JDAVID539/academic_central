<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School_Grade extends Model
{
    public function subject(){
        return $this ->belongsTo('app\models\subject');
    }
}
