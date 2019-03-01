<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Reply;

class PostController extends Controller{

    public function index(){

        $posts = Post::where([ 'type'=>'POST', 'active'=>true])->orderBy('created_at', 'DESC')->paginate(20);
        $data = [
            'type'  =>  'active',
            'posts' =>  $posts
        ];

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

        $post = Post::find($request->id);
        if(! $post) return redirect()->route('admin');
        $post->active = false;
        $post->save();

        return redirect()->route('admin.posts')->with('success', 'post deleted');
    }

    public function viewDeletedPosts(){

        $posts = Post::where([ 'type'=>'POST', 'active'=>false])->orderBy('created_at', 'DESC')->paginate(20);
        $data = [
            'type'  =>  'deleted',
            'posts' =>  $posts
        ];
        return view('admin.view-posts')->with($data);
    }

    public function restorePost(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $post = Post::find($request->id);
        if(! $post) return redirect()->route('admin.posts.deleted');
        $post->active = true;
        $post->save();

        return redirect()->route('admin.posts.deleted')->with('success', 'post restored');
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
