<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index(){

        $data = [
            'title' =>  'Users',
            'users' =>  UserService::all(request('q')),
        ];

        return view('admin.users')->with($data);
    }
}
