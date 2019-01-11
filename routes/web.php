<?php

Route::get('/', 'indexController@index');

// Auth::routes(["verify" => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Blog post Routes
Route::get('/blog', 'PostController@index')->name('blog');
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
