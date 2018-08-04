<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Common\Services\EmailService;

use Validator;
use Flash;
use Sentinel;
use Reminder;
use URL;
use Auth;
use Session;
use Mail;

class AuthController extends Controller
{
  public $arr_view_data;
  public $admin_panel_slug;

  public function __construct()
  {   
	$this->admin_panel_slug = config('app.project.admin_panel_slug');
  }
  public function login()
  {
    $page_title                              = "Admin Login";
    $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
    $this->arr_view_data['page_title']       = "Login";
    return view('admin.auth.login',$this->arr_view_data);
  }

  public function process_login(Request $request)
  {
     $validator = Validator::make($request->all(), [
          'email' => 'required|max:255',
          'password' => 'required',
      ]);
		
      if ($validator->fails()) 
      {
          return redirect(config('app.project.admin_panel_slug').'/login')
                      ->withErrors($validator)
                      ->withInput($request->all());
      }

      $credentials = [
          'email'    => $request->input('email'),
          'password' => $request->input('password'),
          'user_type' => 1,
      ];
			
      $check_authentication = Auth::attempt($credentials);
		
      if($check_authentication)
      {        
          return redirect(config('app.project.admin_panel_slug').'/dashboard'); 
      }
      else
      {
        Flash::error('Invalid Login Credential');
        return redirect()->back();
      }

  }  

	public function logout(Request $request) {
		Auth::logout();
		return redirect('admin/login');
	}

}