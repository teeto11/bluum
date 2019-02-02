<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Post;
use App\ReplyLike;
use App\User;
use App\Services\ReplyStoreService;
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

        $addComment = new ReplyStoreService('POST');
        $newComment = $addComment->store($request);

        if($newComment) return redirect("/blog/post/".$newComment->post->id."/".formatUrlString($newComment->post->title))->with('success', 'Comment added');else{
            return redirect("/blog/post/".$newComment->post->id."/".formatUrlString($newComment->post->title))->with('error', 'An error occurred');
        }

    }

    public function answerQuestion(Request $request){

        $this->validate($request, [
            'body' => ['required', 'string'],
            'post_id' => ['required', 'int'],
            'recipient' => ['int'],
        ]);

        $addAnswer = new ReplyStoreService('QUESTION');
        $newAnswer = $addAnswer->store($request);

        if($newAnswer) return redirect("/question/".$newAnswer->post->id."/".formatUrlString($newAnswer->post->title))->with('success', 'Answer submitted');else{
            return redirect("/question/".$newAnswer->post->id."/".formatUrlString($newAnswer->post->title))->with('error', 'An error occurred');
        }
    }


}
