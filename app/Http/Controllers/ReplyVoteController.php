<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReplyVoteService;

class ReplyVoteController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function upVote(Request $request){

        $this->validate($request, ['answerId' => ['required', 'int'] ]);

        $vote = new ReplyVoteService(true);
        return $vote->vote($request);
    }

    public function downVote(Request $request){

        $this->validate($request, ['answerId' => ['required', 'int'] ]);

        $vote = new ReplyVoteService(false);
        return $vote->vote($request);
    }
}
