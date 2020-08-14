<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grades";
    public function enrolment(){
    	return $this->hasMany(Enrollment::class, 'grade_id', 'id');
    }
}
