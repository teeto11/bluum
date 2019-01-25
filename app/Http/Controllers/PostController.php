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
        $posts = Post::where(['type' => 'POST'], ['tags' => ['like', "%$tag%"]]);
        dd($posts);
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
            $related = Post::where([
                'type' => 'POST',
                'category' => $post->category,
            ])->orderBy('views', 'desc')->take(5)->get();

            $data = [
                'title' => ucwords($post->title),
                'post' => $post,
                'related' => $related,
            ];

            if(!auth()->guest()) $data['liked'] = boolval(PostLike::where(["post_id" => $post->id, "user_id" => auth()->user()->id])->count());

            return view('single-post')->with($data);
        }else return redirect('/blog')->with('error', 'Post not found');
    }

    public function edit($id){

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

            $tags = array_map('trim', explode(',', trim(strtolower($request->tags))));
            $oldTags = explode($post->tags, ",");
            $this->removeTag(array_diff($oldTags, $tags));

            $post->title = $request->title;
            $post->category = $request->category;
            $post->body = $request->post;
            $post->tags = implode(",", array_diff($tags, $oldTags));
            $post->type = "POST";
            $post->user_id = auth()->user()->id;
            $this->updateTags($post->tags);

            return redirect("/")->with('success', 'post updated');

        }else return redirect("/blog/post")->with('error', 'an error occurred');
    }

    public function destroy($id){

    }

    public function removeTag($tags){

        foreach ($tags as $tag){

            $t = Code::where([
                'key' => 'BP_TAG',
                'value' => $tag
            ])->first();
            $t->additional_info = $t->additional_info = (int)$t->additional_info - 1;
            $t->save();
        }
    }

    public function updateTags($tags){
        $tags = explode(',', $tags);

        foreach ($tags as $tag){

            $t = Code::where([
                'key' => 'BP_TAG',
                'value' => $tag
            ]);

            if($t->count() > 0){
                $t = $t->first();
                $t->additional_info = (int)$t->additional_info + 1;
                $t->save();
            }else{
                $t = new Code;
                $t->key = 'BP_TAG';
                $t->value = $tag;
                $t->additional_info = 1;
                $t->save();
            }
        }
    }
}
