<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\PostService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Reply;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{

    public function index(){

        $postService = new PostService('POST');
        $data = $postService->posts(true, request('q'));
        return view('admin.view-posts')->with($data);
    }

    public function viewDeletedPosts(){

        $postService = new PostService('POST');
        $data = $postService->posts(false, request('q'));
        return view('admin.view-posts')->with($data);
    }

    public function viewPost($id){

        $post = Post::find($id);
        if(!$post->active) return view('item-removed')->with('back', route('admin.posts'));
        $comments = $post->replies;

        $data = [
            'post' => $post,
            'comments' => $comments,
        ];

        return view('admin.view-post')->with($data);
    }

    public function deletePost(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $postService = new PostService('POST');
        if ($postService->deletePost($request)){
            return redirect()->route('admin.posts')->with('success', 'post deleted');
        }else return redirect()->route('admin.posts')->with('error', 'an error occurred');
    }

    public function restorePost(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $postService = new PostService('POST');
        if ($postService->restorePost($request)){
            return redirect()->route('admin.posts.deleted')->with('success', 'post restored');
        }else return redirect()->route('admin.posts.deleted')->with('error', 'an error occurred');
    }

    public function deleteComment(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $comment = Reply::find($request->id);
        if(! $comment) return redirect('/admin');

        $postId = $comment->post_id;
        $comment->active = false;
        $comment->save();

        return redirect()->route('admin.post.show', $postId)->with('success', 'comment deleted');
    }
}
