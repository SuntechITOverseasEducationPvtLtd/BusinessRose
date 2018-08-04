<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
/*use App\Models\ContactEnquiryModel;*/
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\MemberInterviewModel;
use App\Models\RealtimeExperienceModel;
use App\Models\TransactionModel;
use App\Models\TransactionHistoryModel;
use App\Models\MultiReferenceBookModel;
use App\Models\InterviewDetailModel;
use App\Models\ReviewRatingModel;

use Charts;
use Sentinel;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->arr_view_data      		= [];		
		$this->module_view_folder 		= "admin.dashboard";
		$this->admin_url_path     		= url(config('app.project.admin_panel_slug'));
	}
   
    public function dashboard()
    {    	
    	return view($this->module_view_folder.'.home',$this->arr_view_data);
    }

}