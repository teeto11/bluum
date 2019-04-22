<?php

Route::get('/', 'IndexController@index')->name('index');

Auth::routes(["verify" => true]);
Auth::routes();

Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::get('/following', 'UserController@following')->name('user.following');
Route::get('/profile/questions', 'UserController@questions')->name('user.questions');
Route::get('/profile/question/{category}', 'UserController@questions')->name('user.viewquestionsbycategory');
Route::get('/profile/question/popular', 'UserController@popularQuestions')->name('user.questions.popular');
Route::get('/profile/edit', 'UserController@showUpdateForm')->name('user.showeditform');
Route::post('/profile/update', 'UserController@update')->name('user.update');
Route::delete('/question/delete', 'UserController@deleteQuestion')->name('question.delete');
Route::delete('/reply/delete', 'UserController@deleteReply')->name('reply.delete');

//Blog post Routes
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/tag/{tag}', 'PostController@viewByTag')->name('blog.tag');
Route::get('/blog/unread', 'PostController@viewUnreadOnly')->name('blog.unread');
Route::get('/blog/popular', 'PostController@viewMostPopular')->name('blog.popular');
Route::get('/blog/following', 'PostController@viewByFollowing')->name('blog.following');
Route::get('/blog/{category}', 'PostController@viewByCategory')->name('blog.category');
Route::get('blog/post/edit/{id}', 'PostController@edit')->name('blog.post.edit')->middleware('auth');
Route::get('/blog/post/{id}/{title}', 'PostController@show')->name('blog.post');
Route::post('/blog/post/comment', 'ReplyController@addComment')->name('blog.post.comment');

//Q&A routes
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions/popular', 'QuestionController@viewMostPopular')->name('question.popular');
Route::get('/questions/unread', 'QuestionController@viewUnreadOnly')->name('question.unread');
Route::get('/question/following', 'QuestionController@viewByFollowing')->name('question.following');
Route::get('/question/ask', 'QuestionController@create')->name('question.create');
Route::get('/questions/category/{category}', 'QuestionController@viewByCategory')->name('question.showbycategory');
Route::get('/questions/tag/{tag}', 'QuestionController@viewByTag')->name('question.showbytag');
Route::post('/question/answer', 'ReplyController@answerQuestion')->name('question.answer');
Route::post('/question/answer/markAsCorrect', 'ReplyController@markAsCorrect')->name('question.answer.markAsCorrect');
Route::post('/question/answer/up-vote', 'ReplyVoteController@upVote')->name('question.answer.up-vote');
Route::post('/question/answer/down-vote', 'ReplyVoteController@downVote')->name('question.answer.down-vote');
Route::get('/question/{id}/{title}', 'QuestionController@show')->name('question.show');
Route::post('/question', 'QuestionController@store')->name('question.store');

Route::middleware('auth')->group(function() {
    Route::post('/post/like', 'PostLikeController@like')->name('post.like');
    Route::post('/post/unlike', 'PostLikeController@unlike')->name('post.unlike');

    Route::post('/reply/like', 'ReplyLikeController@like')->name('reply.like');
    Route::post('/reply/unlike', 'ReplyLikeController@unlike')->name('reply.unlike');
});

Route::middleware('roles:expert')->group(function() {
    Route::prefix('expert')->group(function () {
        Route::get('/profile', 'ExpertController@profile')->name('expert.profile');
        Route::get('/edit', 'ExpertController@showEditForm')->name('expert.edit');
        Route::post('/update', 'ExpertController@update')->name('expert.update');
        Route::get('/posts', 'ExpertController@viewPostsAsExpert')->name('expert.posts');
        Route::get('/post/popular', 'ExpertController@viewPopularPostsAsExpert')->name('expert.posts.popular');
        Route::get('/post/{category}', 'ExpertController@viewPostsAsExpert')->name('expert.posts.viewByCategory');
        Route::get('/answers', 'ExpertController@viewAnswersAsExpert')->name('expert.answers');
        Route::delete('/post', 'ExpertController@deletePost')->name('expert.post.delete');
        Route::delete('/post/reply', 'ExpertController@deleteResponse')->name('expert.post.reply.delete');

    });
});

