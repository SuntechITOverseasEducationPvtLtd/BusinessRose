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
    return view('welcome');
});

$admin_path = config('app.project.admin_panel_slug');
/* Admin Routes */
Route::group(['prefix' => $admin_path,'middleware'=>['admin'],'namespace'=>'Admin'], function () 
{
	Route::get('/', 'AuthController@login');
	Route::get('login', 'AuthController@login');
	Route::post('process_login', 'AuthController@process_login');
	Route::get('logout', 'AuthController@logout');
	Route::get('dashboard', 'DashboardController@dashboard');
	Route::get('price_list', 'DashboardController@priceList');
	Route::get('member_activations', 'MemberController@memberActivations');
	Route::get('investor_activations', 'InvestorController@investorActivations');
	Route::get('member_purchases', 'MemberController@memberPurchases');
	Route::get('investor_purchases', 'InvestorController@investorPurchases');
	Route::get('member_profiles', 'MemberController@memberProfiles');
	Route::get('investor_profiles', 'InvestorController@investorProfiles');
	
});
