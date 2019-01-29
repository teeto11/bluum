<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use App\ReplyLike;
use App\User;
use App\Notificaton;
use Illuminate\Http\Request;

class ReplyController extends Controller{

    public function __construct(){
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function addComment(Request $request){

        $this->validate($request, [
            'body' => ['required', 'string'],
            'post_id' => ['required', 'int'],
            'recipient' => ['int'],
        ]);

        $post = Post::find($request->post_id);
        if($post->type != 'POST') return redirect('/blog')->with('error', 'an error occurred');

        if($post){
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
                    $comment = substr($recipientReply->body, 0, 50);
                    $r_notification = $this->newCommentReplyNotification($recipient->id, $comment);
                }else return redirect("/")->with('error', 'an error occurred');
            }

            $reply->save();
            $this->newCommentNotification($post, $reply->id);
            if(isset($r_notification) && !is_null($r_notification)){
                $r_notification->link = "/blog/post/$post->id/".formatUrlString($post->title)."#reply-$reply->id";
                $r_notification->save();
            }
            return redirect("/blog/post/$post->id/".formatUrlString($post->title))->with('success', 'Question asked successfully');
        }
    }

    private function newCommentReplyNotification($user_id, $comment){

        $notification = new Notificaton;
        $notification->user_id = $user_id;
        $notification->notification = auth()->user()->username.' replied your comment '.$comment;

        return $notification;
    }

    private function newCommentNotification($post, $reply_id){
        $notification = new Notificaton;
        $notification->user_id = $post->user_id;
        $notification->notification = auth()->user()->username.'Commented on your post '.ucfirst($post->title);
        $notification->link = "/blog/post/$post->id/".formatUrlString($post->title)."#reply-$reply_id";
        $notification->save();
    }

    public function answerQuestion(){

    }


}
