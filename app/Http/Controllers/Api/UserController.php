<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Notifications\SignupActivate; 
use Carbon\Carbon;


class UserController extends Controller
{


    public $successStatus = 200;


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
			$token->expires_at = Carbon::now()->addWeeks(1);
		$token->save();
		return response()->json([
			'success' => $token,
			'access_token' => $tokenResult->accessToken,
			'token_type' => 'Bearer',
			'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
		],$this->successStatus);
	
    }
	
	public function signupActivate($token){
		$user = User::where('activation_token', $token)->first();
		if (!$user) {
			return response()->json([
				'message' => 'This activation token is invalid.'
			], 404);
		}
		$user->active = true;
		$user->activation_token = '';
		$user->save();
		return $user;
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
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['activation_token'] = str_random(60);
        $input['user_type'] = 1;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
		
		$user->notify(new SignupActivate($user));

        return response()->json(['success'=>$success], $this->successStatus);
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