<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'origin_filename', 'mime_type', 'mediable'
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
        'filename' => 'string',
        'origin_filename' => 'string',
        'mime_type' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}
