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
use Illuminate\Support\Facades\Input;  
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use app\User;

class SeedInvestorController extends Controller
{
	public function __construct()
	{
    	$this->module_view_folder 		= "admin.seedInvestors";
    	$this->admin_url_path     		= url(config('app.project.admin_panel_slug'));
	}
   
    public function seedInvestorActivations()
    {    	
    	$data['users'] = DB::table("users")
                            ->join("categories",'categories.id','users.category')
                            ->join("sub_categories",'sub_categories.id','users.sub_category')
                            ->join("experiences",'experiences.id','users.experience')
                            ->join("countries",'countries.id','users.country')
                            ->join("states",'states.id','users.state')
                            ->join("cities",'cities.id','users.city')
                            //->where(['active'=>1,'deleted_at'=>null])
                            ->where(['deleted_at'=>null])
                            ->where(['user_type'=>5])
                            ->select('users.id as user_id','users.*','categories.cat_name','sub_categories.sub_cat_name','experiences.*','countries.*','states.*','cities.*')
                            ->get();
    	return view($this->module_view_folder.'.activations',$data);
    }

    public function seedInvestorProfiles()
    {       
        $data['users'] = DB::table("users")
                            ->join("categories",'categories.id','users.category')
                            ->join("sub_categories",'sub_categories.id','users.sub_category')
                            ->join("experiences",'experiences.id','users.experience')
                            ->join("qualifications",'qualifications.id','users.qualification')
                            ->join("countries",'countries.id','users.country')
                            ->join("states",'states.id','users.state')
                            ->join("cities",'cities.id','users.city')
                            //->where(['active'=>1,'deleted_at'=>null])
                            ->where(['deleted_at'=>null])
                            ->where(['user_type'=>5])
                            ->select('users.id as user_id','users.created_at as user_created_at','users.*','categories.cat_name','sub_categories.sub_cat_name','experiences.*','countries.*','states.*','cities.*','qualifications.*')
                            ->get();
        return view($this->module_view_folder.'.profiles',$data);
    }

    public function seedInvestorPurchases()
    {       
        $data['users'] = DB::table("users")
                            ->join("categories",'categories.id','users.category')
                            ->join("sub_categories",'sub_categories.id','users.sub_category')
                            ->join("experiences",'experiences.id','users.experience')
                            ->join("qualifications",'qualifications.id','users.qualification')
                            ->join("countries",'countries.id','users.country')
                            ->join("states",'states.id','users.state')
                            ->join("cities",'cities.id','users.city')
                            //->where(['active'=>1,'deleted_at'=>null])
                            ->where(['deleted_at'=>null])
                            ->where(['user_type'=>5])
                            ->select('users.id as user_id','users.created_at as user_created_at','users.*','categories.cat_name','sub_categories.sub_cat_name','experiences.*','countries.*','states.*','cities.*','qualifications.*')
                            ->get();
        
        return view($this->module_view_folder.'.purchases',$data);
    }

    public function activate_seedInvestor($id)
    {    
        DB::table('users')->where('id', '=', $id)->update(array('active'=>1));
        return redirect('admin/seedInvestor_activations');
    }

    public function deactivate_seedInvestor($id)
    {    
        DB::table('users')->where('id', '=', $id)->update(array('active'=>6));
        return redirect('admin/seedInvestor_activations');
    }

    public function delete_seedInvestor($id)
    {    
        DB::table('users')->where('id', '=', $id)->update(array('deleted_at'=>1));
        return redirect('admin/seedInvestor_profiles');
    }

    public function block_seedInvestor($id)
    {    
        DB::table('users')->where('id', '=', $id)->update(array('active'=>4));
        return redirect('admin/seedInvestor_profiles');
    }

    public function profile_view($id)         
    {    
        $data['users'] = DB::table("users")
                        ->join("user_types",'user_types.id','users.user_type')
                        ->join("categories",'categories.id','users.category')
                        ->join("sub_categories",'sub_categories.id','users.sub_category')
                        ->join("experiences",'experiences.id','users.experience')
                        ->join("qualifications",'qualifications.id','users.qualification')
                        ->join("occupations",'occupations.id','users.occupation')
                        ->join("religions",'religions.id','users.religion')
                        ->join("countries",'countries.id','users.country')
                        ->join("languages",'languages.id','users.mother_tongue')
                        ->join("investment_range",'investment_range.id','users.investment_range')
                        ->join("investment_types",'investment_types.id','users.investment_type')
                        ->join("relationship_statusses",'relationship_statusses.id','users.relationship_status')
                        ->join("states",'states.id','users.state')
                        ->join("cities",'cities.id','users.city')
                        ->where(['users.id'=>$id])
                        ->select('users.id as user_id','users.user_type as userType','users.*','categories.cat_name','sub_categories.sub_cat_name','experiences.*','countries.*','states.*','cities.*','qualifications.*','occupations.*','religions.*','languages.*','investment_range.*','investment_types.*','relationship_statusses.*','user_types.*')
                        ->first();
        
        return view('admin.dashboard.profile_view',$data);
    }

