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
        return $this->hasMany('App\Reply')->orderBy('created_at', 'desc')->where('active', true);
    }

    public function popularReplies(){
        return $this->hasMany('App\Reply')->orderBy('likes', 'desc')->where([ ['likes', '>', '0'], ['active', true] ])->take(3);
    }

    public function postLikes(){
        return $this->hasMany('App\PostLike');
    }

    public function postViews(){
        return $this->hasMany('App\PostView');
    }
}
