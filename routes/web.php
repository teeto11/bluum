<?php

Route::get('/', 'IndexController@index');

// Auth::routes(["verify" => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Blog post Routes
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/tag/{tag}', 'PostController@viewByTag')->name('blog.tag');
Route::get('/blog/unread', 'PostController@viewUnreadOnly')->name('blog.unread');
Route::get('/blog/popular', 'PostController@viewMostPopular')->name('blog.popular');
Route::get('/blog/{category}', 'PostController@viewByCategory')->name('blog.category');
Route::get('blog/post/new', 'PostController@create')->name('blog.post.create');
Route::get('blog/post/edit/{id}', 'PostController@edit')->name('blog.post.edit');
Route::get('/blog/post/{id}/{title}', 'PostController@show')->name('blog.post');
Route::post('blog/post', 'PostController@store')->name('blog.post.store');
Route::put('/blog/post/{post}', 'PostController@update')->name('blog.post.update');
Route::post('/blog/post/comment', 'ReplyController@addComment')->name('blog.post.comment');

//Q&A routes
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/category/{category}', 'QuestionController@showByCategory')->name('question.showbycategory');
Route::get('/question/ask', 'QuestionController@create')->name('question.create');
Route::get('/question/{id}', 'QuestionController@show')->name('question.show');
Route::post('/question', 'QuestionController@store')->name('question.store');

Route::post('/post/like', 'PostLikeController@like')->name('post.like');
Route::post('/post/unlike', 'PostLikeController@unlike')->name('post.unlike');

Route::post('/reply/like', 'ReplyLikeController@like')->name('reply.like');
Route::post('/reply/unlike', 'ReplyLikeController@unlike')->name('reply.unlike');