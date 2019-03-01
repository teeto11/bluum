<?php

namespace App\Services;

use App\Notificaton;
use App\Post;
use App\Reply;

class ReplyStoreService{

    private $type;
    private $rLink;

    function __construct($type){

        $this->type = $type;
        if($type == 'POST'){
            $this->rLink = 'blog.post';
        }else{
            $this->rLink = 'question.show';
        }
    }

    function store($request){

        $post = Post::find($request->post_id);
        if(!$post) return false;

        $reply = new Reply;
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;
        $reply->post_id = $post->id;

        if(isset($request->recipient) && !is_null($request->recipient)){
            $recipientReply = Reply::find($request->recipient);
            $recipient = $recipientReply->user;

            if($recipientReply->parent_reply) $reply->parent_reply = $recipientReply->parent_reply; else $reply->parent_reply = $recipientReply->id;
            if($recipient){
                $reply->recipient = "@".getInitials($recipient);
                $body = substr($recipientReply->body, 0, 50);
                $r_notification = ($this->type == 'POST') ? NotificationService::newCommentReplyNotification($recipient->id, $body) : NotificationService::newAnswerCommentNotification($recipient->id, $body);
            }else return false;
        }

        $reply->save();
        if(auth()->user()->id != $post->user_id) {
            if($this->type == 'POST') {
                NotificationService::newCommentNotification($post, $reply->id)->save();
            } elseif($this->type == 'QUESTION' && is_null($reply->parent_reply)) NotificationService::newAnswerNotification($post, $reply->id)->save();
        }

        if(isset($r_notification) && !is_null($r_notification)){

            $r_notification->link = route($this->rLink, [$post->id, formatUrlString($post->title)])."#reply-$reply->id";
            $r_notification->save();
        }

        return $reply;
    }
}