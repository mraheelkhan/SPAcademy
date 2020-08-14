<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

    // protected $dates = ['period_at'];
    public function course(){
        return $this->belongsTo(Course::class, 'course_id', 'id')->withDefault();
    }

    public function grade(){
        return $this->belongsTo(Grade::class)->withDefault();
    }
}
