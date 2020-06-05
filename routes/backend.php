<?php
use Illuminate\Support\Facades\Route;
use App\Models\Stall;

Route::group(array('namespace' => 'backend', 'prefix' => 'backend'), function() {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::get('/forget', 'LoginController@getForgetPassword');
    Route::post('/reset', 'LoginController@postResetPassword');
    Route::post('/login', 'LoginController@attempt')->name('attempt');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(array('namespace' => 'backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => 'auth.backend'), function() {
    Route::model('stall', Stall::class);
    
    Route::get('/', 'DefaultController@index');
    Route::resource('users', 'UserController', ['only' => ['index']]);
    Route::resource('categories', 'CategoryController');
    Route::resource('stalls', 'StallController');
    Route::resource('feedbacks', 'FeedbackController');
});