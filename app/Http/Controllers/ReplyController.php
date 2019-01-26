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

    public function addReply(Request $request){

        $this->validate($request, [
            'body' => ['required', 'string'],
            'post_id' => ['required', 'int'],
        ]);
        $post = Post::find($request->post_id);

        if($post){
            $reply = new Reply;
            $reply->body = $request->body;
            $reply->user_id = auth()->user()->id;
            $reply->post_id = $post->id;

            if(isset($request->recipient) && !is_null($request->recipient)) $reply->recipient = $request->recipient;
            if($post->type == "QUESTION") $redirect = "/question"; else $redirect = "/blog/post";
            if($reply->save()) return redirect("$redirect/$post->id/".formatUrlString($post->title))->with('success', 'Question asked successfully'); else{
                return redirect("$redirect/$post->id/".formatUrlString($post->title))->with('error', 'An unknown error occurred');
            }
        }
    }
}
