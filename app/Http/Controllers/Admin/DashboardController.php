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
use App\Http\Controllers\Admin\Auth;

use Charts;
use Sentinel;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->module_view_folder 		= "admin.dashboard";
		$this->admin_url_path     		= url(config('app.project.admin_panel_slug'));
	}
   
    public function dashboard()
    {    	
    	  $data['members']['member_count'] = DB::table('users')->where('user_type','=',3)->get();

        $data['members']['active'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['members']['inactive'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['members']['account_closed'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['members']['blocked'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['members']['purchased'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['members']['account_denied'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['members']['not_connected'] = DB::table('users')->where('user_type', '=', 3)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['investors']['investor_count'] = DB::table('users')->where('user_type','=',2)->get();

        $data['investors']['active'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['investors']['inactive'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['investors']['account_closed'] =DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['investors']['blocked'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['investors']['purchased'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['investors']['account_denied'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['investors']['not_connected'] = DB::table('users')->where('user_type', '=', 2)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['startupSkilled']['startupSkilled_count'] = DB::table('users')->where('user_type','=',4)->get();

        $data['startupSkilled']['active'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['startupSkilled']['inactive'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['startupSkilled']['account_closed'] =DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['startupSkilled']['blocked'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['startupSkilled']['purchased'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['startupSkilled']['account_denied'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['startupSkilled']['not_connected'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['startupSkilled']['startupSkilled_count'] = DB::table('users')->where('user_type','=',4)->get();

        $data['startupSkilled']['active'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['startupSkilled']['inactive'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['startupSkilled']['account_closed'] =DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['startupSkilled']['blocked'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['startupSkilled']['purchased'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['startupSkilled']['account_denied'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['startupSkilled']['not_connected'] = DB::table('users')->where('user_type', '=', 4)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['startupInvestor']['startupInvestor_count'] = DB::table('users')->where('user_type','=',5)->get();

        $data['startupInvestor']['active'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['startupInvestor']['inactive'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['startupInvestor']['account_closed'] =DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['startupInvestor']['blocked'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['startupInvestor']['purchased'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['startupInvestor']['account_denied'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['startupInvestor']['not_connected'] = DB::table('users')->where('user_type', '=', 5)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['fresher']['fresher_count'] = DB::table('users')->where('user_type','=',6)->get();

        $data['fresher']['active'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 1)
                                                ->get();
        $data['fresher']['inactive'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 2)
                                                ->get();

        $data['fresher']['account_closed'] =DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 3)
                                                ->get();
        $data['fresher']['blocked'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 4)
                                                ->get();

        $data['fresher']['purchased'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 5)
                                                ->get();
        $data['fresher']['account_denied'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 6)
                                                ->get();

        $data['fresher']['not_connected'] = DB::table('users')->where('user_type', '=', 6)
                                                ->where('active', '=', 7)
                                                ->get();

        $data['total_sales']['total_price'] = DB::table('transactions')
                                                ->whereYear('validity', '=', date('Y'))
                                                ->select(DB::raw("SUM(price) as total_price"))
                                                ->get();

        $data['total_sales']['total_price'] = DB::table('transactions')
                                                ->whereYear('validity', '=', date('Y'))
                                                ->select(DB::raw("SUM(price) as total_price"))
                                                ->get();                                                


    	return view($this->module_view_folder.'.home',$data);
    }

    public function subscriptions()
    {       
        $data['subscriptions'] = DB::table("subscriptions")->get();
        return view('admin.subscriptions.list',$data);
    }

    public function edit_subscription($id)
    {    
        $data['subscriptions'] = DB::table("subscriptions")->where('id','=',$id)->first();
        return view('admin.subscriptions.view',$data);
    }

    public function update_subscription(Request $request)
    {  
        $res = $request->all();
        $date = date('Y-m-d h:i:s');
        DB::table('subscriptions')
        ->where('id','=',$res['id'])
        ->update(array(
            'title'=>$res['title'],
            'credits'=>$res['credits'],
            'discount'=>$res['discount'],
            'description'=>$res['description'],
            'discount_validity'=>$res['discount_validity'],
            'price'=>$res['price'],
            'status'=>$res['status'],
            'updated_at'=>$date,
            'updated_by'=>1
        ));

        return redirect('admin/subscriptions');
    }

    public function slugs()
    {       
        $data['slugs'] = DB::table("slugs")->get();
        return view('admin.slugs.list',$data);
    }

    public function edit_slug($id)
    {    
        $data['slugs'] = DB::table("slugs")->where('id','=',$id)->first();
        return view('admin.slugs.view',$data);
    }

    public function update_slug(Request $request)
    {  
        $res = $request->all();
        $date = date('Y-m-d h:i:s');
        DB::table('slugs')
        ->where('id','=',$res['id'])
        ->update(array(
            'page_name'=>$res['page_name'],
            'meta_keyword'=>$res['meta_keyword'],
            'meta_description'=>$res['meta_description'],
            'page_content'=>$res['page_content'],
            'status'=>$res['status'],
            'updated_at'=>$date
        ));

        return redirect('admin/slugs');
    }    

    public function getStateList(Request $request)
    { 
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("state_name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    { 
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("city_name","id");
        return response()->json($cities);
    }

    public function user_types()
    {       
        $data['user_types'] = DB::table("user_types")->get();
        return view('admin.user_types.list',$data);
    }

    public function edit_user_type($id)
    {    
        $data['user_types'] = DB::table("user_types")->where('id','=',$id)->first();
        return view('admin.user_types.view',$data);
    }

    public function update_user_type(Request $request)
    {  
        $res = $request->all();
        $date = date('Y-m-d h:i:s');
        DB::table('user_types')
        ->where('id','=',$res['id'])
        ->update(array(
            'user_type'=>$res['user_type'],
            'description'=>$res['description'],
            'status'=>$res['status'],
            'updated_at'=>$date
        ));

        return redirect('admin/user_types');
    }

    public function email_templates()
    {       
        $data['email_templates'] = DB::table("email_templates")->get();
        return view('admin.email_templates.list',$data);
    }

    public function edit_email_template($id)
    {    
        $data['email_templates'] = DB::table("email_templates")->where('id','=',$id)->first();
        return view('admin.email_templates.view',$data);
    }

    public function update_email_template(Request $request)
    {  
        $res = $request->all();
        $date = date('Y-m-d h:i:s');
        DB::table('email_templates')
        ->where('id','=',$res['id'])
        ->update(array(
            'category_name'=>$res['category_name'],
            'subject'=>$res['subject'],
            'mail_body'=>$res['mail_body'],
            'status'=>$res['status']
        ));

        return redirect('admin/email_templates');
    }    

}