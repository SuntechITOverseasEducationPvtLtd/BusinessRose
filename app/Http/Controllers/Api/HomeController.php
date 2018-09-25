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
use App\Notifications\ViewsSettings;
use App\Notifications\ShortlistSettings;
use App\Notifications\InvitationSettings;
use App\Notifications\ConnectNow;
use App\EmailTemplate;
use Config;

class HomeController extends Controller
{
	public $successStatus = 200;
	
    /**
     * Filters api
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(){ 
        $data['categories'] = Category::pluck('cat_name','id');
		$data['sub_categories'] = SubCategory::pluck('sub_cat_name','id');
		$data['states'] = State::where('country_id',101)->pluck('state_name','id');
		$data['qualifications'] = Qualification::pluck('qualification','id');
		$data['experiences'] = Experience::pluck('experience','id');
		$data['religions'] = Religion::pluck('religion','id');
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
		$connectionObj->connected_by = Auth::user()->id;
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
		$shortlistObj->shortlist_by = Auth::user()->id;
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
		$invitationObj->invited_by = Auth::user()->id;
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
		$user = Auth::user();
		$user->deleted_at =  $date;	
		$data = $user->save();	
		//profile deleted email and send
		//$data = User::where('id','=',Auth::user()->id)->update(['deleted_at' => $date]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function hideProfile(Request $request){	
		$user = Auth::user();
		$user->profile_status = $request->is_email_verified;	
		$data = $user->save();
		//profile hidden email template and send			
		//$data = User::where('id','=',Auth::user()->id)->update(['profile_status' => 1]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function user_views_settings(Request $request){	 
		$user = Auth::user();
		$user->views_alert = $request->views_alert;	
		$data = $user->save();
		$email_template = EmailTemplate::where('id',Config::get('constants.VIEW_SETTINGS'))->first();
		//$email_template->flag = $request->views_alert;
		$user->notify(new ViewsSettings($email_template));
		//user view settings email template and send			
		//$data = User::where('id','=',Auth::user()->id)->update(['profile_status' => 1]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function shortlist_settings(Request $request){	 
		$user = Auth::user();
		$user->shortlist_alert = $request->shortlist_alert;	
		$data = $user->save();
		$email_template = EmailTemplate::where('id',Config::get('constants.SHORTLIST_SETTINGS'))->first();
		//$email_template->flag = $request->shortlist_alert;
		$user->notify(new ShortlistSettings($email_template));
		//user shortlist settings email template and send			
		//$data = User::where('id','=',Auth::user()->id)->update(['profile_status' => 1]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function invitation_to_connect_settings(Request $request){	 
		$user = Auth::user();
		$user->invitations_alert = $request->invitations_alert;	
		$data = $user->save();
		$email_template = EmailTemplate::where('id',Config::get('constants.INVITAION_SETTINGS'))->first();
		//$email_template->flag = $request->invitations_alert;
		$user->notify(new InvitationSettings($email_template));
		//user shortlist settings email template and send			
		//$data = User::where('id','=',Auth::user()->id)->update(['profile_status' => 1]); 
		return response()->json(['success'=>true,'data'=>$data], $this->successStatus);
	}

	public function getStateList(Request $request)
    { 
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("state_name","id");
        return response()->json(['success'=>true,'data'=>$states], $this->successStatus);
    }

    public function getCityList(Request $request)
    { 
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("city_name","id");
        return response()->json(['success'=>true,'data'=>$cities], $this->successStatus);
    }

    public function connectNow(Request $request){	 

    	$user = Auth::user();
    	$connectionObj = new Connection();
		//$connectionObj->connected_to = base64_decode($request->get('connected_to'));
		$connectionObj->connected_to = $request->get('connected_to');
		$connectionObj->connected_by = Auth::user()->id;
		$connectionObj->ip_address = $request->get('ip_address');
		$connectionObj->created_at = date('Y-m-d H:i:s');
		$connectionObj->updated_at = date('Y-m-d H:i:s');
		$connectionObj->save();
		

		
		/*$connections = Connection::where(['connections.id' => $connectionObj->id]);
		$connections->leftjoin('users as usr','usr.id','connections.connected_by');
		$connections->leftjoin('users as user','user.id','connections.connected_to');
		$connections->leftjoin('user_types as ut','ut.id','user.user_type');		
		$connections->leftjoin('categories as cat','cat.id','user.category');
		$connections->leftjoin('qualifications as q','q.id','user.qualification');
		$connections->leftjoin('experiences as exp','exp.id','user.experience');
		$connections->leftjoin('occupations as ocp','ocp.id','user.occupation');
		$connections->select('connections.*','usr.name as connect_by','user.name as connect_to','ut.user_type as usr_type','cat.cat_name as usr_category','q.qualification as usr_qualification','exp.experience as usr_experience','ocp.occupation as usr_occupation');
		$connections->get();*/

