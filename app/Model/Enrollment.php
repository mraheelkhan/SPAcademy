<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = "group_users";
    public function user(){
    	return $this->belongsTo('App\User')->withDefault();
    }

    /* public function training(){
    	return $this->hasOne('App\Training', 'id', 'training_id')->withDefault();
    } */

}
