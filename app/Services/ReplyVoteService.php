<?php

namespace App\Services;

use App\ReplyVote;

class ReplyVoteService{

    private $vote;

    public function __construct($vote){
        $this->vote = $vote;
    }

    public function vote($request){

        $user_id = auth()->user()->id;
        $answer_id = $request->answerId;

        $hasReply = ReplyVote::where([
            ['user_id', $user_id],
            ['reply_id', $answer_id]
        ]);

        if($hasReply->count() > 0){
            return "false";
        }else{
            $replyVote = new ReplyVote;
            $replyVote->user_id = $user_id;
            $replyVote->reply_id = $answer_id;
            $replyVote->vote = $this->vote;
            $replyVote->save();
            return ReplyVote::where('reply_id', $answer_id)->count();
        }
    }
}