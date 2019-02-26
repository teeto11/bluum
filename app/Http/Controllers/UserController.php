<?php

namespace App\Http\Controllers;

use App\Followers;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    public function __construct(){

        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function profile(){

        $data = $this->details();
        $data['title'] = 'Profile';

        $topExpertId = Followers::select('expert_id', DB::raw('count(user_id) as followers'))
            ->where('user_id', auth()->user()->id)
            ->groupBy('expert_id')
            ->orderBy('followers', 'DESC')
            ->take(4)
            ->pluck('expert_id')
            ->toArray();

        $data['topFollowing'] = User::whereIn('id', $topExpertId)->get();
        $data['recentQuestions'] = Post::where([ ['user_id', auth()->user()->id], ['type', 'QUESTION'] ])->take(4)->get();
        $data['recentResponse'] = Reply::where('user_id', auth()->user()->id)->take(4)->get();

        return view('user.index')->with($data);
    }

    public function deleteReply(Request $request){

        $this->validate($request, [
            'id' => ['int', 'required']
        ]);

        $reply = Reply::find($request->id);
        if($reply && $reply->user_id == auth()->user()->id){

            $reply->delete();
            return redirect()->route('user.profile');
        }else{ return redirect()->route('user.profile')->with('error', 'Access denied'); }
    }

    public function deleteQuestion(Request $request){

        $this->validate($request, [
            'id' => ['int', 'required']
        ]);

        $question = Post::find($request->id);

        if($question && $question->user_id == auth()->user()->id){

            $question->delete();
            return redirect()->route('user.profile');
        }else{ return redirect()->route('user.profile')->with('error', 'Access denied'); }
    }

    public function following(){

        $data = $this->details();
        $data['title'] = 'Following';

        $followingIds = Followers::where('user_id', auth()->user()->id)->pluck('expert_id')->toArray();
        $data['usersFollowing'] = User::whereIn('id', $followingIds)->get();

        return view('user.following')->with($data);
    }

    private function details(){

        $user = User::find(auth()->user()->id);
        $following = $user->following->count();
        $totalQuestions = $user->post->where('type', 'QUESTION')->count();

        $data = [
            'user'              => $user,
            'following'         => $following,
            'totalQuestions'    => $totalQuestions,
        ];

        return $data;
    }
}