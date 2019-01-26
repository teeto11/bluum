<?php

namespace App\Http\Controllers;

use App\Reply;
use App\ReplyLike;
use Illuminate\Http\Request;

class ReplyLikeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function like(Request $request){

        $this->validate($request, [ 'reply_id' => ['required', 'integer'] ]);
        $replyLikeCount = ReplyLike::where(['user_id'=>auth()->user()->id, 'reply_id'=>$request->reply_id])->count();

        if($replyLikeCount < 1){
            $reply = Reply::find($request->reply_id);
            if($reply){

                $replyLike = new ReplyLike;
                $replyLike->reply_id = $reply->id;
                $replyLike->user_id = auth()->user()->id;
                $replyLike->save();

                $reply->likes = count($reply->replyLikes);
                $reply->save();
                return $reply->likes;
            }
        }

        return "false";
    }

    public function unlike(Request $request){

        $this->validate($request, [ 'reply_id' => ['required', 'integer'] ]);
        $replyLikeCount = ReplyLike::where(['user_id'=>auth()->user()->id, 'reply_id'=>$request->reply_id]);

        if($replyLikeCount->count() > 0 ) $replyLike = $replyLikeCount->first(); else return "false";
        $replyLike->delete();

        $reply = Reply::find($replyLike->reply_id);
        $reply->likes = count($reply->replyLikes);
        $reply->save();
        return $reply->likes;
    }
}
