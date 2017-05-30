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

// User Profile
Route::get('user/profile', 'ProfileController@getProfile')->name('user.profile');
Route::post('user/profile', 'ProfileController@updateAvatar')->name('user.profile');

// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'Auth\AdminLoginController@getLogin')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@postLogin')->name('admin.login');
  Route::get('admin/profile', 'AdminController@profile')->name('admin.profile');
});

Route::get('/dashboard', 'PostController@index')->name('admin.dashboard');

//Authentication
Auth::routes();

//Pages
Route::get('/', ['as' => '/', 'uses' => 'PagesController@getIndex']);
Route::get('contact', ['as' => 'pages.contact', 'uses' => 'PagesController@getContact']);
Route::post('contact', ['as' => 'pages.contact', 'uses' => 'PagesController@postContact']);
