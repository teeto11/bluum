<?php

namespace App\Services;

use App\Code;
use App\Followers;
use App\Post;
use App\PostView;
use App\User;
use http\Env\Request;

class PostsViewService{

    private $type;
    private $tag;
    private $category;
    private $title;

    public function __construct($type){

        $this->type = $type;
        if($type == 'POST'){
            $this->tag = 'BP_TAG';
            $this->category = 'BP_CATEGORY';
            $this->title = 'Blog';
        }elseif ($type == 'QUESTION'){
            $this->tag = 'Q_TAG';
            $this->category = 'Q_CATEGORY';
            $this->title = 'Questions';
        }
    }

    public function viewPosts(){

        $posts = Post::where('type', $this->type)->orderBy('created_at', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewPostsByCategory($category){

        $category = unFormatUrlString($category);
        $posts = Post::where([
            'type' => $this->type,
            'category' => $category
        ])->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewPostsByPopularity(){

        $posts = Post::where('type', $this->type)->orderBy('likes', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;
        $data['active_link'] = 'popular-link';

        return $data;
    }

    public function viewPostsByTags($tag){

        $tag = strtolower(urldecode($tag));
        $posts = Post::where([['tags', 'LIKE', "%$tag%"], ['type', $this->type]])->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewByFollowing(){

        $expertsId = Followers::where('user_id', auth()->user()->id)->pluck('expert_id')->toArray();
        $posts = Post::where('type', $this->type)->whereIn('user_id', $expertsId)->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;
        $data['active_link'] = 'following-link';

        return $data;
    }

    public function viewUnreadPost(){

        $seenPost = PostView::where('user_id', auth()->user()->id)->pluck('post_id')->toArray();
        $posts = Post::where('type', $this->type)->whereNotIn('id', $seenPost)->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;
        $data['active_link'] = 'unread-link';

        return $data;
    }

    public function viewExpertPost($id){

        $filters = self::getFilter();
        $filters['filters'][] = ['user_id', $id];
        $posts = Post::where($filters['filters'])->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['urlPad'] = $filters['urlPad'];
        $data['posts'] = $posts;

        return $data;
    }

    public function viewExpertPopularPost($id){

        $filters = self::getFilter();
        $filters['filters'][] = ['user_id', $id];
        $posts = Post::where($filters['filters'])->orderBy('likes', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['urlPad'] = $filters['urlPad'];
        $data['posts'] = $posts;

        return $data;
    }

    public function viewExpertAnswers($id){

        $filters = self::getFilter();
    }

    public function getFilter(){

        $filters = array();
        $filters[] = ['type', $this->type];
        $urlPad = '';

        if (request('category')) {
            $filters[] = ['category', request('category')];
            $urlPad .= '&category='.request('category');
        }


        if (request('tag')) {
            $filters[] = ['tags', 'LIKE', '%'.request('category').'%' ];
            $urlPad .= '&tag='.request('tag');
        }

        return [
            'filters' => $filters,
            'urlPad' => $urlPad,
        ];
    }

    private function viewPostsData(){

        $categories = Code::where('key', $this->category)->get();
        $pinned_posts = [];
        $top_tags = Code::where('key', $this->tag)->orderBy('additional_info', 'desc')->take(10)->get();

        $data = [
            'title' => $this->title,
            'pinned_posts' => $pinned_posts,
            'categories' => $categories,
            'top_tags' => $top_tags,
            'active_link' => 'latest-link',
        ];

        return $data;
    }
}