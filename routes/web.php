<?php

Route::get('/', function () {
    return view('index');
});

// Auth::routes(["verify" => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', function(){
    return view('posts');
});
