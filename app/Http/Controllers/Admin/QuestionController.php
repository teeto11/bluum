<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller{

    public function index(){

        $questions = Post::where(['type'=>'QUESTION', 'active'=>true])->orderBy('created_at', 'DESC')->paginate(20);
        $data = [
            'questions' =>  $questions,
            'type'      =>  'active',
        ];

        return view('admin.question')->with($data);
    }

    public function viewDeletedQuestions(){

        $questions = Post::where(['type'=>'QUESTION', 'active'=>false])->orderBy('created_at', 'DESC')->paginate(20);
        $data = [
            'questions' =>  $questions,
            'type'      =>  'deleted',
        ];

        return view('admin.question')->with($data);
    }

    public function viewQuestion($id){

        $question = Post::find($id);
        if(!$question->active) return view('item-removed')->with('back', route('admin.posts'));
        $answers = $question->replies->where('parent_reply', null);
        $comments = $question->replies->where('parent_reply', '!=', null);

        $data = [
            'question' => $question,
            'answers' => $answers,
            'comments' => $comments,
        ];

        return view('admin.view-question')->with($data);
    }

    public function deleteQuestion(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $question = Post::find($request->id);
        if(! $question) return redirect(route('admin.questions'));
        $question->active = false;
        $question->save();

        return redirect()->route('admin.questions')->with('success', 'question deleted');
    }

    public function deleteAnswer(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $answer = Reply::find($request->id);
        if(! $answer) return redirect('admin.questions');
        $postId = $answer->post->id;
        $answer->active = false;
        $answer->save();

        return redirect()->route('admin.question.show', $postId)->with('success', 'answer deleted');
    }
}
