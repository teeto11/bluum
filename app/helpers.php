<?php

use App\ReplyLike;

function getLastActivityTime($lastActivityDate){

    $now = date_create(date("Y:m:d H:i:s"));
    $interaction = date_create($lastActivityDate);
    $last_activity = date_diff($interaction, $now);

    //dd($last_activity);
    if($last_activity->h < 1) $last_activity_str = $last_activity->i."m";
    if($last_activity->d < 1 && $last_activity->h > 0) $last_activity_str = $last_activity->h."h";
    if($last_activity->d <= 99 && $last_activity->d > 0) $last_activity_str = $last_activity->d."d";
    if($last_activity->d > 99) $last_activity_str = (int)ceil($last_activity/7)."w";

    return $last_activity_str;
}

function randomColour(){

    $vals = ['a','b','c','d','e','f',0,1,2,3,4,5,6,7,8,9];
    do{
        $colour = '#'.$vals[mt_rand(0,15)].$vals[mt_rand(0,15)].$vals[mt_rand(0,15)].$vals[mt_rand(0,15)].$vals[mt_rand(0,15)].$vals[mt_rand(0,15)];
    }while(substr_count($colour, 'f') > 5);
    return $colour;
}

function formatUrlString($string){

    $string = trim($string);
    $string = preg_replace('/\s+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function unFormatUrlString($string){

    $string = trim($string);
    $string = preg_replace('/-+/', ' ', $string);
    $string = strtolower($string);
    return $string;
}

function userLikedReply($replyId){

    $replyLike = ReplyLike::where(['reply_id'=>$replyId, 'user_id'=>auth()->user()->id]);
    return boolval($replyLike->count());
}

function getFirstLetterUppercase($string){

    return strtoupper($string[0]);
}

function expert(){

    if(auth()->user()->role == 'EXPERT') return true; else return false;
}

function formatTime($time){

    return date('H:ia d M, Y', strtotime($time));
}

function getInitials($user, $full=false, $icon=true){

    if($user->role == 'ADMIN'){
        $name = 'Admin'.($icon ? '<i class="fa fa-check-circle verified-icon" ></i>' : '');
    }else{
        $name = ($full ? ucfirst($user->firstname) : strtoupper($user->firstname[0])).'. '.ucfirst($user->lastname);
        if($user->role == 'EXPERT') $name .= $icon ? '<i class="fa fa-check-circle verified-icon" ></i>' : '';
    }

    return $name;
}