<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyLike extends Model
{
    public function reply(){
        return $this->belongsTo('App\Reply');
    }

    public function user(){
        return $this->belongsTo('App\user');
    }
}
