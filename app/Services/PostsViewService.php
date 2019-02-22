<?php

namespace App\Services;

use App\Code;
use App\Post;
use App\PostView;
use App\User;

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
        $posts = Post::where([['tags', $tag], ['type', $this->type]])->orderBy('created_at', 'DESC')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

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