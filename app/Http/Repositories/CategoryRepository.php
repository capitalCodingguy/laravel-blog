<?php

namespace App\Http\Repositories;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryRepository extends Repository
{
    static $tag = 'category';
    public function model()
    {
        return app(Category::class);
    }

    public function getAll()
    {
        $categories = Category::withCount('posts')->get();
        return $categories;
    }

    public function get($name)
    {
        $category = Category::where('name', $name)->first();
        return $category;
    }

    public function tag()
    {
        return CategoryRepository::$tag;
    }

    public function getDetail(Category $category)
    {
        $posts = $category->posts()->select(Post::selectArrayWithOutContent)->with(['tags', 'category'])->withCount('comments')->orderBy('created_at', 'desc')->paginate(7);
        return $posts;
    }

}