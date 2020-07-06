<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function enrollmentc(){
        $this->hasMany('App\Enrollment')->withDefault();
    }
}
