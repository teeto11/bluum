<?php

namespace App\Http\Controllers;

use App\Followers;
use App\Post;
use App\Reply;
use App\Services\PostsViewService;
use App\User;
use Illuminate\Http\Request;

class ExpertController extends Controller{

    function __construct(){

        $this->middleware('auth', [
            'except' => ['index', 'viewPopular', 'viewExpert', 'viewPosts']
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

        $expert = User::find($id);

        if ($expert){

            $postQ = $expert->post->where('type', 'POST');
            $data = $this->details($expert);
            $data['recentPost'] = $postQ->take(5);
            $data['recentResponses'] = $expert->replies->take(5);

            return view('expert.view')->with($data);
        }else return redirect()->route('experts');
    }

    function viewPosts($id){

        $expert = User::find($id);

        if($expert){
            $postViewService = new PostsViewService('POST');
            $data = $this->details($expert);
            $data += $postViewService->viewExpertPost($id);

            return view('expert.post')->with($data);
        }else return redirect()->route('experts');
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

    private function details($expert){

        $expert->password = null;
        $personalInfo = $expert->expert;
        $postQ = $expert->post->where('type', 'POST');
        $totalPost = $postQ->count();
        $totalFollowers = $expert->followers->count();
        $totalAnswers = Reply::where('parent_reply', null)->whereIn('post_id', $postQ->pluck('id')->toArray())->count();

        $data = [
            'title'             =>  'Expert',
            'expert'            =>  $expert,
            'personalInfo'      =>  $personalInfo,
            'totalPost'         =>  $totalPost,
            'totalFollowers'    =>  $totalFollowers,
            'totalAnswers'      =>  $totalAnswers,
        ];

        return $data;
    }
}
