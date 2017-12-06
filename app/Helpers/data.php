<?php

use App\Post;
use App\Services\PostService;

if (!function_exists('get_post')) {
    function get_post($slug)
    {
        return app(PostService::class)->getPost($slug);
    }
}