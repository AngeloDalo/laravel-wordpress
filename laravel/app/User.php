<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //1 to 1
    public function userInfo()
    {
        return $this->hasOne('App\Model\UserInfo');
    }

    //1 to *
    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }

    //*to* role
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }
}
