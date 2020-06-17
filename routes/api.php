<?php

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

Route::group(['namespace' => 'api\publics', 'prefix' => 'publics'], function() {
    Route::post('register', 'LoginController@register');
    Route::post('login', 'LoginController@login');
    Route::post('quick-login', 'LoginController@quickLogin');
});

Route::group(['namespace' => 'api\cs', 'prefix' => 'cs', 'middleware' => ['auth:api']], function(){
    Route::get('profile', 'DefaultController@profile');
});