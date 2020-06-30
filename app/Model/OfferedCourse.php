<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfferedCourse extends Model
{
    public function course(){
        return $this->belongsTo(Course::class)->withDefault();
    }

    public function group(){
        return $this->belongsTo(Group::class)->withDefault();
    }
}
