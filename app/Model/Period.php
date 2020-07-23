<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

    // protected $dates = ['period_at'];
    public function course(){
        return $this->belongsTo(OfferedCourse::class, 'offered_course_id', 'id')->withDefault();
    }

    public function group(){
        return $this->belongsTo(Group::class)->withDefault();
    }
}
