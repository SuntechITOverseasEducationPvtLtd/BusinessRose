<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

	protected $dates = ['deleted_at'];	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activation_token', 'user_type', 'gender', 'mobile', 'date_of_birth', 'qualification', 'occupation', 'experience', 'whatsup_number', 'category', 'sub_category', 'religion', 'investment_range', 'investment_type', 'linked_in_url', 'profile_pic', 'mother_tongue', 'known_languages', 'is_accept_terms','country', 'state', 'city', 'relationship_status', 'active', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'revenue_seeking_status', 'description_of_skills_experience', 'co_investment', 'views', 'description_you_family', 'description_of_profound_value', 'description_of_sales', 'description_you_family', 'description_place_business', 'description_relocation_preferance', 'profile_created_by'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];
	
	public static function getAllMembers($request){
		//print_r(Auth::user()->id);
		$obj = User::where(['active'=>1,'deleted_at'=>null]);		
		$obj->join('user_types as ut','ut.id','users.user_type');
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
		$obj->leftjoin('connections as con', function($join){
			$join->on('connected_to', '=', 'users.id');
			$join->on('connected_by', '=', DB::raw(Auth::user()->id));
			$join->orOn(function($query) {
				$query->on('connected_by', '=', 'users.id');
				$query->on('connected_to', '=',DB::raw(Auth::user()->id));
			});					   
		});
		$obj->leftjoin('shortlists as sl', function($join){
			$join->on('shortlist_to', '=', 'users.id');
			$join->on('shortlist_by', '=', DB::raw(Auth::user()->id));			
		});
		$obj->leftjoin('invitations as invs', function($join){
			$join->on('invited_to', '=', 'users.id');
			$join->on('invited_by', '=', DB::raw(Auth::user()->id));
			$join->orOn(function($query) {
				$query->on('invited_by', '=', 'users.id');
				$query->on('invited_to', '=',DB::raw(Auth::user()->id));
			});					   
		});		
		
		if($request->has('category') && $request->get('category') != 'null' && $request->get('category') != 0)
		{
			//print_r($request->get('category')); die;
			$obj->where('users.category', $request->get('category'));
		}
		if($request->has('coinvestment') && $request->get('coinvestment') != 0)
		{
			$co_investment = explode(',',$request->get('coinvestment'));
			$obj->whereIn('users.co_investment',$co_investment);
		}
		
		if($request->has('state') && $request->get('state') != 'null' && $request->get('state') != 0)
		{
			//print_r($request->get('category')); die;
			$obj->where('users.state', $request->get('state'));
		}
		
		$obj->where('users.id', '!=', Auth::user()->id);
		$obj->where('users.user_type', '!=', 1);
		$obj->where('users.profile_status', '==', 1); // added by sandeep 
		$obj->groupBy('users.id');
		
		$obj->select('cat.cat_name','ut.user_type', 'users.sub_category', 'users.co_investment', 'exp.experience','inv_range.range', 'inv_type.investment_type', 'users.name', 'users.gender', 'rs.relation', 'city.city_name', 'state.state_name', 'rg.religion', 'mt.language as mother_tongue', 'qa.qualification', 'users.description_you_family as about_me', 'users.description_of_sales', 'users.description_of_profound_value', 'users.description_relocation_preferance', 'users.date_of_birth', 'users.user_type as user_type_id', 'description_place_business', DB::raw('TO_BASE64(users.id) as user_id'));
		
		$obj->addSelect(DB::raw('GROUP_CONCAT(lang.language) as language'), DB::raw('(CASE WHEN count(con.id) > 0 THEN 1 ELSE 0 END) as is_connected'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.email ELSE CONCAT(LEFT(users.email, 4), "xxxxxx@xxxx.com") END) as email'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.mobile ELSE CONCAT(LEFT(users.mobile, 4), "xxxxxx") END) as mobile'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.whatsup_number ELSE CONCAT(LEFT(users.whatsup_number, 4), "xxxxxx") END) as whatsup_number'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.linked_in_url ELSE "www.xxxxxx.com" END) as linked_in_url'), DB::raw('(CASE WHEN count(sl.id) > 0 THEN 1 ELSE 0 END) as is_shortlisted'), DB::raw('(CASE WHEN count(invs.id) > 0 THEN 1 ELSE 0 END) as is_invited'));

		$data = $obj->get();
		return $data;		
	}
	
	public static function getMemberProfile($authUser, $userId){ 
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
		$obj->leftjoin('shortlists as sl', function($join){
			$join->on('shortlist_to', '=', 'users.id');
			$join->on('shortlist_by', '=', DB::raw(Auth::user()->id));			
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
		return $data;
	}
	
	public static function myShortlists(){ 
		$obj = User::where(['sl.shortlist_by'=>Auth::user()->id, 'users.active'=>1, 'users.deleted_at'=>null])->groupBy(['users.id']);
		$obj->join('shortlists as sl','sl.shortlist_to','users.id');
		$obj->join('user_types as ut','ut.id','users.user_type');
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
		$obj->leftjoin('connections as con', function($join){
			$join->on('connected_to', '=', 'users.id');
			$join->on('connected_by', '=', DB::raw(Auth::user()->id));
			$join->orOn(function($query) {
				$query->on('connected_by', '=', 'users.id');
				$query->on('connected_to', '=',DB::raw(Auth::user()->id));
			});					   
		});
		$obj->leftjoin('invitations as invs', function($join){
			$join->on('invited_to', '=', 'users.id');
			$join->on('invited_by', '=', DB::raw(Auth::user()->id));
			$join->orOn(function($query) {
				$query->on('invited_by', '=', 'users.id');
				$query->on('invited_to', '=',DB::raw(Auth::user()->id));
			});					   
		});		
		
		
		$obj->groupBy('users.id');
		
		$obj->select('cat.cat_name','ut.user_type', 'users.sub_category', 'users.co_investment', 'exp.experience','inv_range.range', 'inv_type.investment_type', 'users.name', 'users.gender', 'rs.relation', 'city.city_name', 'state.state_name', 'rg.religion', 'mt.language as mother_tongue', 'qa.qualification', 'users.description_you_family as about_me', 'users.description_of_sales', 'users.description_of_profound_value', 'users.description_relocation_preferance', 'users.date_of_birth', 'users.user_type as user_type_id', 'description_place_business', DB::raw('TO_BASE64(users.id) as user_id'), 'users.views');
		
		$obj->addSelect(DB::raw('GROUP_CONCAT(lang.language) as language'), DB::raw('(CASE WHEN count(con.id) > 0 THEN 1 ELSE 0 END) as is_connected'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.email ELSE CONCAT(LEFT(users.email, 4), "xxxxxx@xxxx.com") END) as email'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.mobile ELSE CONCAT(LEFT(users.mobile, 4), "xxxxxx") END) as mobile'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.whatsup_number ELSE CONCAT(LEFT(users.whatsup_number, 4), "xxxxxx") END) as whatsup_number'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.linked_in_url ELSE "www.xxxxxx.com" END) as linked_in_url'), DB::raw('(CASE WHEN count(sl.id) > 0 THEN 1 ELSE 0 END) as is_shortlisted'), DB::raw('(CASE WHEN count(invs.id) > 0 THEN 1 ELSE 0 END) as is_invited'));

		$data = $obj->get(); 		
		return $data;
	}
	
	public static function myInvitations($type){ 
		$obj = User::groupBy(['users.id']);
		if($type == 'sent')
		{
			$obj->where(['invs.invited_by'=>Auth::user()->id, 'users.active'=>1, 'users.deleted_at'=>null]);
			$obj->join('invitations as invs','invs.invited_to','users.id');
		}
		else
		{
			$obj->where(['invs.invited_to'=>Auth::user()->id, 'users.active'=>1, 'users.deleted_at'=>null]);
			$obj->join('invitations as invs','invs.invited_by','users.id');
		}
		
		$obj->join('user_types as ut','ut.id','users.user_type');
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
		$obj->leftjoin('connections as con', function($join){
			$join->on('connected_to', '=', 'users.id');
			$join->on('connected_by', '=', DB::raw(Auth::user()->id));
			$join->orOn(function($query) {
				$query->on('connected_by', '=', 'users.id');
				$query->on('connected_to', '=',DB::raw(Auth::user()->id));
			});					   
		});
		$obj->leftjoin('shortlists as sl', function($join){
			$join->on('shortlist_to', '=', 'users.id');
			$join->on('shortlist_by', '=', DB::raw(Auth::user()->id));			
		});
		
		
		$obj->groupBy('users.id');
		
		$obj->select('cat.cat_name','ut.user_type', 'users.sub_category', 'users.co_investment', 'exp.experience','inv_range.range', 'inv_type.investment_type', 'users.name', 'users.gender', 'rs.relation', 'city.city_name', 'state.state_name', 'rg.religion', 'mt.language as mother_tongue', 'qa.qualification', 'users.description_you_family as about_me', 'users.description_of_sales', 'users.description_of_profound_value', 'users.description_relocation_preferance', 'users.date_of_birth', 'users.user_type as user_type_id', 'description_place_business', DB::raw('TO_BASE64(users.id) as user_id'), 'users.views');
		
		$obj->addSelect(DB::raw('GROUP_CONCAT(lang.language) as language'), DB::raw('(CASE WHEN count(con.id) > 0 THEN 1 ELSE 0 END) as is_connected'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.email ELSE CONCAT(LEFT(users.email, 4), "xxxxxx@xxxx.com") END) as email'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.mobile ELSE CONCAT(LEFT(users.mobile, 4), "xxxxxx") END) as mobile'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.whatsup_number ELSE CONCAT(LEFT(users.whatsup_number, 4), "xxxxxx") END) as whatsup_number'), DB::raw('(CASE WHEN count(con.id) > 0 THEN users.linked_in_url ELSE "www.xxxxxx.com" END) as linked_in_url'), DB::raw('(CASE WHEN count(sl.id) > 0 THEN 1 ELSE 0 END) as is_shortlisted'), DB::raw('(CASE WHEN count(invs.id) > 0 THEN 1 ELSE 0 END) as is_invited'));

		$data = $obj->get(); 		
		return $data;
	}
}
