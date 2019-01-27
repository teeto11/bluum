<?php

namespace App\Services;

use App\Code;
use App\Post;

class PostsViewService{

    public function viewPosts($type){

        $posts = Post::where('type', $type)->orderBy('created_at', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewPostsByCategory($category, $type){

        $category = urldecode($category);
        $posts = Post::where([
            'type' => $type,
            'category' => $category
        ])->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewPostsByPopularity($type){

        $posts = Post::where('type', $type)->orderBy('likes', 'desc')->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    public function viewPostsByTags($tag, $type){

        $tag = strtolower(urldecode($tag));
        $posts = Post::where([['tags', 'like', "%$tag%"], ['type', $type]])->paginate(15);
        $data = $this->viewPostsData();
        $data['posts'] = $posts;

        return $data;
    }

    private function viewPostsData(){

        $categories = Code::where('key', 'BP_CATEGORY')->get();
        $pinned_posts = [];
        $top_tags = Code::where('key', 'BP_TAG')->orderBy('additional_info', 'desc')->take(10)->get();

        $data = [
            'title' => 'Blog',
            'pinned_posts' => $pinned_posts,
            'categories' => $categories,
            'top_tags' => $top_tags
        ];

        return $data;
    }
}