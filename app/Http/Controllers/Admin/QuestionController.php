<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Reply;
use App\Services\Admin\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller{

    public function index(){

        $postService = new PostService('QUESTION');
        $data = $postService->posts(true, request('q'));

        return view('admin.question')->with($data);
    }

    public function viewDeletedQuestions(){

        $postService = new PostService('QUESTION');
        $data = $postService->posts(false, request('q'));

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

        $postService = new PostService('QUESTION');
        if ($postService->deletePost($request)){
            return redirect()->route('admin.questions')->with('success', 'post deleted');
        }else return redirect()->route('admin.questions')->with('error', 'an error occurred');
    }

    public function restoreQuestion(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $postService = new PostService('QUESTION');
        if ($postService->restorePost($request)){
            return redirect()->route('admin.questions.deleted')->with('success', 'post deleted');
        }else return redirect()->route('admin.questions.deleted')->with('error', 'an error occurred');
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
