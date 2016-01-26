<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use App\Services\Notification;
use App\Models\User;
use App\Models\PasswordResets;
class PasswordController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['changePassword']]);
	}

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for provide a way to
	| 1. Get an user by e-mail.
	| 2. Send a reset link with a token
	| 3. Validate a reset token and if true go to step 4
	| 4. Change the password by user with the given token
	|
	*/

	public function sendResetPasswordToken(Request $request){
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255|exists:users,email',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"User Not Found",'error'=>$validation->messages()],400);
		}
		else
		{
			$user=User::where("email","=",$request->input("email"))->first();//If the user exist, we get the user
			$token = md5($request->input("email").str_random(30));
      PasswordResets::where("email","=",$request->input("email"))->delete();
			PasswordResets::create([
				'email' => $request->input('email'),
				'token' => $token,
				'created_at'=> time()
			]);
			$resetLink=\Config::get('constants.reset_password_url').$token;
			//----------------- --- NOTIFICATION EMAIL------------------------------//
			$notification = new Notification();
			$vars = array(
				array(
						'name' => 'resetLink',
					'content' => $resetLink
				),
				array(
						'name' => 'name',
					'content' => $user->name
				)
			);
			$to = ['name'=>$user->name, 'email'=>$user->email];
			$notification->sendEmail('reset', $user->lang, $to, $vars);
			//----------------------------------------------------------------------//
			return response()->json(['message'=>"Reset password Link sent",'resetLink'=>$resetLink,'code'=>'200'],200);
		}
	}
	/**
	 * Verify the token and update the user password
	 * @param  string  $token
	 * @param  string  $email
	 * @param  string  $password
	 * @return Response
	 */
	public function updatePassword($token, Request $request){
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255|exists:users',
			'password' 	=> 'required|confirmed|min:6'
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not changed",'error'=>$validation->messages()],400);
		}
		else
		{
			$passwordReset=PasswordResets::where("email","=",$request->input("email"))->orderBy('created_at', 'desc')->first();
			if($passwordReset->token==$token){
					$user=User::where("email","=",$request->input("email"))->first();
					if(!$user){//If the user does not exist.
						return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
					}
					else{
						$user->password=bcrypt($request->input("password"));
						$user->save();
						//----------------- --- NOTIFICATION EMAIL------------------------------//
						$notification = new Notification();
						$vars = array(
							array(
									'name' => 'name',
									'content' => $user->name
							)
						);
						$to = ['name'=>$user->name, 'email'=>$user->email];
						$notification->sendEmail('changedpassw', $user->lang, $to, $vars);
						//----------------------------------------------------------------------//
						return response()->json(['message'=>"Password Reseted",'code'=>'200'],200);
					}
			}
			else{
				return response()->json(['message'=>"The token does not match",'code'=>$passwordReset],400);
			}
		}
	}
	/**
	 * Change the user password
	 * @param  string  $email
	 * @param  string  $password
	 * @return Response
	 */
	public function changePassword(Request $request){
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255|exists:users',
			'password' 	=> 'required|confirmed|min:6'
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not changed",'error'=>$validation->messages()],400);
		}
		else
		{
				$user=User::where("email","=",$request->input("email"))->first();
				if(!$user){//If the user does not exist.
					return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
				}
				else{
					$user->password=bcrypt($request->input("password"));
					$user->save();
					//----------------- --- NOTIFICATION EMAIL------------------------------//
					$notification = new Notification();
					$vars = array(
						array(
								'name' => 'name',
								'content' => $user->name
						)
					);
					$to = ['name'=>$user->name, 'email'=>$user->email];
					$notification->sendEmail('changedpassw', $user->lang, $to, $vars);
					//----------------------------------------------------------------------//
					return response()->json(['message'=>"Password Changed",'code'=>'200'],200);
				}
		}
	}
}
