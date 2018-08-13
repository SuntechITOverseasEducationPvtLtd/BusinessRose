<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Qualification;
use App\Experience;
use App\User;
use App\Connection;
use App\Shortlist;
use App\Invitation;
use Input;
use DB;

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
	
	/**
     * Saving Connections(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function SaveConnections(Request $request){
		$connectionObj = new Connection();
		$connectionObj->connected_to = base64_decode($request->get('connected_to'));
		$connectionObj->connected_by = base64_decode($request->get('connected_by'));
		$connectionObj->ip_address = $request->get('ip_address');
		$connectionObj->created_at = date('Y-m-d H:i:s');
		$connectionObj->updated_at = date('Y-m-d H:i:s');
		$connectionObj->save();
		return response()->json(['success'=>true,'data'=>'Connection created successfully'], $this->successStatus);
	}
	
	public function getMemberProfile($authUser, $userId){ 
		$userId = base64_decode($userId);
		$authUser = base64_decode($authUser);
		
		$is_connected = Connection::checkConnection($authUser, $userId);		
		$obj = User::where(['users.id'=>$userId, 'users.active'=>1, 'users.deleted_at'=>null])->groupBy(['users.id']);
		$obj->leftjoin('categories as cat','cat.id','users.category');
		$obj->leftjoin('qualifications as q','q.id','users.qualification');
		$obj->leftjoin('experiences as exp','exp.id','users.experience');
		$obj->leftjoin('investment_range as inv_range','inv_range.id','users.investment_range');
		$obj->leftjoin('investment_types as inv_type','inv_type.id','users.investment_type');
		$obj->leftjoin('relationship_statusses as rs','rs.id','users.relationship_status');
		$obj->leftjoin('states as state','state.id','users.state');
		$obj->leftjoin('cities as city','city.id','users.city');
		$obj->leftjoin('religions as rg','rg.id','users.religion');
		$obj->leftjoin('qualifications as qa','qa.id','users.qualification');
		$obj->leftjoin('languages as mt','mt.id','users.mother_tongue');
		$obj->leftjoin('languages as lang', function($join){
		   $join->whereRaw(DB::raw("find_in_set(lang.id, users.known_languages) > 0",DB::raw(''),DB::raw('')));		   
		});
		$obj->leftjoin('connections as con', function($join) use ($authUser, $userId){
		   $join->where(['connected_by'=>$authUser, 'connected_to'=>$userId])
			->orWhere(function($query) use ($authUser, $userId)
			{
			  $query->Where(['connected_by'=>$userId, 'connected_to'=>$authUser]);
			});		   
		});
		$obj->leftjoin('shortlists as sl', function($join) use ($authUser, $userId){
		   $join->where(['shortlist_by'=>$authUser, 'shortlist_to'=>$userId])
			->orWhere(function($query) use ($authUser, $userId)
			{
			  $query->Where(['shortlist_by'=>$userId, 'shortlist_to'=>$authUser]);
			});		   
		});
		$obj->leftjoin('invitations as invs', function($join) use ($authUser, $userId){
		   $join->where(['invited_by'=>$authUser, 'invited_to'=>$userId])
			->orWhere(function($query) use ($authUser, $userId)
			{
			  $query->Where(['invited_by'=>$userId, 'invited_to'=>$authUser]);
			});		   
		});
		
		$obj->select('cat.cat_name', 'users.sub_category', 'users.co_investment', 'exp.experience','inv_range.range', 'inv_type.investment_type', 'users.name', 'users.gender', 'rs.relation', 'city.city_name', 'state.state_name', 'rg.religion', 'mt.language as mother_tongue', 'qa.qualification', 'users.description_you_family as about_me', 'users.description_of_sales', 'users.description_of_profound_value', 'users.description_relocation_preferance', 'users.date_of_birth');
		
		$obj->addSelect(DB::raw('GROUP_CONCAT(lang.language) as language'), DB::raw('(CASE WHEN count(con.id) > 0 THEN 1 ELSE 0 END) as is_connected'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.email ELSE CONCAT(LEFT(users.email, 4), "xxxxxx@xxxx.com") END) as email'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.mobile ELSE CONCAT(LEFT(users.mobile, 4), "xxxxxx") END) as mobile'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.whatsup_number ELSE CONCAT(LEFT(users.whatsup_number, 4), "xxxxxx") END) as whatsup_number'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.linked_in_url ELSE "www.xxxxxx.com" END) as linked_in_url'), DB::raw('(CASE WHEN count(sl.id) > 0 THEN 1 ELSE 0 END) as is_shortlisted'), DB::raw('(CASE WHEN count(invs.id) > 0 THEN 1 ELSE 0 END) as is_invited'));
		$data = $obj->first(); 		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}
	
	/**
     * Saving Shortlists(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function SaveShortlists(Request $request){
		$shortlistObj = new Shortlist();
		$shortlistObj->shortlist_to = base64_decode($request->get('shortlist_to'));
		$shortlistObj->shortlist_by = base64_decode($request->get('shortlist_by'));
		$shortlistObj->ip_address = $request->get('ip_address');
		$shortlistObj->created_at = date('Y-m-d H:i:s');
		$shortlistObj->updated_at = date('Y-m-d H:i:s');
		$shortlistObj->save();
		return response()->json(['success'=>true,'data'=>'Successfully Shortlisted'], $this->successStatus);
	}
	
	/**
     * Saving Invitations(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function SaveInvitation(Request $request){
		$invitationObj = new Invitation();
		$invitationObj->invited_to = base64_decode($request->get('invited_to'));
		$invitationObj->invited_by = base64_decode($request->get('invited_by'));
		$invitationObj->ip_address = $request->get('ip_address');
		$invitationObj->created_at = date('Y-m-d H:i:s');
		$invitationObj->updated_at = date('Y-m-d H:i:s');
		$invitationObj->status = 1;
		$invitationObj->save();
		return response()->json(['success'=>true,'data'=>'Invitation Successfully Sent'], $this->successStatus);
	}
}
