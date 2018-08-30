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
	Route::get('subscriptions', 'DashboardController@subscriptions');
	Route::get('edit_subscription/{id}', 'DashboardController@edit_subscription');
	Route::get('update_subscription', 'DashboardController@update_subscription');
	Route::post('update_subscription', 'DashboardController@update_subscription');
	
	Route::get('get_state_list','DashboardController@getStateList');
	Route::get('get_city_list','DashboardController@getCityList');

	Route::get('slugs','DashboardController@slugs');
	Route::get('edit_slug/{id}', 'DashboardController@edit_slug');
	Route::get('update_slug', 'DashboardController@update_slug');
	Route::post('update_slug', 'DashboardController@update_slug');

	Route::get('email_templates','DashboardController@email_templates');
	Route::get('edit_email_template/{id}', 'DashboardController@edit_email_template');
	Route::get('update_email_template', 'DashboardController@update_email_template');
	Route::post('update_email_template', 'DashboardController@update_email_template');

	Route::get('user_types', 'DashboardController@user_types');
	Route::get('edit_user_type/{id}', 'DashboardController@edit_user_type');
	Route::get('update_user_type', 'DashboardController@update_user_type');
	Route::post('update_user_type', 'DashboardController@update_user_type');

	Route::get('member_activations', 'MemberController@memberActivations');
	Route::get('member_profiles', 'MemberController@memberProfiles');
	Route::get('member_purchases', 'MemberController@memberPurchases');
	Route::get('activate_member/{id}', 'MemberController@activate_member');
	Route::get('deactivate_member/{id}', 'MemberController@deactivate_member');
	Route::get('delete_member/{id}', 'MemberController@delete_member');
	Route::get('block_member/{id}', 'MemberController@block_member');
	Route::get('edit_member/{id}', 'MemberController@edit_member');
	Route::get('member_profile_view/{id}', 'MemberController@profile_view');
	Route::get('update_member_profile', 'MemberController@update_profile');
	Route::post('update_member_profile', 'MemberController@update_profile');

	Route::get('investor_activations', 'InvestorController@investorActivations');
	Route::get('investor_profiles', 'InvestorController@investorProfiles');	
	Route::get('investor_purchases', 'InvestorController@investorPurchases');
	Route::get('activate_investor/{id}', 'InvestorController@activate_investor');
	Route::get('deactivate_investor/{id}', 'InvestorController@deactivate_investor');
	Route::get('delete_investor/{id}', 'InvestorController@delete_investor');
	Route::get('block_investor/{id}', 'InvestorController@block_investor');
	Route::get('edit_investor/{id}', 'InvestorController@edit_investor');
	Route::get('investor_profile_view/{id}', 'InvestorController@profile_view');
	Route::get('update_investor_profile', 'InvestorController@update_profile');
	Route::post('update_investor_profile', 'InvestorController@update_profile');

	Route::get('smallInvestor_activations', 'SmallInvestorController@smallInvestorActivations');
	Route::get('smallInvestor_profiles', 'SmallInvestorController@smallInvestorProfiles');	
	Route::get('smallInvestor_purchases', 'SmallInvestorController@smallInvestorPurchases');
	Route::get('activate_smallInvestor/{id}', 'SmallInvestorController@activate_smallInvestor');
	Route::get('deactivate_smallInvestor/{id}', 'SmallInvestorController@deactivate_smallInvestor');	
	Route::get('delete_smallInvestor/{id}', 'SmallInvestorController@delete_smallInvestor');
	Route::get('block_smallInvestor/{id}', 'SmallInvestorController@block_smallInvestor');
	Route::get('edit_smallInvestor/{id}', 'SmallInvestorController@edit_smallInvestor');
	Route::get('smallInvestor_profile_view/{id}', 'SmallInvestorController@profile_view');
	Route::get('update_smallInvestor_profile', 'SmallInvestorController@update_profile');
	Route::post('update_smallInvestor_profile', 'SmallInvestorController@update_profile');	

	Route::get('seedInvestor_activations', 'SeedInvestorController@seedInvestorActivations');
	Route::get('seedInvestor_profiles', 'SeedInvestorController@seedInvestorProfiles');	
	Route::get('seedInvestor_purchases', 'SeedInvestorController@seedInvestorPurchases');
	Route::get('activate_seedInvestor/{id}', 'SeedInvestorController@activate_seedInvestor');
	Route::get('deactivate_seedInvestor/{id}', 'SeedInvestorController@deactivate_seedInvestor');	
	Route::get('delete_seedInvestor/{id}', 'SeedInvestorController@delete_seedInvestor');
	Route::get('block_seedInvestor/{id}', 'SeedInvestorController@block_seedInvestor');
	Route::get('edit_seedInvestor/{id}', 'SeedInvestorController@edit_seedInvestor');
	Route::get('seedInvestor_profile_view/{id}', 'SeedInvestorController@profile_view');
	Route::get('update_seedInvestor_profile', 'SeedInvestorController@update_profile');
	Route::post('update_seedInvestor_profile', 'SeedInvestorController@update_profile');	
	
	Route::get('fresher_activations', 'FresherController@fresherActivations');
	Route::get('fresher_profiles', 'FresherController@fresherProfiles');
	Route::get('fresher_purchases', 'FresherController@fresherPurchases');
	Route::get('activate_fresher/{id}', 'FresherController@activate_fresher');
	Route::get('deactivate_fresher/{id}', 'FresherController@deactivate_fresher');
	Route::get('delete_fresher/{id}', 'FresherController@delete_fresher');
	Route::get('block_fresher/{id}', 'FresherController@block_fresher');
	Route::get('edit_fresher/{id}', 'FresherController@edit_fresher');
	Route::get('fresher_profile_view/{id}', 'FresherController@profile_view');
	Route::get('update_fresher_profile', 'FresherController@update_profile');
	Route::post('update_fresher_profile', 'FresherController@update_profile');
	

	
});
	