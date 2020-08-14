<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplyCourse extends Model
{
    protected $table = "apply_courses";
    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault();
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }
}
