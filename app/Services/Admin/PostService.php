<?php

namespace App\Services\Admin;


use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class PostService{

    private $type;

    public function __construct($type){

        $this->type = $type;
    }

    public function posts($status, $q = null){

        $posts = Post::where([ 'type'=>$this->type, 'active'=>$status])->orderBy('created_at', 'DESC');

        if($q){
            $expertIds = User::where('firstname', 'like', "%$q%")
                ->orWhere('lastname', 'like', "%$q%")
                ->orWhere(DB::raw("CONCAT(firstname,' ',lastname)"), 'like', "%$q%")
                ->orWhere(DB::raw("CONCAT(lastname,' ',firstname)"), 'like', "%$q%")
                ->pluck('id')->toArray();

            $posts = $posts->where(function ($query) use ($q, $expertIds) {
                            $query->where('title', 'like', "%$q%")
                                ->orWhere('body', 'like', "%$q%")
                                ->orWhere('category', $q)
                                ->orWhere('tags', 'like', "%$q%")
                                ->orWhere('type', $q)
                                ->orWhereIn('user_id', $expertIds);
                            })->orderBy('views', 'DESC');
        }

        $data = [
            'type'  =>  $status ? 'active' : 'deleted',
            'posts' =>  $posts->paginate(15)
        ];

        return $data;
    }

    public function deletePost($request){

        $post = Post::find($request->id);
        if(! $post) return false;
        $post->active = false;
        $post->save();

        return true;
    }

    public function restorePost($request){

        $post = Post::find($request->id);
        if(! $post) return false;
        $post->active = true;
        $post->save();

        return true;
    }

}