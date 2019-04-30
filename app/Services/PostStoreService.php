<?php

namespace App\Services;

use App\Notifications\NewQuestionNotification;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Notification;

class PostStoreService{

    public function store($request){

        $post = new Post;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = ($request->type == 'POST') ? $request->post : $request->description;
        $post->tags = implode(",", array_map('trim', explode(',', trim(strtolower($request->tags)))));
        $post->type = $request->type;
        $post->user_id = auth()->user()->id;

        if($request->hasFile('coverImg')){
            $fileNameWithExtension = $request->file('coverImg')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('coverImg')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('coverImg')->storeAs('public/post_cover_image', $fileNameToStore);
        }else $fileNameToStore = 'noimage.jpg';

        $post->cover_img = $fileNameToStore;
        $postTagService = new PostTagService($request->type);
        $postTagService->updateTag(explode(",", $post->tags));

        if($post->save()) {
            if($post->type == 'QUESTION') {
                $experts = User::where('role', 'EXPERT')->get();
                Notification::send($experts, new NewQuestionNotification());
            }
            return true;
        }

        return false;
    }
}