	$email_template = EmailTemplate::where('id',Config::get('constants.CONNECT_NOW'))->first();

	$connections = DB::table("connections")
						->leftjoin('users as usr','usr.id','connections.connected_by')
		 				->leftjoin('users as user','user.id','connections.connected_to')
		                ->leftjoin('user_types as ut','ut.id','user.user_type')
						->leftjoin('categories as cat','cat.id','user.category')
						->leftjoin('qualifications as q','q.id','user.qualification')
						->leftjoin('experiences as exp','exp.id','user.experience')
						->leftjoin('occupations as ocp','ocp.id','user.occupation')
						->select('connections.*','usr.name as connect_by','user.name as connect_to','ut.user_type as usr_type','cat.cat_name as usr_category','q.qualification as usr_qualification','exp.experience as usr_experience','ocp.occupation as usr_occupation')
						->where(['connections.id' => $connectionObj->id])
						->first();

		$email_template->connect_by = $connections->connect_by;
		$email_template->connect_to = $connections->connect_to;
		$email_template->usr_type = $connections->usr_type;
		$email_template->usr_category = $connections->usr_category;
		$email_template->usr_qualification = $connections->usr_qualification;
		$email_template->usr_experience = $connections->usr_experience;
		$email_template->usr_occupation = $connections->usr_occupation;

		
		$body = $email_template->mail_body;
		$image_url = public_path('/images/users/'.$user->id.'/'.$user->profile_pic);
		$email_template->image = '<img src="'.$image_url.'" alt="user_image" width="160" height="160">';
		
		$body = str_replace("{!! image !!}", $email_template->image, $body);
        $body = str_replace("{!! connect_by !!}", $email_template->connect_by, $body);
        $body = str_replace("{!! connect_to !!}", $email_template->connect_to, $body);
        $body = str_replace("{!! usr_type !!}", $email_template->usr_type, $body);
        $body = str_replace("{!! usr_category !!}", $email_template->usr_category, $body);
        $body = str_replace("{!! usr_qualification !!}", $email_template->usr_qualification, $body);
        $body = str_replace("{!! usr_experience !!}", $email_template->usr_experience, $body);
        $body = str_replace("{!! usr_occupation !!}", $email_template->usr_occupation, $body);
		
		$email_template->body = $body;

		$user->notify(new ConnectNow($email_template));
		return response()->json(['success'=>true,'data'=>'Connection Created Successfully'], $this->successStatus);
	}
	
	public function shortlistNow(Request $request){	 

    	$shortlistObj = new Shortlist();
		//$connectionObj->connected_to = base64_decode($request->get('connected_to'));
		$shortlistObj->shortlist_to = $request->get('shortlist_to');
		$shortlistObj->shortlist_by = Auth::user()->id;
		$shortlistObj->ip_address = $request->get('ip_address');
		$shortlistObj->created_at = date('Y-m-d H:i:s');
		$shortlistObj->updated_at = date('Y-m-d H:i:s');
		$shortlistObj->save();
		return response()->json(['success'=>true,'data'=>'User Shortlisted Successfully'], $this->successStatus);
	}

	public function inviteNow(Request $request){	 

    	$invitationObj = new Invitation();
		//$connectionObj->connected_to = base64_decode($request->get('connected_to'));
		$invitationObj->invitation_to = $request->get('invitation_to');
		$invitationObj->invitation_by = Auth::user()->id;
		$invitationObj->ip_address = $request->get('ip_address');
		$invitationObj->created_at = date('Y-m-d H:i:s');
		$invitationObj->updated_at = date('Y-m-d H:i:s');
		$invitationObj->save();
		return response()->json(['success'=>true,'data'=>'User Invitated Successfully'], $this->successStatus);
	}



}
