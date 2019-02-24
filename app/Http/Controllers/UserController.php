<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function __construct(){

        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function profile(){

        $user = User::find(auth()->user()->id);

        $data = [
            'user' => $user,
            'title' => 'Profile'
        ];

        return view('user.index')->with($data);
    }
}
