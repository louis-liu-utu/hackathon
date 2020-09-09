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

Route::get('/help-center', function () {
    return view('help_center');
});

Route::get('/careers', function () {
    return view('careers');
});

Route::get('/about-us', function () {
    return view('introduce');
});
Route::get('/ground-rules', function () {
    return view('ground_rules');
});
Route::get('/privacy-notice', function () {
    return view('privacy_notice');
});

Route::get('/get-started', function () {
    return view('get_started');
});

Route::post('/get-started','CustomerController@store');

Route::get('/get-started-message',function () {
    return view('get_started_message');
});


Route::get('/contact-us', function () {
    return view('contact_us');
});

Route::post('/contact-us','ContactController@store');

Route::get('/contact-us-message',function () {
    return view('contact_us_message');
});


Route::get('/cookie-notice', function () {
    return view('cookie_notice');
});
Route::get('/term-of-use', function () {
    return view('terms');
});
Route::get('/roadmap', function () {
    return view('roadmap');
});

Route::group(['prefix' => '/admin'], function ($router) {

    Route::group(['middleware' => 'auth'], function ($router) {
        Route::get('/customers','CustomerController@index');
        Route::get('/customers/{id}','CustomerController@show');
        Route::delete('/customers/{id}','CustomerController@destory');

        Route::get('/contacts','ContactController@index');
        Route::get('/contacts/{id}','ContactController@show');
        Route::delete('/contacts/{id}','ContactController@destory');

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
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



//Auth::routes(['register' => false]);
