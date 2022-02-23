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
     Route::resource('users', 'UserController')->only([
          'edit', 'update'
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
