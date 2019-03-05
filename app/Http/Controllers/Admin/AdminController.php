<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Services\Admin\AdminService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller{

    public function index(){

        $blogPosts = Post::where(['type'=>'POST', 'active'=>true])->count();
        $questions = Post::where(['type'=>'QUESTION', 'active'=>true])->count();
        $experts = User::where(['role'=>'EXPERT', 'active'=>true])->count();
        $users = User::count();
        $latestQuestions = Post::where(['type'=>'QUESTION', 'active'=>true])->orderBy('created_at', 'DESC')->take(3)->get();
        $latestExperts = User::where(['role'=>'EXPERT', 'active'=>true])->orderBy('created_at', 'DESC')->take(3)->get();
        $latestUsers = User::where('role', 'USER')->orderBy('created_at', 'DESC')->take(3)->get();

        $data = [
            'blogPost' => $blogPosts,
            'questions' => $questions,
            'experts' => $experts,
            'users' => $users,
            'latestQuestions' => $latestQuestions,
            'latestExperts' => $latestExperts,
            'latestUsers' => $latestUsers
        ];

        return view('admin.home')->with($data);
    }

    public function showChangePasswordForm(){

        return view('admin.change-password');
    }

    public function changePassword(Request $request){

        $this->validate($request, [
            'password'              =>  ['required'],
            'new_password'              =>  ['required'],
            'new_password_confirmation' =>  ['required', 'same:new_password'],
        ]);

        return redirect()->route('admin.changepasswordform')->with(AdminService::changePassword($request));
    }

    public function showLoginForm(){

    }

    public function login(){

    }
}
