<?php

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
    return view('index');
});

Route::group(['prefix' => '/news'], function ($router) {
    Route::get('/', 'FrontController@newsList');
    Route::get('/{slug}', 'FrontController@newsDetail');
});

Route::group(['prefix' => '/admin'], function ($router) {

    Route::group(['middleware' => 'auth'], function ($router) {
        Route::resource('/blogs','BlogController');
        Route::get('/blogs-types','BlogController@types');
        Route::get('/blogs-types/add','BlogController@addType');
        Route::get('/blogs-types/{blogType}/update','BlogController@updateType');
        Route::get('/blogs-types/{blogType}/delete','BlogController@deleteType');
        Route::get('/blogs-sort','BlogController@ajaxSort');
    });

    //admin user
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
// Password Reset Routes...
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
});


Route::get('/admin', 'AdminController@index')->name('admin');

