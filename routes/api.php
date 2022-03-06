<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
     ->namespace('Api')
     ->name('api.v1.')
     ->group(function () {

     Route::middleware('throttle:' . config('api.rate_limits.sign'))
          ->group(function () {
          /**
           * the related routes of authorization
           */
          // Login
          Route::post('authorizations', 'AuthorizationController@store')
               ->name('authorizations.store');
          // Refresh token
          Route::put('authorizations/current', 'AuthorizationController@update')
               ->name('authorizations.update');
          // Delete token
          Route::delete('authorizations/current', 'AuthorizationController@destroy')
               ->name('authorizations.destroy');
     });

     Route::middleware('throttle:' . config('api.rate_limits.access'))
          ->group(function () {

          /**
           * 登入後可以訪問的接口
           */
          Route::middleware('auth:api')->group(function () {
               Route::get('user', 'UserController@current')
                    ->name('user.show');
               Route::patch('user', 'UserController@update')
                    ->name('user.update');
               Route::post('images', 'ImageController@store')
                    ->name('images.store');
               
               // the related routes of topic
               Route::resource('topics', 'TopicController')->only([
                    'store', 'update', 'destroy'
               ]);

               // the related routes of reply
               Route::post('topics/{topic}/replies', 'ReplyController@store')
                    ->name('topics.replies.store');
               Route::delete('topics/{topic}/replies/{reply}', 'ReplyController@destroy')
                    ->name('topics.replies.destroy');

               // the related routes of notification
               Route::get('notifications', 'NotificationController@index')
                    ->name('notifications.index');
               Route::get('notifications/stats', 'NotificationController@stats')
                    ->name('notifications.stats');
          });

          
          /**
           * 遊客可以訪問的接口
           */
          Route::get('users/{user}', 'UserController@show')
               ->name('users.show');
          
          // the related route of category
          Route::get('categories', 'CategoryController@index')
               ->name('categories.index');
          
          // the related routes of topic
          Route::resource('topics', 'TopicController')->only([
               'index', 'show'
          ]);

          Route::get('topics/{topic}/replies', 'ReplyController@index')
               ->name('topics.replies.index');
          Route::get('users/{user}/replies', 'ReplyController@repliesOfTheUser')
               ->name('users.replies.repliesOfTheUser');



          
     });






    
});