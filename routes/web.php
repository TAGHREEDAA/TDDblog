<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog','PostsController@index')->name('blog');
Route::get('/blog/{post}','PostsController@show')->name('show-post');
Route::post('/blog/{post}/comment','CommentController@store')->name('add-comment');;
Route::post('/post','PostsController@store')->name('add-post');
Route::view('/post/create','post.create')->middleware('auth');
Route::view('/blog/create','post.create');



