<?php

namespace App\Models;

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
        'name', 'email', 'username', 'password', 'foto', 'level', 'slug',
    ];

    protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function post(){
        return $this->hasMany('App\Models\Post');
    }

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
}
