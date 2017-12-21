<?php

namespace App\Http\Repositories;

use App\Post;
use App\Tag;
use Carbon\Carbon;
use App\Configuration;
use Illuminate\Http\Request;

class PostRepository extends Repository
{
    static $tag = 'post';

    public function __construct()
    {

    }

    public function model()
    {
        return app(Post::class);
    }

    public function count() 
    {
        $count = $this->model()->withoutGlobalScopes()->count();
        return $count;
    }
    public function pagedPosts($page = 7) 
    {
        $posts = Post::select(Post::selectArrayWithOutContent)->with(['tags', 'category'])->orderBy('created_at', 'desc')->paginate($page);
        return $posts;
    }

    /** 获取单篇博文详情 */
    public function get($slug)
    {
        $post = Post::where('id', $slug)->with(['tags', 'category', 'configuration'])->firstOrFail();
        return $post;
    }

    public function tag()
    {
        return PostRepository::$tag;
    }
    //推荐文章列表
    public function recommendedPosts($limit = 5)
    {
        $recommendedPosts = Post
            ::orderBy('view_count', 'desc')
            ->select([
            'title',
            'id',
            'slug',
            'view_count',])
            ->limit($limit)
            ->get();
        return $recommendedPosts;
    }
    //创建文章
    public function create(Request $request)
    {
        $ids = [];
        $tags = $request['tags'];
        if (!empty($tags)) {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $ $tagName]);
                array_push($ids, $tag->id);
            }
        }
        $status = $request->get('status', 0);
        if ($status == 1) {
            $request['published_at'] = Carbon::now();
        }

    }
}