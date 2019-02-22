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

    public function markAsCorrect(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $reply = Reply::find($request->id);
        $question = $reply->post;

        if($question){
            if(auth()->user()->id == $question->user_id){
                $hasCorrect = $question->replies->where('correct', true)->count();

                if ($hasCorrect < 1){
                    $reply->correct = true;
                    $reply->save();
                    $message = ['success', 'Answer saved as correct answer'];
                }else $message = ['error', 'Question has a correct answer'];
            }else $message = ['error', 'Permission not granted'];

            return redirect()->route('question.show', ['id'=>$question->id, 'title'=>formatUrlString($question->title)])->with($message);
        }else return redirect()->route('questions');

    }

}
