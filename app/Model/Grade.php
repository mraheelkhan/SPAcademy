<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Grade extends Model
{
    use SoftDeletes;
    protected $table = "grades";
    public function enrolment(){
    	return $this->hasMany(Enrollment::class, 'grade_id', 'id');
    }

    public function courses(){
    	return $this->hasMany(Course::class, 'grade_id', 'id');
    }
}
