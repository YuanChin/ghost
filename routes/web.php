<?php

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

Auth::routes(['verify' => true]);
Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', 'FacebookController@login')
         ->name('login');
    Route::get('callback', 'FacebookController@callback')
         ->name('callback');
});


/**
 * they can be used after having to login and verify
 */
Route::middleware(['auth', 'verified'])->group(function () {
     // the related route of users
     Route::resource('users', 'UserController')->only([
          'edit', 'update'
     ]);

     // the related routes of topic
     Route::resource('topics', 'TopicController')->only([
          'edit', 'update', 'create', 'store', 'destroy'
     ]);
     Route::post('upload_image', 'TopicController@uploadImage')
          ->name('topics.upload_image');
     Route::post('topics/{topic}/favor', 'TopicController@favor')
          ->name('topics.favor');
     Route::delete('topics/{topic}/disfavor', 'TopicController@disfavor')
          ->name('topics.disfavor');
     Route::get('topics/favorites', 'TopicController@favorites')
          ->name('topics.favorites');

     // the related routes of reply
     Route::resource('replies', 'ReplyController')->only([
          'store', 'destroy'
     ]);

     // the related route of notification
     Route::resource('notifications', 'NotificationController')->only([
          'index'
     ]);
});


/**
 * They can be used for everyone
 */
Route::get('/', 'TopicController@index')
     ->name('root');
// the related route of users
Route::get('users/{user}', 'UserController@show')
     ->name('users.show');

// the related routes of topic
Route::get('topics', 'TopicController@index')
     ->name('topics.index');
Route::get('topics/{topic}/{slug?}', 'TopicController@show')
     ->name('topics.show');

// topics in the category
Route::get('categories/{category}', 'CategoryController@show')
     ->name('categories.show');