Route::get('/experts', 'ExpertController@index')->name('experts');
Route::post('/expert/follow', 'ExpertController@followExpert')->name('expert.follow');
Route::post('/expert/unfollow', 'ExpertController@unfollowExpert')->name('expert.unfollow');
Route::get('/expert/{id}', 'ExpertController@viewExpert')->name('expert.show');
Route::get('/expert/{id}/posts', 'ExpertController@viewPostsAsGuest')->name('expert.guest.posts');
Route::get('/expert/{id}/post/popular', 'ExpertController@viewPopularPostsAsGuest')->name('expert.guest.posts.popular');
Route::get('/expert/{id}/post/{category}', 'ExpertController@viewPostsAsGuest')->name('expert.guest.posts.viewByCategory');
Route::get('/expert/{id}/answers', 'ExpertController@viewAnswersAsGuest')->name('expert.guest.answers');

Route::middleware('roles:expert,admin')->group(function() {
    Route::get('blog/post/new', 'PostController@create')->name('blog.post.create');
    Route::post('blog/post', 'PostController@store')->name('blog.post.store');
    Route::put('/blog/post/{post}', 'PostController@update')->name('blog.post.update');
});

Route::middleware('roles:admin')->group(function() {
   Route::prefix('admin')->group(function (){
       Route::get('/', 'Admin\AdminController@index')->name('admin.home');
       Route::get('/change-password', 'Admin\AdminController@showChangePasswordForm')->name('admin.changepasswordform');
       Route::post('/change-password', 'Admin\AdminController@changePassword')->name('admin.changepassword');

       Route::get('/users', 'Admin\UserController@index')->name('admin.users');

       Route::get('/experts', 'Admin\ExpertController@viewExperts')->name('admin.expert');
       Route::get('/expert/disabled', 'Admin\ExpertController@viewDisabledExperts')->name('admin.expert.disabled');
       Route::get('/expert/new', 'Admin\ExpertController@showAddExpertForm')->name('admin.expert.new');
       Route::post('/expert/new', 'Admin\ExpertController@addExpert')->name('admin.expert.store');
       Route::delete('/expert/delete', 'Admin\ExpertController@removeExpert')->name('admin.expert.delete');
       Route::put('/expert/restore', 'Admin\ExpertController@enableExpert')->name('admin.expert.enable');
       Route::get('/expert/{id}', 'Admin\ExpertController@viewExpert')->name('admin.expert.show')->where(['id'=>'[0-9]+']);
       Route::get('/expert/{id}/edit', 'Admin\ExpertController@showEditExpertForm')->name('admin.expert.edit')->where(['id'=>'[0-9]+']);
       Route::post('/expert/{id}/update', 'Admin\ExpertController@update')->name('admin.expert.update')->where(['id'=>'[0-9]+']);

       Route::get('/questions', 'Admin\QuestionController@index')->name('admin.questions');
       Route::get('/question/deleted', 'Admin\QuestionController@viewDeletedQuestions')->name('admin.questions.deleted');
       Route::delete('/question/delete', 'Admin\QuestionController@deleteQuestion')->name('admin.question.delete');
       Route::put('/question/restore', 'Admin\QuestionController@restoreQuestion')->name('admin.question.restore');
       Route::get('/question/{id}', 'Admin\QuestionController@viewQuestion')->name('admin.question.show')->where(['id'=>'[0-9]+']);
       Route::delete('/question/answer/delete', 'Admin\QuestionController@deleteAnswer')->name('admin.question.answer.delete');

       Route::get('/posts', 'Admin\PostController@index')->name('admin.posts');
       Route::get('/post/deleted', 'Admin\PostController@viewDeletedPosts')->name('admin.posts.deleted');
       Route::delete('/post/delete', 'Admin\PostController@deletePost')->name('admin.post.delete');
       Route::put('/post/restore', 'Admin\PostController@restorePost')->name('admin.post.restore');
       Route::get('/post/{id}', 'Admin\PostController@viewPost')->name('admin.post.show');
       Route::delete('/post/comment/delete', 'Admin\PostController@deleteComment')->name('admin.post.comment.delete');
   });
});

Route::post('/search', 'IndexController@search')->name('search');
Route::get('/search/{query}', 'IndexController@searchResult')->name('search.result');
Route::get('/notification', 'IndexController@notification')->name('notification');
Route::get('/terms', function (){ return view('terms')->with('title', 'Terms and Conditions'); })->name('terms');
Route::get('/privacy', function (){ return view('privacy')->with('title', 'Privacy Policy'); })->name('privacy');
Route::get('/contact-us', function (){ return view('contact')->with('title', 'Contact Us'); })->name('contact');
Route::get('/about', function (){ return view('about')->with('title', 'About Us'); })->name('about');
Route::get('/verification', function (){ return view('verification')->with('title', 'Verification'); })->name('verification.notice');
