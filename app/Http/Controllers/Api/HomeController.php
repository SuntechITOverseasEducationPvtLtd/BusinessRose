<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Qualification;
use App\Experience;
use App\User;
use Input;

class HomeController extends Controller
{
	public $successStatus = 200;
	
    /**
     * Filters api
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(){ 
        $data['categories '] = Category::pluck('cat_name','id');
		$data['sub_categories '] = SubCategory::pluck('sub_cat_name','id');
		$data['qualifications '] = Qualification::pluck('qualification','id');
		$data['experience '] = Experience::pluck('experience','id');
		
		//$data['states '] = State::pluck('state','id');
		//$data['cities '] = City::pluck('city','id');
		
		/*$data['investment_types '] = InvestmentType::pluck('cat_name','id');
		$data['investment_range '] = InvestmentRange::pluck('cat_name','id');
		$data['occupations '] = Occupation::pluck('cat_name','id');
		$data['subscriptions '] = Subscription::pluck('cat_name','id');*/
		
		return response()->json(['success'=>true,'filters'=>$data], $this->successStatus);
    }
	
	/**
     * Total Users List(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function getAllMembers(Request $request){
		$data['categories '] = Category::pluck('cat_name','id');
		$data['sub_categories '] = SubCategory::pluck('sub_cat_name','id');
		$data['qualifications '] = Qualification::pluck('qualification','id');
		$data['experience '] = Experience::pluck('experience','id');
		
		$userObj = User::where(['active'=>1,'deleted_at'=>null]);
		if($request->has('cat_id'))
		{
			$userObj->whereIn('cat_id', $request['cat_id']);
		}
		$data['users '] = $userObj->get(); 		
		//$data['users '] = User::where(['active'=>1,'deleted_at'=>null])->get(); 		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}
	
	public function getMemberProfile($user_id){ 
		$user_id = base64_decode($user_id);
		$data = User::where(['id'=>$user_id, 'active'=>1, 'deleted_at'=>null])->first(); 		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}
}
