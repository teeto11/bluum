<?php

Route::get('/', 'IndexController@index')->name('index');

// Auth::routes(["verify" => true]);
Auth::routes();

//Blog post Routes
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/tag/{tag}', 'PostController@viewByTag')->name('blog.tag');
Route::get('/blog/unread', 'PostController@viewUnreadOnly')->name('blog.unread');
Route::get('/blog/popular', 'PostController@viewMostPopular')->name('blog.popular');
Route::get('/blog/following', 'PostController@viewByFollowing')->name('blog.following');
Route::get('/blog/{category}', 'PostController@viewByCategory')->name('blog.category');
Route::get('blog/post/new', 'PostController@create')->name('blog.post.create');
Route::get('blog/post/edit/{id}', 'PostController@edit')->name('blog.post.edit');
Route::get('/blog/post/{id}/{title}', 'PostController@show')->name('blog.post');
Route::post('blog/post', 'PostController@store')->name('blog.post.store');
Route::put('/blog/post/{post}', 'PostController@update')->name('blog.post.update');
Route::post('/blog/post/comment', 'ReplyController@addComment')->name('blog.post.comment');

//Q&A routes
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/popular', 'QuestionController@viewMostPopular')->name('question.popular');
Route::get('/questions/unread', 'QuestionController@viewUnreadOnly')->name('question.unread');
Route::get('/question/following', 'QuestionController@viewByFollowing')->name('question.following');
Route::get('/question/ask', 'QuestionController@create')->name('question.create');
Route::get('/questions/category/{category}', 'QuestionController@viewByCategory')->name('question.showbycategory');
Route::get('/questions/tag/{tag}', 'QuestionController@viewByTag')->name('question.showbytag');
Route::post('/question/answer/markAsCorrect', 'ReplyController@markAsCorrect')->name('question.answer.markAsCorrect');
Route::post('/question/answer/up-vote', 'ReplyVoteController@upVote')->name('question.answer.up-vote');
Route::post('/question/answer/down-vote', 'ReplyVoteController@downVote')->name('question.answer.down-vote');
Route::post('/question/answer', 'ReplyController@answerQuestion')->name('question.answer');
Route::get('/question/{id}/{title}', 'QuestionController@show')->name('question.show');
Route::post('/question', 'QuestionController@store')->name('question.store');

Route::post('/post/like', 'PostLikeController@like')->name('post.like');
Route::post('/post/unlike', 'PostLikeController@unlike')->name('post.unlike');

Route::post('/reply/like', 'ReplyLikeController@like')->name('reply.like');
Route::post('/reply/unlike', 'ReplyLikeController@unlike')->name('reply.unlike');

Route::get('/experts', 'ExpertController@index')->name('experts');
Route::post('/expert/follow', 'ExpertController@followExpert')->name('expert.follow');
Route::post('/expert/unfollow', 'ExpertController@unfollowExpert')->name('expert.unfollow');
Route::get('/expert/{id}/posts', 'ExpertController@viewPosts')->name('expert.post');
Route::get('/expert/{id}/answers', 'ExpertController@viewAnswers')->name('expert.answers');
Route::get('/expert/{id}', 'ExpertController@viewExpert')->name('expert.profile');

Route::get('/admin', 'Admin\AdminController@index')->name('admin.home');
Route::get('/admin/experts', 'Admin\ExpertController@viewExperts')->name('admin.expert');
Route::get('/admin/expert/new', 'Admin\ExpertController@showAddExpertForm')->name('admin.expert.new');
Route::post('/admin/expert/new', 'Admin\ExpertController@addExpert')->name('admin.expert.store');
Route::delete('/admin/expert/delete', 'Admin\ExpertController@removeExpert')->name('admin.expert.delete');
Route::get('/admin/expert/{id}', 'Admin\ExpertController@viewExpert')->name('admin.expert.show');

Route::get('/admin/questions', 'Admin\QuestionController@index')->name('admin.questions');
Route::delete('/admin/question/delete', 'Admin\QuestionController@deleteQuestion')->name('admin.question.delete');
Route::get('/admin/question/{id}', 'Admin\QuestionController@viewQuestion')->name('admin.question.show');
Route::delete('/admin/question/answer/delete', 'Admin\QuestionController@deleteAnswer')->name('admin.question.answer.delete');

Route::get('/admin/posts', 'Admin\PostController@index')->name('admin.posts');
Route::delete('/admin/post/delete', 'Admin\PostController@deletePost')->name('admin.post.delete');
Route::get('/admin/post/{id}', 'Admin\PostController@viewPost')->name('admin.post.show');
Route::delete('/admin/post/comment/delete', 'Admin\PostController@deleteComment')->name('admin.post.comment.delete');

Route::get('/search/{query}', 'IndexController@search')->name('search');