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
Route::get('filters', 'Api\HomeController@filters');
	
Route::group(['middleware' => 'auth:api', 'namespace'=>"Api"], function(){
	Route::any('allusers', 'HomeController@getAllMembers');
	Route::get('getUserProfile/{authUser}/{userId}', 'HomeController@getMemberProfile');
	Route::post('connectNow', 'HomeController@SaveConnections');
	Route::post('shortListNow', 'HomeController@SaveShortlists');
	Route::post('inviteNow', 'HomeController@SaveInvitation');
	Route::get('myshortlists', 'HomeController@myShortlists');
	Route::get('myinvitations/{type}', 'HomeController@myInvitations');

	Route::any('all-transactions', 'HomeController@allTransactions');
	Route::any('account-settings', 'HomeController@accountSettings');
	Route::any('all-subscriptions', 'HomeController@allSubscriptions');
	Route::any('delete-profile', 'HomeController@deleteProfile');
	Route::any('hide-profile', 'HomeController@hideProfile');
	Route::any('user-views-settings', 'HomeController@user_views_settings');
	Route::any('shortlist-settings', 'HomeController@shortlist_settings');
	Route::any('invitation-to-connect-settings', 'HomeController@invitation_to_connect_settings');
	Route::any('get-state-list', 'HomeController@getStateList');
	Route::any('get-city-list', 'HomeController@getCityList');

	Route::any('change-password', 'UserController@changePassword');
	Route::any('forgot-password', 'UserController@forgotPassword');
	Route::any('update-password', 'UserController@updatePassword');

	Route::any('connect-now', 'HomeController@connectNow');
	Route::any('shortlist-now', 'HomeController@shortlistNow');
	Route::any('invite-now', 'HomeController@inviteNow');

	Route::any('update', 'UserController@update');
	Route::any('subscribe-now', 'HomeController@subscribeNow');

});
