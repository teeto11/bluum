<?php

namespace App\Services;

use App\Post;
use App\PostLike;

class PostLikeService{

    function __construct(){

    }

    function like($postId){

        $postLike = PostLike::where([ "post_id" => $postId, "user_id" => auth()->user()->id, ]);
        if($postLike->count() < 1){
            $post = Post::find($postId);

            if($post){
                $postLike = new PostLike;
                $postLike->post_id = $postId;
                $postLike->user_id = auth()->user()->id;
                $postLike->save();

                $post->likes = count($post->postLikes);
                $post->save();
                NotificationService::postLike($post)->save();
                return $post->likes;
            }
        }

        return "false";
    }

    function unlike($postId){

        $postLike = PostLike::where([ "post_id" => $postId, 'user_id' => auth()->user()->id, ]);

        if($postLike->count() > 0) $postLike = $postLike->first(); else return "false";
        $postLike->delete();
        $post = Post::find($postLike->post_id);
        $post->likes = count($post->postLikes);
        $post->save();

        return $post->likes;
    }
}