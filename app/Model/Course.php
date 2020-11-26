<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
	use SoftDeletes;

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id', 'id')->withDefault();
    }
    public function instructor(){
        return $this->belongsTo('App\User', 'instructor_id', 'id')->withDefault();
    }
    public function enrollment(){
    	return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }


}
