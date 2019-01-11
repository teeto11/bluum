<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use Illuminate\Http\Request;

class ReplyController extends Controller{

    public function __construct(){
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function addReply($postId, Request $request){

        $this->validate($request, [
            'body' => ['required', 'string']
        ]);
        $post = Post::find($postId);

        if($post){
            $reply = new Reply;
            $reply->body = $request->body;
            $reply->user_id = auth()->user()->id;
            $reply->post_id = $postId;
            if(isset($request->recipient) && !is_null($request->recipient)) $reply->recipient = $request->recipient;


            if($post->type = "QUESTION") $redirect = "/question"; else $redirect = "/blog/post/";
            if($reply->save()) return redirect("$redirect/$postId")->with('success', 'Question asked successfully'); else{
                return redirect("$redirect/$postId")->with('error', 'An unknown error occurred');
            }
        }
    }
}
