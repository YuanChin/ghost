<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    // the related routes of the user
    $router->get('/users', 'UserController@index');

    // the related routes of the category
    $router->resource('categories', CategoryController::class);

    // the related routes of the topic
    $router->get('topics', 'TopicController@index');
    $router->get('topics/{topic}', 'TopicController@show');
    $router->delete('topics/{topic}', 'TopicController@destroy');

    // the related routes of the reply
    $router->get('replies', 'ReplyController@index');
    $router->get('replies/{reply}', 'ReplyController@show');
    $router->delete('replies/{reply}', 'ReplyController@destroy');

    // the related routes of the link
    $router->resource('links', LinkController::class);
});
