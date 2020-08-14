<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = "enrollments";
    public function user(){
    	return $this->belongsTo('App\User')->withDefault();
    }

    public function course(){
    	return $this->belongsTo('App\Course')->withDefault();
    }
    /* public function training(){
    	return $this->hasOne('App\Training', 'id', 'training_id')->withDefault();
    } */

}
