<?php

namespace App\Http\Controllers;

use App\Code;
use App\Post;
use App\PostLike;
use App\PostView;
use App\Services\PostUpdateService;
use App\Services\PostTagService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth', [
            'except' => ['index', 'show', 'viewByCategory', 'viewByTag']
        ]);
    }

    public function index(){

        $posts = Post::where('type', 'POST')->orderBy('created_at', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return view('posts')->with($data);
    }

    public function viewByCategory($category){

        $category = urldecode($category);
        $posts = Post::where([
            'type' => 'POST',
            'category' => $category
        ])->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return view('posts')->with($data);
    }

    public function viewUnreadOnly(){
        dd('unread');
    }

    public function viewMostPopular(){
        $posts = Post::where('type', 'POST')->orderBy('likes', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return view('posts')->with($data);
    }

    function viewByTag($tag){

        $tag = strtolower(urldecode($tag));
        $posts = Post::where([['tags', 'like', "%$tag%"], ['type', 'POST']])->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return view('posts')->with($data);
    }

    function viewPostsData(){

        $categories = Code::where('key', 'BP_CATEGORY')->get();
        $pinned_posts = [];
        $top_tags = Code::where('key', 'BP_TAG')->orderBy('additional_info', 'desc')->take(10)->get();

        $data = [
            'title' => 'Blog',
            'pinned_posts' => $pinned_posts,
            'categories' => $categories,
            'top_tags' => $top_tags
        ];

        return $data;
    }

    public function create(){

        $categories = Code::where('key', 'BP_CATEGORY')->get();
        $recent_posts = Post::where('type', 'POST')->orderBy('created_at', 'desc')->take(5)->get();
        $data = [
            "title" => 'New Post',
            "categories" => $categories,
            "recent_posts" => $recent_posts
        ];

        return view('create-post')->with($data);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'post' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = $request->post;
        $post->tags = implode(",", array_map('trim', explode(',', trim(strtolower($request->tags)))));
        $post->type = "POST";
        $post->user_id = auth()->user()->id;
        $this->updateTags($post->tags);

        if($post->save()) return redirect('/blog')->with('success', 'Blog post created successfully'); else{
            return redirect('/blog')->with('error', 'An unknown error occurred');
        }
    }

    public function show($id){

        $post = Post::find($id);
        if($post && $post->type == 'POST'){
            $related = Post::where('type', 'POST')->orWhere(['category'=>$post->category, 'user_id'=>$post->id])->orderBy('views', 'desc')->take(5)->get();

            $data = [
                'title' => ucwords($post->title),
                'post' => $post,
                'related' => $related,
            ];

            if(!auth()->guest()){
                $data['liked'] = boolval(PostLike::where(["post_id" => $post->id, "user_id" => auth()->user()->id])->count());
                $this->updateViews($post);
            }

            return view('single-post')->with($data);
        }else return redirect('/blog')->with('error', 'Post not found');
    }

    public function edit($id){

        $post = Post::find($id);

        if($post){
            if(auth()->user()->id != $post->user_id) return redirect('/blog')->with('error', 'access denied');

            $categories = Code::where('key', 'BP_CATEGORY')->get();
            $data = [
                "title" => 'Edit Post - Bluum',
                'post' => $post,
                "categories" => $categories,
            ];

            return view('post.edit')->with($data);
        }
        return redirect('/blog')->with('error', 'an error occurred');
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'post' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);

        $post = Post::find($id);
        if($post){
            if($post->user_id != auth()->user()->id) return redirect("/blog/post/$id")->with('error', 'access denied');

            $postUpdate = new PostUpdateService;
            $postUpdate->updatePost($post, $request);
            return redirect("/blog/post/$post->id/".formatUrlString($post->title))->with('success', 'post updated');

        }else return redirect("/blog/post")->with('error', 'an error occurred');
    }

    public function destroy($id){

    }

    private function updateViews($post){

        $postUpdate = new PostUpdateService;
        $postUpdate->updatePostViews($post);
    }
}
