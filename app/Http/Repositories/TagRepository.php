<?php

namespace App\Http\Repositories;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagRepository extends Repository
{
    static $tag = 'tag';

    public function model()
    {
        return app(Tag::class);
    }

    public function getAll()
    {
        $tags = Tag::withCount('posts')->get();
        return $tags;
    }

    public function get($name)
    {
        $tag = Tag::where('name', $name)->firstOrFail();
        return $tag;
    }

    public function pagedPostsByTag(Tag $tag, $page = 7)
    {
        $posts = $tag->posts()->select(Post::selectArrayWithOutContent)->with(['tags', 'category'])->withCount('comments')->orderBy('created_at', 'desc')->paginate($page);
        return $posts;
    }

    public function tag()
    {
        return TagRepository::$tag;
    }

}