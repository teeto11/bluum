<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model{

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function expert(){

        return $this->belongsTo('App\User', 'expert_id');
    }
}
