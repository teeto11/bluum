<?php

namespace App\Http\Controllers;

use App\Code;
use App\Post;
use App\PostLike;
use App\Services\PostUpdateService;
use App\Services\PostStoreService;
use App\Services\PostsViewService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth', [
            'except' => ['index', 'show', 'viewByCategory', 'viewByTag', 'viewMostPopular']
        ]);
    }

    public function index(){

        $postsViewService = new PostsViewService('POST');
        $data = $postsViewService->viewPosts();

        return view('post.index')->with($data);
    }

    public function viewByCategory($category){

        $categories = [
            'pregnancy' => [
                'title' => 'Pregnancy',
                'icon'  => 'pregnant.png',
                'desc'  => 'Connect with experts and other users for a stress free and exciting pregnancy experience, trimester by trimester.'
            ],
            'bluum-stories' => [
                'title' => 'Bluum Stories',
                'icon'  => 'Lets_talk.svg',
                'desc'  => 'Tell your story of how your pregnancy, the scare, the joy, the moments, the myths and how your journey can motivate a newbie in the process.'
            ],'medical-travels' => [
                'title' => 'Pregnancy Medical Travels',
                'icon'  => 'medical.png',
                'desc'  => 'Connect and get concise information from experienced moms for your baby delivery and health outside your country of residence.'
            ],'common-illness' => [
                'title' => 'Common Illnesses',
                'icon'  => 'illness.jpg',
                'desc'  => 'Connect with experts and other users on information regarding to common illnesses that can tamper with your babies\' healthy development e.g measles.'
            ],'special-illness' => [
                'title' => 'Special Illnesses',
                'icon'  => 'special_illness.jpg',
                'desc'  => 'Connect with experts and other users on information regarding to special illnesses around children that can be avoided and also managed for healthy development.'
            ],'blog' => [
                'title' => 'Blog',
                'icon'  => 'blog.svg',
                'desc'  => 'All news and exciting new findings for you and your baby.'
            ],
        ];

        $postsViewService = new PostsViewService('POST');
        $data = $postsViewService->viewPostsByCategory($category);
        $data['category'] =  (object) $categories[strtolower($category)];

        return view('post.index')->with($data);
    }

    public function viewUnreadOnly(){
        $postsViewService = new PostsViewService('POST');
        $data = $postsViewService->viewUnreadPost();

        return view('post.index')->with($data);
    }

    public function viewMostPopular(){

        $postsViewService = new PostsViewService('POST');
        $data = $postsViewService->viewPostsByPopularity();

        return view('post.index')->with($data);
    }

    function viewByTag($tag){

        $postsViewService = new PostsViewService('POST');
        $data = $postsViewService->viewPostsByTags($tag);

        return view('post.index')->with($data);
    }

    function viewByFollowing(){

        $postViewService = new PostsViewService('POST');
        $data = $postViewService->viewByFollowing();

        return view('post.index')->with($data);
    }

    public function create(){

        $categories = Code::where('key', 'BP_CATEGORY')->get();
        $recent_posts = Post::where('type', 'POST')->orderBy('created_at', 'desc')->take(5)->get();
        $data = [
            "title" => 'New Post',
            "categories" => $categories,
            "recent_posts" => $recent_posts
        ];

        return view('post.new')->with($data);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'post' => ['required', 'string'],
            'category' => ['required', 'string'],
            'coverImg' => ['image', 'nullable', 'max:1999']
        ]);

        $request->type = 'POST';
        $postStoreService = new PostStoreService;
        $post = $postStoreService->store($request);

        if($post) return redirect('/blog')->with('success', 'Blog post created successfully'); else{
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

            return view('post.view')->with($data);
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

            $request->type = 'POST';
            $postUpdate = new PostUpdateService;
            $postUpdate->updatePost($post, $request);
            return redirect()->route('blog.post', ['id'=>$post->id, 'title'=>formatUrlString($post->title)])->with('success', 'post updated');

        }else return redirect()->route('blog')->with('error', 'an error occurred');
    }

    private function updateViews($post){

        $postUpdate = new PostUpdateService;
        $postUpdate->updatePostViews($post);
    }

    public function destroy($id){

    }
}
