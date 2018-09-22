<?php
namespace App\Http\Controllers\Api;

 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmailTemplate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Notifications\SignupActivate;
use App\Notifications\ForgotPasswordLink;
use App\Notifications\WelcomeEmail;
use Config; 
//use Carbon\Carbon; 


class UserController extends Controller
{


    public $successStatus = 200;
    public $failureStatus = 400;


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){ 
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;
        if(!Auth::attempt($credentials))
            return response()->json(['message' => 'Unauthorized'], 401);
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            //$token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'success' => $token,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            //'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ],$this->successStatus);
    
    }
    
    public function signupActivate($token){
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = 0;
        $user->is_email_verified = 1;
        $user->activation_token = '';
        $user->save();
        $user->notify(new WelcomeEmail($user));
        //welcome email template and send
        return view('custom.welcome');
    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required|numeric',
            //'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
    

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['activation_token'] = str_random(60);
        $input['views'] = 0;
        $input['linked_in_url'] = '';        
        $input['is_accept_terms'] = 1;
        $filename = '';
        
        $user = User::create($input);

        if (isset($input['profile_pic']) && $input['profile_pic']!="") {  
            $image = $input['profile_pic'];
            $filename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users/'.$user->id.'/');
            $image->move($destinationPath, $filename);
        }

        $input['profile_pic'] = $filename;

        $user->update(['profile_pic' => $filename]);
        //print_r($user); die;
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        
        $user->notify(new SignupActivate($user));

        return response()->json(['success'=>$success], $this->successStatus);
    }
    
    function changePassword(Request $request) {
     $data = $request->all();
     $user = Auth::guard('api')->user();

     //Changing the password only if is different of null
     if( isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !=='undefined') {
         //checking the old password first
         $check  = Auth::guard('web')->attempt([
             'name' => $user->name,
             'password' => $data['oldPassword']
         ]);
         
         if($check && isset($data['newPassword']) && !empty($data['newPassword']) && $data['newPassword'] !== "" && $data['newPassword'] !=='undefined') {
             $user->password = bcrypt($data['newPassword']);
             
             //$user->token()->revoke();
             //$token = $user->createToken('newToken')->accessToken;

             //Changing the type
             $user->update();

             return response()->json(['success'=>'Password Changed Successfully'], $this->successStatus); //sending the new token
         }
         else {
             return response()->json(['failed'=>'Wrong password information'], $this->failureStatus);
         }
     }
     return response()->json(['failed'=>'Wrong password information'], $this->failureStatus);
 }

 function forgotPassword(Request $request) { 
     $data = $request->all();
     $request->validate(['email' => 'required|string|email','token' => 'required|string']);
     $user = Auth::guard('api')->user();
     $email_template = EmailTemplate::where('id',Config::get('constants.FORGOT_PASSWORD'))->first();
     $email_template->token = $request->token;
     
     $user->notify(new ForgotPasswordLink($email_template));
     return response()->json(['success'=>"Forgot Link Sent"], $this->successStatus);
 }

 function updatePassword(Request $request) { 
     $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.'
            ], 404);
        } else {
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['success'=>'Password Updated Successfully'], $this->successStatus);
        }
 }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}