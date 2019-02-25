<?php

namespace App\Http\Controllers;

use App\Followers;
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

        return view('user.index')->with($data);
    }

    private function details(){

        $user = User::find(auth()->user()->id);
        $following = $user->following->count();
        $totalQuestions = $user->post->where('TYPE', 'QUESTION')->count();

        $data = [
            'user'              => $user,
            'following'         => $following,
            'totalQuestions'    => $totalQuestions,
        ];

        return $data;
    }
}