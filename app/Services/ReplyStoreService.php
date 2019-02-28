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
                $reply->recipient = "@$recipient->username";
                $body = substr($recipientReply->body, 0, 50);
                $r_notification = ($this->type == 'POST') ? $this->newCommentReplyNotification($recipient->id, $body) : $this->newAnswerCommentNotification($recipient->id, $body);
            }else return false;
        }

        $reply->save();
        if(auth()->user()->id != $post->user_id) {
            if($this->type == 'POST') {
                $this->newCommentNotification($post, $reply->id);
            } elseif($this->type == 'QUESTION' && is_null($reply->parent_reply)) $this->newAnswerNotification($post, $reply->id);
        }

        if(isset($r_notification) && !is_null($r_notification)){

            $r_notification->link = route($this->rLink, [$post->id, formatUrlString($post->title)])."#reply-$reply->id";
            $r_notification->save();
        }

        return $reply;
    }

    private function newCommentNotification($post, $reply_id){

        $notification = new Notificaton;
        $notification->user_id = $post->user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> commented on your post <strong>'.ucfirst($post->title).'</strong>';
        $notification->link = route('blog.post', [$post->id, formatUrlString($post->title)])."#reply-$reply_id";
        $notification->save();
    }

    private function newCommentReplyNotification($user_id, $comment){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> replied your comment <strong>'.$comment.'</strong>';

        return $notification;
    }

    private function newAnswerNotification($post, $reply_id){

        $notification = new Notificaton;
        $notification->user_id = $post->user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> answered your question <strong>'.ucfirst($post->title).'</strong>';
        $notification->link = route('question.show', [$post->id, formatUrlString($post->title)])."#reply-$reply_id";
        $notification->save();
    }

    private function newAnswerCommentNotification($user_id, $body){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> commented on your answer <strong>'.$body.'</strong>';

        return $notification;
    }
}