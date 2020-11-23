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

Route::get('/careers', 'FrontController@careers');
Route::get('/careers/{slug}', 'FrontController@careerDetail');

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


Route::post('/contact-us','ContactController@store')->middleware('cors');

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
Route::get('/app-download/{name}','FrontController@downloadAppAndStat');

Route::group(['prefix' => '/news'], function ($router) {
    Route::get('/', 'FrontController@newsList');
    Route::get('/{slug}', 'FrontController@newsDetail');
});

Route::group(['prefix' => '/admin'], function ($router) {

    Route::group(['middleware' => 'auth'], function ($router) {
        Route::get('/customers','CustomerController@index');
        Route::get('/customers/{id}','CustomerController@show');
        Route::post('/customers/{id}/generate_code','CustomerController@show');
        Route::post('/customers/{id}/send_code','CustomerController@show');

        Route::delete('/customers/{id}','CustomerController@destory');


        Route::get('/contacts','ContactController@index');
        Route::get('/contacts/{id}','ContactController@show');
        Route::delete('/contacts/{contact}','ContactController@destroy');
        Route::post('/contacts/{contact}/reply','ContactController@reply');

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        Route::resource('/blogs','BlogController');
        Route::get('/blogs-types','BlogController@types');
        Route::get('/blogs-types/add','BlogController@addType');
        Route::get('/blogs-types/{blogType}/update','BlogController@updateType');
        Route::get('/blogs-types/{blogType}/delete','BlogController@deleteType');
        Route::get('/blogs-sort','BlogController@ajaxSort');

        Route::resource('/careers','CareerController');
        Route::resource('/apps','AppController');
        Route::get('/apps/{app}/delete_file','AppController@deleteFile');
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


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/admin', 'AdminController@index')->name('admin');


Route::get('/test-mail', function () {
    return view('mails.invited_code');
});
//Auth::routes(['register' => false]);
