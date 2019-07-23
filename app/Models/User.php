<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * Get the walls for the User.
     */
    public function walls()
    {
        return $this->belongsToMany(\App\Models\Wall::class);
    }

    /**
     * Get all of the user's posts.
     */
    public function posts()
    {
        return $this->belongsToMany(\App\Models\Wall::class,'author_id');
    }

    /**
     * Get all of the users's comments.
     */
    public function comments()
    {
        return $this->belongsToMany(\App\Models\Comment::class, 'author_id');
    }

    /**
     * Get all of the users's likes.
     */
    public function likes()
    {
        return $this->belongsToMany(\App\Models\Like::class, 'author_id');
    }

    /**
     * Get all of the users's likes.
     */
    public function ratings()
    {
        return $this->belongsToMany(\App\Models\Ratings::class, 'author_id');
    }

    /**
     * Get all of the users's roles.
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class);
    }


}
