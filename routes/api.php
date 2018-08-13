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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('signup/activate/{token}', 'Api\UserController@signupActivate');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('allusers', 'Api\HomeController@getAllMembers');
	Route::get('getUserProfile/{authUser}/{userId}', 'Api\HomeController@getMemberProfile');
	Route::post('filters', 'Api\HomeController@filters');
	Route::post('connectNow', 'Api\HomeController@SaveConnections');
	Route::post('shortListNow', 'Api\HomeController@SaveShortlists');
	Route::post('inviteNow', 'Api\HomeController@SaveInvitation');
});
