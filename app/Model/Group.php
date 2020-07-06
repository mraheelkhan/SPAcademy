<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function enrolment(){
    	return $this->hasMany(Enrollment::class, 'group_id', 'id');
    }
}
