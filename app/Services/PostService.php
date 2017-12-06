<?php

namespace App\Services;

use App\Http\Repositories\PostRepository;
use App\Post;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository; 
    }

    public function getPost($slug)
    {
        return $post = $this->postRepository->get($slug);
    }
}