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


    //Function to create one to many relationship. Each user can have many jobs
    public function jobs()
    {
        return $this->hasMany('App\job');
    }

    public function likes()
    {
        return $this->hasMany('App\LikeDetails ');
    }


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
