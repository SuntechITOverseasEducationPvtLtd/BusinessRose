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

class MemberController extends Controller
{
	public function __construct()
	{
		$this->module_view_folder 		= "admin.members";
		$this->admin_url_path     		= url(config('app.project.admin_panel_slug'));
	}
   
    public function memberActivations()
    {    	
    	$arr_view_data['cats'] = "1";
    	$arr_view_data['sub_cats'] = "2";
    	return view($this->module_view_folder.'.activations',$arr_view_data);
    }

    public function memberProfiles()
    {       
        $arr_view_data['cats'] = "1";
        $arr_view_data['sub_cats'] = "2";
        return view($this->module_view_folder.'.Profiles',$arr_view_data);
    }

    public function memberPurchases()
    {       
        $arr_view_data['cats'] = "1";
        $arr_view_data['sub_cats'] = "2";
        return view($this->module_view_folder.'.purchases',$arr_view_data);
    }

    

}