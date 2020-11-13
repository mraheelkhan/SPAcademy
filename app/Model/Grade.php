<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grades";
    public function enrolment(){
    	return $this->hasMany(Enrollment::class, 'grade_id', 'id');
    }

    public function courses(){
    	return $this->hasMany(Course::class, 'grade_id', 'id');
    }
}
