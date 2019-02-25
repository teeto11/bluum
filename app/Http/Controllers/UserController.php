<?php

namespace App\Http\Controllers;

use App\Followers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function __construct(){

        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function profile(){

        $data = $this->details();
        $data['title'] = 'Profile';
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
