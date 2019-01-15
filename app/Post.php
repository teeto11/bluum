<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function likes(){
        return $this->hasMany('App\PostLike');
    }

    public function views(){
        return $this->hasMany('App\PostView');
    }
}
