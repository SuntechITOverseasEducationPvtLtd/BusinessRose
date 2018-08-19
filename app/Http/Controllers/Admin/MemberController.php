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
use app\User;

class MemberController extends Controller
{
	public function __construct()
	{
    	$this->module_view_folder 		= "admin.members";
    	$this->admin_url_path     		= url(config('app.project.admin_panel_slug'));
	}
   
    public function memberActivations()
    {    	
    	$data['users'] = DB::table("users")
                            ->join("categories",'categories.id','users.category')
                            ->join("sub_categories",'sub_categories.id','users.sub_category')
                            ->join("experiences",'experiences.id','users.experience')
                            ->join("countries",'countries.id','users.country')
                            ->join("states",'states.id','users.state')
                            ->join("cities",'cities.id','users.city')
                            ->where(['active'=>1,'deleted_at'=>null])->get();
    	return view($this->module_view_folder.'.activations',$data);
    }

    public function memberProfiles()
    {       
        $data['users'] = DB::table("users")
                            ->join("categories",'categories.id','users.category')
                            ->join("sub_categories",'sub_categories.id','users.sub_category')
                            ->join("experiences",'experiences.id','users.experience')
                            ->join("countries",'countries.id','users.country')
                            ->join("states",'states.id','users.state')
                            ->join("cities",'cities.id','users.city')
                            ->where(['active'=>1,'deleted_at'=>null])->get();
        return view($this->module_view_folder.'.Profiles',$data);
    }

    public function memberPurchases()
    {       
        $arr_view_data['cats'] = "1";
        $arr_view_data['sub_cats'] = "2";
        return view($this->module_view_folder.'.purchases',$arr_view_data);
    }

    

}