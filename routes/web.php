<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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
  return view('layouts.master');
})->name('home');

Route::view('/signin', 'signin')->name('login');

Route::view('/signup', 'signup')->name('signup');

Route::get('/signout', 'UserController@signOut')->name('signout');

Route::post('/signup', 'UserController@signUp');

Route::post('/signin', 'UserController@signIn');

// Route::view('/dashboard', 'dashboard')->middleware('auth');
Route::get('/dashboard', 'PostController@getDashboard')->name('dashboard')->middleware('auth');

Route::post('/createpost','PostController@postCreatePost')->name('post.create');

Route::get('/delete-post/{post_id}','PostController@getDeletePost')->name('delete.post');

Route::post('/edit-post/', 'PostController@postEditPost')->name('edit.post');

Route::get('/user','UserController@getUser')->name('user');