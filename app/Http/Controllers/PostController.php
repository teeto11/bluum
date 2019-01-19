<?php

namespace App\Http\Controllers;

use App\Code;
use App\Post;
use App\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth', [
            'except' => ['index', 'show', 'viewByCategory']
        ]);
    }

    public function index(){

        $pinned_posts = Post::where('type', 'POST')->orderBy('created_at', 'desc')->get();
        $posts = Post::where('type', 'POST')->orderBy('created_at', 'desc')->paginate(15);
        $categories = Code::where('key', 'BP_CATEGORY')->get();

        $data = [
            'title' => 'Blog',
            'posts' => $posts,
            'pinned_posts' => $pinned_posts,
            'categories' => $categories,
        ];

        return view('posts')->with($data);
    }

    public function viewByCategory($category){

        dd($category);
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
        $post->tags = implode(",", array_map('trim', explode(',', trim($request->tags))));
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
            $related = '';
            $data = [
                'title' => ucwords($post->title),
                'post' => $post,
                'related' => $related,
            ];

            if(!auth()->guest()) $data->liked = boolval(PostLike::where(["post_id" => $post->id, "user_id" => auth()->user()->id])->count());

            return view('single-post')->with($data);
        }else return redirect('/blog')->with('error', 'Post not found');
    }

    public function test(){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function updateTags($tags){
        dd($tags);
    }
}
