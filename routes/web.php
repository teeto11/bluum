<?php

Route::get('/', 'IndexController@index');

// Auth::routes(["verify" => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Blog post Routes
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/tag/{tag}', 'PostController@viewByTag')->name('blog.tag');
Route::get('/blog/unread', 'PostController@viewUnreadOnly')->name('blog.category');
Route::get('/blog/popular', 'PostController@viewMostPopular')->name('blog.category');
Route::get('/blog/{category}', 'PostController@viewByCategory')->name('blog.category');
Route::get('blog/post/new', 'PostController@create')->name('blog.post.create');
Route::get('/blog/post/{id}', 'PostController@show')->name('blog.post');
Route::post('blog/post', 'PostController@store')->name('blog.post.store');

//Q&A routes
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/category/{category}', 'QuestionController@showByCategory')->name('question.showbycategory');
Route::get('/question/ask', 'QuestionController@create')->name('question.create');
Route::get('/question/{id}', 'QuestionController@show')->name('question.show');
Route::post('/question', 'QuestionController@store')->name('question.store');

Route::post('/post/like', 'PostLikeController@like')->name('post.like');
Route::post('/post/unlike', 'PostLikeController@unlike')->name('post.unlike');
