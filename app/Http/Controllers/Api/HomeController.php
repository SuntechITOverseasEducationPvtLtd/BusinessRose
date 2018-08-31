<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Qualification;
use App\Experience;
use App\User;
use App\Transaction;
use App\Subscription;
use App\Connection;
use App\Shortlist;
use App\Invitation;
use App\State;
use App\InvestmentRange;
use App\Religion;
use App\Language;
use App\RelationshipStatus;
use Input;
use DB;
use Auth;

class HomeController extends Controller
{
	public $successStatus = 200;
	
    /**
     * Filters api
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(){ 
        $data['categories'] = Category::limit(10)->pluck('cat_name','id');
		$data['sub_categories'] = SubCategory::pluck('sub_cat_name','id');
		$data['states'] = State::where('country_id',101)->limit(10)->pluck('state_name','id');
		$data['qualifications'] = Qualification::limit(10)->pluck('qualification','id');
		$data['experiences'] = Experience::limit(10)->pluck('experience','id');
		$data['religions'] = Religion::limit(10)->pluck('religion','id');
		$data['investmentRange'] = InvestmentRange::pluck('range','id');
		$data['motherTounges'] = Language::pluck('language','id');
		$data['relationshipStatuses'] = RelationshipStatus::pluck('relation','id');
		
		/*$data['investment_types '] = InvestmentType::pluck('cat_name','id');
		$data['investment_range '] = InvestmentRange::pluck('cat_name','id');
		$data['occupations '] = Occupation::pluck('cat_name','id');
		$data['subscriptions '] = Subscription::pluck('cat_name','id');*/
		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
    }
	
	/**
     * Total Users List(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function getAllMembers(Request $request){
		$data = User::getAllMembers($request); 		
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
		
		//$is_connected = Connection::checkConnection($authUser, $userId);		
		$data = User::getMemberProfile($authUser, $userId); 		
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
	
	/**
     * My Shortlists(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function myShortlists(){
		$data['shortlists'] = User::myShortlists(); 
		$data['inv_received'] = Invitation::where('invited_to',Auth::user()->id)->count();		
		$data['inv_sent'] = Invitation::where('invited_by',Auth::user()->id)->count();		
		$data['shortlists_count'] = Shortlist::where('shortlist_by',Auth::user()->id)->count();		
		$data['views'] = Auth::user()->views;		
		$data['avail_credits'] = Auth::user()->credits - Auth::user()->credits_used;		
		$data['used_credits'] = Auth::user()->credits_used;		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}
	
	/**
     * My Invitations(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function myInvitations($type){
		$data['invitations'] = User::myInvitations($type); 
		$data['inv_received'] = Invitation::where('invited_to',Auth::user()->id)->count();		
		$data['inv_sent'] = Invitation::where('invited_by',Auth::user()->id)->count();		
		$data['shortlists_count'] = Shortlist::where('shortlist_by',Auth::user()->id)->count();		
		$data['views'] = Auth::user()->views;		
		$data['avail_credits'] = Auth::user()->credits - Auth::user()->credits_used;		
		$data['used_credits'] = Auth::user()->credits_used;		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	/**
     * All Transactions(Members & Investors) api
     *
     * @return \Illuminate\Http\Response
     */
	public function allTransactions(){
		$data['transactions'] = Transaction::allTransactions(); 
		$data['inv_received'] = Invitation::where('invited_to',Auth::user()->id)->count();		
		$data['inv_sent'] = Invitation::where('invited_by',Auth::user()->id)->count();		
		$data['shortlists_count'] = Shortlist::where('shortlist_by',Auth::user()->id)->count();		
		$data['views'] = Auth::user()->views;		
		$data['avail_credits'] = Auth::user()->credits - Auth::user()->credits_used;		
		$data['used_credits'] = Auth::user()->credits_used;		
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function accountSettings(){
			
		$data['views_alert'] = Auth::user()->views_alert;			
		$data['shortlist_alert'] = Auth::user()->shortlist_alert;		
		$data['invitations_alert'] = Auth::user()->invitations_alert;		
		$data['profile_status'] = Auth::user()->profile_status;		
		$data['inv_received'] = Invitation::where('invited_to',Auth::user()->id)->count();
		$data['inv_sent'] = Invitation::where('invited_by',Auth::user()->id)->count();	
		$data['shortlists_count'] = Shortlist::where('shortlist_by',Auth::user()->id)->count();		
		$data['views'] = Auth::user()->views;		
		$data['avail_credits'] = Auth::user()->credits - Auth::user()->credits_used;
		$data['used_credits'] = Auth::user()->credits_used;	
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function allSubscriptions(){			
		$data['subscriptions'] = Subscription::get(); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function deleteProfile(){	
		$date = date('Y-m-d H:i:s');		
		$data = User::where('id','=',Auth::user()->id)->update(['deleted_at' => $date]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function hideProfile(){			
		$data = User::where('id','=',Auth::user()->id)->update(['profile_status' => 1]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}


}
