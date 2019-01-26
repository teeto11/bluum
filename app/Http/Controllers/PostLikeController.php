<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostLike;
use App\Services\PostLikeService;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function like(Request $request){

        $this->validate($request, [ 'post_id' => ['required', 'integer'] ]);

        $postLikeService = new PostLikeService;
        return $postLikeService->like($request->post_id);
    }

    public function unlike(Request $request){

        $this->validate($request, [ 'post_id' => ['required', 'integer'] ]);

        $postLikeService = new PostLikeService;
        return $postLikeService->unlike($request->post_id);
    }
}
