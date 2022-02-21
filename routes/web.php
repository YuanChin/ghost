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

Route::get('/', 'TopicController@index')
     ->name('root')->middleware('verified');
