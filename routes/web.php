<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes(["verify" => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', function(){
    return view('posts');
});
