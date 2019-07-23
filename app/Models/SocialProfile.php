<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    //
    protected $fillable = ['user_id','provider','provider_id','email','name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
