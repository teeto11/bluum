<?php

namespace App;

use App\Notifications\EmailVerificationNotification;
use App\Notifications\PasswordResetNotification;
use App\Notifications\RegistrationCompleteNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token){
        $this->notify(new PasswordResetNotification($token));
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new EmailVerificationNotification());
    }

    public function sendRegistrationCompleteNotification() {
        $this->notify(new RegistrationCompleteNotification());
    }

    public function post(){
        return $this->hasMany('App\Post')->where('active', true)->orderBy('created_at', 'DESC');
    }

    public function postLikes(){
        return $this->hasMany('App\PostLike');
    }

    public function replies(){
        return $this->hasMany('App\Reply')->where('active', true)->orderBy('created_at', 'DESC');
    }

    public function replyLikes(){
        return $this->hasMany('App\ReplyLike');
    }

    public function replyVotes(){
        return $this->hasMany('App\ReplyVote');
    }

    public function notifications(){
        return $this->hasMany('App\Notification')->where('seen', false)->orderBy('created_at', 'desc');
    }

    public function expert(){
        return $this->hasOne('App\Expert');
    }

    public function followers(){

        return $this->hasMany('App\Followers', 'expert_id');
    }

    public function following(){

        return $this->hasMany('App\Followers');
    }
}
