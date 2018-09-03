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

	Route::get('startupSkilledPerson_activations', 'StartupSkilledPersonController@startupSkilledPersonActivations');
	Route::get('startupSkilledPerson_profiles', 'StartupSkilledPersonController@startupSkilledPersonProfiles');	
	Route::get('startupSkilledPerson_purchases', 'StartupSkilledPersonController@startupSkilledPersonPurchases');
	Route::get('activate_startupSkilledPerson/{id}', 'StartupSkilledPersonController@activate_startupSkilledPerson');
	Route::get('deactivate_startupSkilledPerson/{id}', 'StartupSkilledPersonController@deactivate_startupSkilledPerson');	
	Route::get('delete_startupSkilledPerson/{id}', 'StartupSkilledPersonController@delete_startupSkilledPerson');
	Route::get('block_startupSkilledPerson/{id}', 'StartupSkilledPersonController@block_startupSkilledPerson');
	Route::get('edit_startupSkilledPerson/{id}', 'StartupSkilledPersonController@edit_startupSkilledPerson');
	Route::get('startupSkilledPerson_profile_view/{id}', 'StartupSkilledPersonController@profile_view');
	Route::get('update_startupSkilledPerson_profile', 'StartupSkilledPersonController@update_profile');
	Route::post('update_startupSkilledPerson_profile', 'StartupSkilledPersonController@update_profile');	

	Route::get('startupInvestor_activations', 'StartupInvestorController@startupInvestorActivations');
	Route::get('startupInvestor_profiles', 'StartupInvestorController@startupInvestorProfiles');	
	Route::get('startupInvestor_purchases', 'StartupInvestorController@startupInvestorPurchases');
	Route::get('activate_startupInvestor/{id}', 'StartupInvestorController@activate_startupInvestor');
	Route::get('deactivate_startupInvestor/{id}', 'StartupInvestorController@deactivate_startupInvestor');	
	Route::get('delete_startupInvestor/{id}', 'StartupInvestorController@delete_startupInvestor');
	Route::get('block_startupInvestor/{id}', 'StartupInvestorController@block_startupInvestor');
	Route::get('edit_startupInvestor/{id}', 'StartupInvestorController@edit_startupInvestor');
	Route::get('startupInvestor_profile_view/{id}', 'StartupInvestorController@profile_view');
	Route::get('update_startupInvestor_profile', 'StartupInvestorController@update_profile');
	Route::post('update_startupInvestor_profile', 'StartupInvestorController@update_profile');	
	
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
	

	

	Route::get('investor_transactions/{id}', 'InvestorController@user_transactions');
	Route::get('member_transactions/{id}', 'MemberController@user_transactions');
	Route::get('small_investor_transactions/{id}', 'StartupSkilledPersonController@user_transactions');
	Route::get('seed_investor_transactions/{id}', 'StartupInvestorController@user_transactions');
	Route::get('fresher_transactions/{id}', 'FresherController@user_transactions');


});
	