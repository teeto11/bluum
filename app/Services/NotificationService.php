<?php

namespace App\Services;


use App\Notificaton;
use App\User;

class NotificationService{

    static function newCommentNotification($post, $reply_id){

        $notification = new Notificaton;
        $notification->user_id = $post->user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> commented on your post <strong>'.ucfirst($post->title).'</strong>';
        $notification->link = route('blog.post', [$post->id, formatUrlString($post->title)])."#reply-$reply_id";

        return $notification;
    }

    static function newCommentReplyNotification($user_id, $comment){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> replied your comment <strong>'.$comment.'</strong>';

        return $notification;
    }

    static function newAnswerNotification($post, $reply_id){

        $notification = new Notificaton;
        $notification->user_id = $post->user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> answered your question <strong>'.ucfirst($post->title).'</strong>';
        $notification->link = route('question.show', [$post->id, formatUrlString($post->title)])."#reply-$reply_id";

        return $notification;
    }

    static function newAnswerCommentNotification($user_id, $body){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> commented on your answer <strong>'.$body.'</strong>';

        return $notification;
    }

    static function newReplyAnswerCommentNotification($user_id, $body){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = '<strong>'.getInitials(auth()->user()).'</strong> replied your comment <strong>'.$body.'</strong>';

        return $notification;
    }

    static function correctAnswer($question, $answer){

        $notification = new Notificaton;
        $notification->user_id = $answer->user_id;
        $notification->notification = '<strong>'.getInitials($question->user).'</strong> marked your answer as correct';
        $notification->link = route('question.show', [$question->id, formatUrlString($question->title)])."#reply-$answer->id";

        return $notification;
    }

    static function postLike($post){

        $notification = new Notificaton;
        $notification->user_id = $post->user->id;
        $notification->notification = '<strong>'.getInitials(auth()->user).'</strong> Liked your '.($post->type == 'QUESTION') ? 'Question' : 'Post';

        $urlParams = [$post->id, formatUrlString($post->title)];
        if ($post->type == 'QUESTION') {
            $notification->link = route('question.show', $urlParams);
        }else $notification->link = route('blog.post', $urlParams);

        return $notification;
    }

    static function replyLike($reply){

        $notification = new Notificaton;
        $notification->user_id = $reply->user->id;
        $user = User::find(auth()->user()->id);
        $post = $reply->post;

        if(!is_null($reply->parentReply)){
            $notification->notification = '<strong>'.getInitials($user).'</strong> Liked your comment';
        }else {
            $type = ($post->type == 'QUESTION') ? 'answer' : 'comment';
            $notification->notification = '<strong>'.getInitials($user).'</strong> Liked your comment';
        }

        $urlParams = [$post->id, formatUrlString($post->title)];
        if ($post->type == 'QUESTION') {
            $notification->link = route('question.show', $urlParams)."#reply-$reply->id";
        }else $notification->link = route('blog.post', $urlParams)."#reply-$reply->id";

        return $notification;
    }
}