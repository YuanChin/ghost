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