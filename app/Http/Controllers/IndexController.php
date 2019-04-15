<?php

namespace App\Http\Controllers;

use App\Followers;
use App\Notificaton;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller{

    public function __construct(){

        $this->middleware('auth', [
            'except' => ['index', 'search', 'searchResult']
        ]);
    }

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

    function search(Request $request){

        $this->validate($request, [
            'sQuery' => ['string', 'required']
        ]);

        return redirect()->route('search.result', urlencode($request->sQuery));
    }

    function searchResult($query){

        $query = urldecode($query);
        $expertIds = User::where('firstname', 'like', "%$query%")
                            ->orWhere('lastname', 'like', "%$query%")
                            ->orWhere(DB::raw("CONCAT(firstname,' ',lastname)"), 'like', "%$query%")
                            ->orWhere(DB::raw("CONCAT(lastname,' ',firstname)"), 'like', "%$query%")
                            ->pluck('id')->toArray();

        $posts = Post::where('active', true)
                        ->where(function ($q) use ($query, $expertIds) {
                            $q->where('title', 'like', "%$query%")
                                    ->orWhere('body', 'like', "%$query%")
                                    ->orWhere('category', $query)
                                    ->orWhere('tags', 'like', "%$query%")
                                    ->orWhere('type', $query)
                                    ->orWhereIn('user_id', $expertIds);
                        })
                        ->orderBy('views', 'DESC')->paginate(15);

        $data = [
            'title'     => 'Search',
            'result'    => $posts,
            'query'     => $query,
        ];

        return view('search')->with($data);

    }

    function notification(){

        $data = [
            'title' => 'Notification',
            'notifications' => Notificaton::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
        ];

        Notificaton::where([ ['user_id', auth()->user()->id], ['seen', false] ])->update(['seen' => true]);

        return view('notification')->with($data);
    }
}
