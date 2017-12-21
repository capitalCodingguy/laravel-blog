<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TagRepository;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->getAll();
        return $tags; 
    }

    public function show($name)
    {
        $tag = $this->tagRepository->get($name);
        $page_size = 7; 
        $posts = $this->tagRepository->pagedPostsByTag($tag, $page_size);
        return $posts;
    }
}