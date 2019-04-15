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
            'except' => ['index', 'viewPopular', 'viewExpert', 'viewPostsAsGuest', 'viewAnswersAsGuest', 'viewPopularPostsAsGuest']
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

        if($request->redirect) {
            return redirect()->route($request->redirect)->with('success', "Followed expert");
        }else return redirect()->route('experts')->with('success', "Followed expert");
    }

    function unfollowExpert(Request $request){

        $this->validate($request, [
            'id' => ['required', 'string']
        ]);

        Followers::where([
            ['user_id', auth()->user()->id],
            ['expert_id', $request->id]
        ])->delete();

        if($request->redirect){
            return redirect()->route($request->redirect)->with('success', "UnFollowed expert");
        }else return redirect()->route('experts')->with('success', "UnFollowed expert");
    }

    function profile(){
        $expert = User::find(auth()->user()->id);
        if(!$this->isExpert($expert)) $this->accessDenied();

        $data = $this->expertDetails($expert);
        return view('expert.view')->with($data);
    }

    function showEditForm(){

        $expert = User::find(auth()->user()->id);
        if(!$this->isExpert($expert)) $this->accessDenied();

        $data = $this->expertDetails($expert);
        return view('expert.edit')->with($data);
    }

    function update(Request $request){

        $this->validate($request, [
            'telephone' => ['required', 'max:15'],
            'about' => ['string', 'required'],
            'expertise' => ['string', 'required'],
            'experience' => ['int', 'required'],
        ]);

        $expert = User::find(auth()->user()->id);
        if ($this->isExpert($expert)) $expert = $expert->expert; else return $this->accessDenied();

        $expert->expertise  = $request->expertise;
        $expert->experience = $request->experience;
        $expert->telephone  = $request->telephone;
        $expert->about      = $request->about;
        $expert->save();

        return redirect()->route('expert.edit')->with('success', 'Expert updated');
    }

    function viewExpert($id){

        $expert = User::find($id);
        if (!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->expertDetails($expert);
        return view('expert.view')->with($data);
    }

    function viewPostsAsExpert($category = null){

        $expert = User::find(auth()->user()->id);
        if(!$this->isExpert($expert)) $this->accessDenied();

        $data = $this->viewPost($expert);
        return view('expert.post')->with($data);
    }

    function viewPostsAsGuest($id, $category = null){

        $expert = User::find($id);
        if(!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->viewPost($expert);
        return view('expert.post')->with($data);
    }

    function viewPopularPostsAsExpert(){

        $expert = User::find(auth()->user()->id);
        if(!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->viewPopularPosts($expert);
        return view('expert.post')->with($data);
    }

    function viewPopularPostsAsGuest($id){

        $expert = User::find($id);
        if(!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->viewPopularPosts($expert);
        return view('expert.post')->with($data);
    }

    function viewAnswersAsExpert(){

        $expert = User::find(auth()->user()->id);
        if(!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->viewAnswers($expert);
        return view('expert.answers')->with($data);
    }

    function viewAnswersAsGuest($id){

        $expert = User::find($id);
        if (!$this->isExpert($expert)) return $this->accessDenied();

        $data = $this->viewAnswers($expert);
        return view('expert.answers')->with($data);
    }

    function deletePost(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $post = Post::find($request->id);
        if(auth()->user()->id == $post->user_id){
            $post->active = false;
            $post->save();

            return redirect()->route('expert.posts');
        }else return redirect()->route('index')->with('error', 'access denied');
    }

    function deleteResponse(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $reply = Reply::find($request->id);
        if(auth()->user()->id == $reply->user_id) {
            $reply->active = false;
            $reply->save();
        }

        return redirect()->route('expert.profile');
    }

    private function viewPopularPosts($expert){

        $postViewService = new PostsViewService('POST');
        $data = $this->details($expert);
        $data += $postViewService->viewUserPopularPost($expert->id);

        return $data;
    }

    private function expertDetails($expert){

        $postQ = $expert->post->where('type', 'POST');
        $data = $this->details($expert);
        $data['recentPost'] = $postQ->take(5);
        $data['recentResponses'] = $expert->replies->take(5);

        return $data;
    }

    private function viewPost($expert){

        $postViewService = new PostsViewService('POST');
        $data = $this->details($expert);
        $data += $postViewService->viewUserPost($expert->id);

        return $data;
    }

    private function viewAnswers($expert){

        $postViewService = new PostsViewService('QUESTION');
        $data = $this->details($expert);
        $questionIds = Post::where('type', 'QUESTION')->pluck('id')->toArray();
        $data['answers'] = Reply::where([
            'user_id'       => $expert->id,
            'parent_reply'  => null,
            'active'        => true
        ])->whereIn('post_id', $questionIds)->orderBy('created_at', 'DESC')->paginate(15);

        return $data;
    }

    private function details($expert){

        $expert->password = null;
        $personalInfo = $expert->expert;
        $totalPost = $expert->post->where('type', 'POST')->count();
        $totalFollowers = $expert->followers->count();
        $questionQ = Post::where(['type'=>'QUESTION']);
        $totalAnswers = Reply::where([
            'user_id'       => $expert->id,
            'parent_reply'  => null,
            'active'        => true
        ])->whereIn('post_id', $questionQ->pluck('id')->toArray())->count();

        $data = [
            'title'             =>  'Expert',
            'expert'            =>  $expert,
            'personalInfo'      =>  $personalInfo,
            'totalPost'         =>  $totalPost,
            'totalFollowers'    =>  $totalFollowers,
            'totalAnswers'      =>  $totalAnswers,
        ];

        if (auth()->user()) $data['following'] = $expert->followers->where('user_id', auth()->user()->id)->count();

        return $data;
    }

    private function accessDenied(){
        return redirect()->route('index')->with('error', 'Access denied');
    }

    private function isExpert($expert) {

        if($expert && $expert->role == 'EXPERT'){
            if($expert->expert) return true; else return false;
        }else return false;
    }
}
