<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function ($router) {
    Route::post('/check_invited_code','ApiController@checkInvitedCode');
    Route::post('/set_invited_code_used','ApiController@setInvitedCodeUsed');
    Route::post('/generate_invited_code','ApiController@generateInvitedCodeByUser');
    Route::post('/get_invited_code_status','ApiController@getInvitedCodeStatusByUser');
});
