<?php

namespace App\Http\Controllers;

use App\Followers;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class indexController extends Controller{

    public function index(){

        $popular_questions = Post::where([
            ['likes', '>', 0],
            ['type', 'QUESTION']
        ])->orderBy('likes', 'desc')->take(5)->get();

        $topExpertId = Followers::select('expert_id', DB::raw('count(user_id) as followers'))
                                    ->groupBy('expert_id')
                                    ->orderBy('followers', 'DESC')
                                    ->take(4)
                                    ->pluck('expert_id')
                                    ->toArray();

        $topExperts = User::whereIn('id', $topExpertId)->get();

        $data = [
            'popular_questions' => $popular_questions,
            'topExperts' => $topExperts,
            'title' => 'Home',
        ];

        return view("index")->with($data);
    }

    function search($query){

        $query = urldecode($query);
        return view('search')->with('title', 'Result');
    }
}
