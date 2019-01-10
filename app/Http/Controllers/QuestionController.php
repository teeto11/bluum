<?php

namespace App\Http\Controllers;

use App\Post;
use App\Code;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct(){
        $this->middleware('auth', [
            'except' => ['index', 'show', 'showByCategory']
        ]);
    }

    public function index(){

        $pinned_questions = Post::where('type', 'QUESTION')->orderBy('created_at', 'desc')->get();
        $questions = Post::where('type', 'QUESTION')->orderBy('created_at', 'desc')->paginate(15);
        $categories = Code::where('key', 'BP_CATEGORY')->get();

        $data = [
            'title' => 'Questions',
            'questions' => $questions,
            'pinned_questions' => $pinned_questions,
            'categories' => $categories,
        ];

        return view('questions')->with($data);
    }

    public function create(){

        $categories = Code::where('key', 'Q_CATEGORY')->get();
        $popular_questions = Post::orderBy('created_at', 'desc')->take(5)->get();

        $data = [
            'title' => 'Ask',
            'categories' => $categories,
        ];

        return view('ask')->with($data);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);

        $question = new Post;
        $question->title = $request->title;
        $question->category = $request->category;
        $question->body = $request->description;
        $question->tags = implode(",", array_map('trim', explode(',', trim($request->tags))));
        $question->type = "QUESTION";
        $question->user_id = auth()->user()->id;

        if($question->save()) return redirect('/questions')->with('success', 'Question asked successfully'); else{
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

            return view('single-post')->with($data);
        }else return redirect('/questions')->with('error', 'Question not found');
    }


}
