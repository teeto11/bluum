<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostLike;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function like(Request $request){

        $this->validate($request, [ 'post_id' => ['required', 'integer'] ]);
        $postLikeCount = PostLike::where([
            "post_id" => $request->post_id,
            "user_id" => auth()->user()->id,
        ])->count();


        if($postLikeCount < 1){
            $post = Post::find($request->post_id);

            if($post){
                $postLike = new PostLike;
                $postLike->post_id = $request->post_id;
                $postLike->user_id = auth()->user()->id;
                $postLike->save();

                $post->likes = count($post->postLikes);
                $post->save();
                return $post->likes;
            }
        }
        return "false";
    }

    public function unlike(Request $request){

        $this->validate($request, [ 'post_id' => ['required', 'integer'] ]);
        $postLike = PostLike::where([
            "post_id" => $request->post_id,
            'user_id' => auth()->user()->id,
        ]);

        if($postLike->count() > 0) $postLike = $postLike->first(); else return "false";
        $postLike->delete();

        $post = Post::find($postLike->post_id);
        $post->likes = count($post->postLikes);
        $post->save();
        return $post->likes;
    }
}
