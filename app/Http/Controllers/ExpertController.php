<?php

namespace App\Http\Controllers;

use App\Followers;
use App\Services\PostsViewService;
use App\User;
use Illuminate\Http\Request;

class ExpertController extends Controller{

    function __construct(){

        $this->middleware('auth', [
            'except' => ['index']
        ]);
    }

    function index(){

        $experts = User::where('role', 'EXPERT')->paginate(10);
        $title = 'Experts';

        $data = [
            'title' => $title,
            'experts' => $experts,
        ];

        return view('expert.index')->with($data);
    }

    function viewPopular(){

        $experts = User::where('role', 'EXPERT')->paginate(10);
        $title = 'Experts';

        $data = [
            'title' => $title,
            'experts' => $experts,
        ];

        return view('expert.index')->with($data);
    }

    function followExpert(Request $request){

        $this->validate($request, [
            'id' => ['required', 'string']
        ]);

        $expert = User::find($request->id);
        if(!$expert) return redirect()->route('experts');
        if($expert->id == auth()->user()->id) return redirect()->route('experts')->with('error', "you can't follow yourself");

        $following = Followers::where([
            ['user_id', auth()->user()->id],
            ['expert_id', $expert->id]
        ]);

        if($following->count() > 0) return redirect()->route('experts');
        $follower = new Followers;
        $follower->user_id = auth()->user()->id;
        $follower->expert_id = $expert->id;

        $follower->save();
        return redirect()->route('experts')->with('success', "Followed expert");
    }

    function unfollowExpert(Request $request){

        $this->validate($request, [
            'id' => ['required', 'string']
        ]);

        Followers::where([
            ['user_id', auth()->user()->id],
            ['expert_id', $request->id]
        ])->delete();

        return redirect()->route('experts')->with('success', "Followed expert");
    }

    function viewExpert($id){

        return view('expert.view')->with('title', 'Expert');
    }

    function viewPosts($id){

        $postViewService = new PostsViewService('POST');
        $data = $postViewService->viewExpertPost($id);

        return view('expert.post')->with($data);
    }

    function viewAnswers($id){

        $postViewService = new PostsViewService('QUESTION');
        $posts = $postViewService->viewExpertPost($id);

        return $posts;
    }

    function viewPopularPosts($id){

        $postViewService = new PostsViewService('POST');
        $data = $postViewService->viewExpertPopularPost($id);

        return view('expert.post')->with($data);
    }
}
