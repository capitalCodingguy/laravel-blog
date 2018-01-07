<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); 
});
Route::middleware('refresh.token')->group(function($router) {
    $router->get('profile', 'UserController@profile');
});
Route::middleware('api')->group(function($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
});
//博客列表
Route::get('/blog_list', 'PostController@index');

Route::get('/blog/{slug}', 'PostController@get_blog');

Route::get('/recommendedPosts', 'PostController@recommended_posts');
//获取文章分类
Route::get('/categories', 'CategoryController@getAll');
Route::get('/category/{name}', 'CategoryController@getCategoryDetail');
//获取标签
Route::get('/tag', 'TagController@index');
//获取标签文章列表
Route::get('/tag/{name}', 'TagController@show');



