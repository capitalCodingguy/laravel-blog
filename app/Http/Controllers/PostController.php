<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Repositories\PostRepository;
//use App\Http\Repositories\CommentRepository

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    //获取博客列表
    public function index()
    {
        $posts = $this->postRepository->pagedPosts(10);
        return $posts;
    }
    //获取单篇博文
    public function get_blog($slug){
        $post = get_post($slug);
        return $post;
    }
    //推荐文章列表
    public function recommended_posts()
    {
        $recommendedPosts = $this->postRepository->recommendedPosts();
        return $recommendedPosts;
    }

}