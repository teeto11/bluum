<?php

namespace App\Services;

use App\PostView;

class PostUpdateService{

    public function updatePost($post, $request){

        $postTagService = new PostTagService($request->type);
        $tags = array_map('trim', explode(',', trim(strtolower($request->tags))));
        $oldTags = explode(",", $post->tags);
        $postTagService->removeTag(array_diff($oldTags, $tags));

        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = ($request->type == 'POST') ? $request->post : $request->description;
        $post->tags = implode(",", $tags);
        $post->user_id = auth()->user()->id;
        $postTagService->updateTag(array_diff($tags, $oldTags));
        $post->save();
    }

    public function updatePostViews($post){

        $postViews = PostView::where(['user_id'=>auth()->user()->id, 'post_id'=>$post->id]);
        if($postViews->count() < 1){
            $postView = new PostView;
            $postView->user_id = auth()->user()->id;
            $postView->post_id = $post->id;
            $postView->save();
            $post->views = count($post->postViews);
            $post->save();
        }
    }
}