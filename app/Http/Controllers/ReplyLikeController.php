<?php

namespace App\Http\Controllers;

use App\Reply;
use App\ReplyLike;
use App\Services\ReplyService;
use Illuminate\Http\Request;

class ReplyLikeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function like(Request $request){

        $this->validate($request, [ 'reply_id' => ['required', 'integer'] ]);
        return ReplyService::like($request->reply_id);
    }

    public function unlike(Request $request){

        $this->validate($request, [ 'reply_id' => ['required', 'integer'] ]);
        return ReplyService::unlike($request->reply_id);
    }
}
