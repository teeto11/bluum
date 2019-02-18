<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller{

    public function index(){

        $questions = Post::where('type', 'QUESTION')->orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.question')->with('questions', $questions);
    }

    public function viewQuestion($id){

        $question = Post::find($id);
        $answers = $question->replies->where('parent_reply', null);

        $data = [
            'question' => $question,
            'answers' => $answers,
        ];

        return view('admin.view-question')->with($data);
    }

    public function deleteQuestion(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $question = Post::find($request->id);
        if(! $question) return redirect('/admin');
        Reply::where('post_id', $question->id)->delete();
        $question->delete();

        return redirect()->route('admin.questions')->with('success', 'question deleted');
    }

    public function deleteAnswer(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $answer = Reply::find($request->id);
        if(! $answer) return redirect('/admin');
        $postId = $answer->post->id;
        Reply::where('parent_reply', $answer->id)->delete();

        $answer->delete();
        return redirect()->route('admin.question.show', $postId)->with('success', 'answer deleted');
    }
}
