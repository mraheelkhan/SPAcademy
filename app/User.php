<?php

namespace App;

use App\Model\Grade;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'grade_id', 'phone', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id' )->withDefault();
    }

    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id', 'id')->withDefault();
    }

    public function hasAccess(array $permissions)
    {
        if($this->role->hasAccess($permissions)){
            return true;
        }
        return false;
    }

    public function apply_courses() {
        return $this->hasMany('App\Model\ApplyCourse', 'user_id', 'id');
    }
}
