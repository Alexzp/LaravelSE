<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'slug', 'published', 'author_id', 'thumbnail_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'published' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(\App\Models\Comment::class, 'commentable');
    }


    /**
     * Get the Walls for the Post.
     */
    public function walls()
    {
        return $this->belongsToMany(\App\Models\Wall::class);
    }

    /**
     * Get the Categories for the Post.
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    /**
     * Get the Tags for the Post.
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

}
