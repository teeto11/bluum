<?php

namespace App\Http\Controllers;

use App\Post;
use App\Code;
use App\PostLike;
use App\Services\PostUpdateService;
use App\Services\PostStoreService;
use App\Services\PostsViewService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct(){
        $this->middleware('auth', [
            'except' => ['index', 'show', 'viewByCategory']
        ]);
    }

    public function index(){

        $postsViewService = new PostsViewService('QUESTION');
        $data = $postsViewService->viewPosts();

        return view('question.index')->with($data);
    }

    public function viewByCategory($category){

        $postsViewService = new PostsViewService('QUESTION');
        $data = $postsViewService->viewPostsByCategory($category);

        return view('question.index')->with($data);
    }

    public function viewUnreadOnly(){
        dd('unread');
    }

    public function viewMostPopular(){

        $postsViewService = new PostsViewService('QUESTION');
        $data = $postsViewService->viewPostsByPopularity();

        return view('question.index')->with($data);
    }

    function viewByTag($tag){

        $postsViewService = new PostsViewService('QUESTION');
        $data = $postsViewService->viewPostsByTags($tag);

        return view('question.index')->with($data);
    }

    public function create(){

        $categories = Code::where('key', 'Q_CATEGORY')->get();
        $popular_questions = Post::where([['type', 'QUESTION'], ['likes', '>', 0]])->orderBy('likes', 'desc')->take(5)->get();

        $data = [
            'title' => 'Ask',
            'popular_questions' => $popular_questions,
            'categories' => $categories,
        ];

        return view('question.ask')->with($data);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);

        $request->type = "QUESTION";
        $postStoreService = new PostStoreService;
        $question = $postStoreService->store($request);

        if($question) return redirect('/questions')->with('success', 'Question asked successfully'); else{
            return redirect('/questions')->with('error', 'An unknown error occurred');
        }
    }

    public function show($id){

        $question = Post::find($id);
        if($question && $question->type == 'QUESTION'){
            $related = '';
            $data = [
                'title' => ucwords($question->title),
                'question' => $question,
                'related' => $related,
            ];

            return view('single-question')->with($data);
        }else return redirect('/questions')->with('error', 'Question not found');
    }
}