    public function edit_seedInvestor($id)
    {    
        $data['users'] = DB::table("users")
                        ->join("user_types",'user_types.id','users.user_type')
                        ->join("categories",'categories.id','users.category')
                        ->join("sub_categories",'sub_categories.id','users.sub_category')
                        ->join("experiences",'experiences.id','users.experience')
                        ->join("qualifications",'qualifications.id','users.qualification')
                        ->join("occupations",'occupations.id','users.occupation')
                        ->join("religions",'religions.id','users.religion')
                        ->join("countries",'countries.id','users.country')
                        ->join("languages",'languages.id','users.mother_tongue')
                        ->join("investment_range",'investment_range.id','users.investment_range')
                        ->join("investment_types",'investment_types.id','users.investment_type')
                        ->join("relationship_statusses",'relationship_statusses.id','users.relationship_status')
                        ->join("states",'states.id','users.state')
                        ->join("cities",'cities.id','users.city')
                        ->where(['users.id'=>$id])
                        ->select('users.id as user_id','users.user_type as userType','users.*','categories.cat_name','sub_categories.sub_cat_name','experiences.*','countries.*','states.*','cities.*','qualifications.*','occupations.*','religions.*','languages.*','investment_range.*','investment_types.*','relationship_statusses.*','user_types.*')
                        ->first();

        $data['qualifications'] = DB::table('qualifications')->get();
        $data['occupations'] = DB::table('occupations')->get();
        $data['experiences'] = DB::table('experiences')->get();
        $data['categories'] = DB::table('categories')->get();
        $data['sub_categories'] = DB::table('sub_categories')->get();
        $data['religions'] = DB::table('religions')->get();
        $data['languages'] = DB::table('languages')->get();
        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->get();
        $data['cities'] = DB::table('cities')->get();
        $data['relationship_statusses'] = DB::table('relationship_statusses')->get();
        $data['investment_range'] = DB::table('investment_range')->get();
        $data['investment_types'] = DB::table('investment_types')->get();

        return view('admin.dashboard.edit_user_profile',$data);
    }

    public function update_profile(Request $request)
    {  
        $res = $request->all();

    if($res['userType'] == 3 || $res['userType'] == 6){
    $description_of_skills_experience =(isset($res['skills_experience']))?$res['skills_experience']:"";
    $description_you_family = (isset($res['description_you_family']))?$res['description_you_family']:"";
    $description_place_business = (isset($res['desc_place_business']))?$res['desc_place_business']:"";    
    $description_relocation_preferance = "";
    $monthly_yearly_sales = "";
    $description_of_profound_value = "";
    } else {
    $description_of_skills_experience =(isset($res['desc_skills_experience']))?$res['desc_skills_experience']:"";
    $description_you_family = (isset($res['desc_you_family']))?$res['desc_you_family']:"";
    $description_place_business = "";
    $description_relocation_preferance = (isset($res['relocation_preferance']))?$res['relocation_preferance']:"";
    $monthly_yearly_sales = (isset($res['monthly_yearly_sales']))?$res['monthly_yearly_sales']:"";
    $description_of_profound_value = (isset($res['profound']))?$res['profound']:"";
    }           
        
        DB::table('users')
        ->where('id','=',$res['userId'])
        ->update(array(
            'name'=>$res['username'],
            //'email'=>$res['email'],
            'date_of_birth'=>$res['date_of_birth'],
            'gender'=>$res['gender'],
            'mobile'=>$res['mobile'],
            'whatsup_number'=>$res['whatsup_number'],
            'profile_created_by'=>$res['profile_created_by'],
            'qualification'=>$res['qualification'],
            'occupation'=>$res['occupation'],
            'experience'=>$res['experience'],
            'category'=>$res['category'],
            'sub_category'=>$res['sub_category'],
            'religion'=>$res['religion'],
            'mother_tongue'=>$res['mother_tongue'],
            'known_languages'=>$res['language'],
            'country'=>$res['country'],
            'state'=>$res['state'],
            'city'=>$res['city'],
            'relationship_status'=>$res['relation'],
            'investment_range'=>$res['investment_range'],
            'investment_type'=>$res['investment_type'],
            'linked_in_url'=>$res['linkedin'],
            'facebook_url'=>$res['facebook_url'],
            'description_of_skills_experience' =>$description_of_skills_experience,
            'description_place_business' =>$description_place_business,
            'description_you_family' =>$description_you_family,
            'description_relocation_preferance' =>$description_relocation_preferance,
            'monthly_yearly_sales' =>$monthly_yearly_sales,
            'description_of_profound_value'=>$description_of_profound_value,
            'profile_pic'=>"dummy.jpg"
        ));

        return redirect('admin/seedInvestor_profiles');
    }

    

}