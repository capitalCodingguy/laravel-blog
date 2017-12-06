<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//博客列表
//Route::get('/blog', ['uses' => 'PostController@index', 'as' => 'post.index']);
Route::get('/blog_list', 'PostController@index');

Route::get('/blog/{slug}', 'PostController@get_blog');

Route::get('/recommendedPosts', 'PostController@recommended_posts');
//获取文章分类
Route::get('/categories', 'CategoryController@getAll');



