<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Reply;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{

    public function index(){

        $data = $this->posts(true, request('q'));
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

        $data = $this->posts(false, request('q'));
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

    private function posts($status, $q = null){

        $posts = Post::where([ 'type'=>'POST', 'active'=>$status])->orderBy('created_at', 'DESC');

        if($q){
            $expertIds = User::where('firstname', 'like', "%$q%")
                                ->orWhere('lastname', 'like', "%$q%")
                                ->orWhere(DB::raw("CONCAT(firstname,' ',lastname)"), 'like', "%$q%")
                                ->orWhere(DB::raw("CONCAT(lastname,' ',firstname)"), 'like', "%$q%")
                                ->pluck('id')->toArray();

            $posts = $posts->where('title', 'like', "%$q%")
                            ->orWhere('body', 'like', "%$q%")
                            ->orWhere('category', $q)
                            ->orWhere('tags', 'like', "%$q%")
                            ->orWhere('type', $q)
                            ->orWhereIn('user_id', $expertIds)
                            ->orderBy('views', 'DESC');
        }

        $data = [
            'type'  =>  $status ? 'active' : 'deleted',
            'posts' =>  $posts->paginate(15)
        ];

        return $data;
    }
}
