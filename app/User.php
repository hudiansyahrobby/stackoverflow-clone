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

    /**
     * Get the reputation record associated with the user.
     */
    public function reputation()
    {
        return $this->hasOne('App\Reputation');
    }

    /**
     * Get the questions for the blog post.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * Get the answers for the blog post.
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * Get the answers for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
