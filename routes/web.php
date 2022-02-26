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
Route::get('topics/{topic}', 'TopicController@show')
     ->name('topics.show');

// topics in the category
Route::get('categories/{category}', 'CategoryController@show')
     ->name('categories.show');
