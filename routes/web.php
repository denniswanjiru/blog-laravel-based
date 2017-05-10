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

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);

//Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Single Post
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Posts
Route::resource('posts', 'PostController');

//Admins
Route::get('profile', [
	'uses' => 'AdminController@getProfile',
	'as' => 'admin.profile'
	]);

Route::post('profile', [
	'uses' => 'AdminController@updateAvatar',
	'as' => 'admin.profile'
	]);

//Authentication
Auth::routes();

//Layouts
Route::get('/', ['as' => '/', 'uses' => 'LayoutController@getIndex']);
Route::get('contact', ['as' => 'layouts.contact', 'uses' => 'LayoutController@getContact']);
Route::post('contact', ['as' => 'layouts.contact', 'uses' => 'LayoutController@postContact']);

