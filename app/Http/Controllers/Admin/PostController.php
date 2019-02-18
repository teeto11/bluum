<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Reply;

class PostController extends Controller{

    public function index(){

        $posts = Post::where('type', 'POST')->orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.view-posts')->with('posts', $posts);
    }

    public function viewPost($id){

        $post = Post::find($id);
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
        if(! $post) return redirect('/admin');
        Reply::where('post_id', $post->id)->delete();
        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'post deleted');
    }

    public function deleteComment(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $comment = Reply::find($request->id);
        if(! $comment) return redirect('/admin');
        $postId = $comment->post->id;
        Reply::where('parent_reply', $comment->id)->delete();

        $comment->delete();
        return redirect()->route('admin.post.show', $postId)->with('success', 'comment deleted');
    }
}
