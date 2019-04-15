<?php
namespace App\Services;

use App\Reply;
use App\ReplyLike;

class ReplyService{

    static function create(Reply $reply){

    }

    static function delete($id){

        $reply = Reply::find($id);

        if(is_null($reply) || !$reply) return [false, 'reply not found'];
        if($reply->correct){
            return ['failure', 'cannot delete correct answer'];
        }else{
            $reply->active = false;
            $reply->save();
            return ['success', 'post deleted'];
        }
    }

    static function like($id){

        $reply = Reply::find($id);

        if(auth()->user()->replyLikes->where('reply_id', $id)->count() < 1 && $reply){
            $replyLike = new ReplyLike;
            $replyLike->reply_id = $id;
            $replyLike->user_id = auth()->user()->id;
            $replyLike->save();

            $reply->likes = $reply->replyLikes->count();
            $reply->save();
            NotificationService::replyLike($reply)->save();
            return $reply->likes;
        }

        return "false";
    }

    static function unlike($id){

        $reply = Reply::find($id);

        if($reply){
            $reply->replyLikes->where('user_id', auth()->user()->id)->first()->delete();
            $reply->likes = Reply::find($id)->replyLikes->count();
            $reply->save();

            return $reply->likes;
        }else return "false";
    }

    static function vote($reply){

    }
}