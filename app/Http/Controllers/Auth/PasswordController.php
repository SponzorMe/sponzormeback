<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use Weblee\Mandrill\Mail;
use App\Models\User;
use App\Models\PasswordResets;
class PasswordController extends Controller {

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
			PasswordResets::create([
				'email' => $request->input('email'),
				'token' => $token
			]);
			$resetLink=\Config::get('constants.reset_password_url').$token;
			$flag = $this->sendResetPasswordEmail($resetLink,$user->email,$user->name,$user->lang);
			if($flag){
				return response()->json(['message'=>"Reset password Link sent",'resetLink'=>$resetLink,'code'=>'200'],200);
			}
			else{
				return response()->json(['message'=>"Email Cannot be sent",'code'=>'201'],201);
			}
		}
	}
	/**
	 * Verify the token and update the user password
	 * @param  string  $token
	 * @param  string  $email
	 * @param  string  $password
	 * @return Response
	 */
	public function updatePassword(Request $request, $token){
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
								PasswordResets::where("email","=",$request->input("email"))->where("token","=",$token)->delete();
								return response()->json(['message'=>"Password Reseted",'code'=>'200'],200);
							}
					}
					else{
						return response()->json(['message'=>"The token does not match",'code'=>$passwordReset],200);
					}
		}
	}
	/**
	 * Send ResetPassword E-mail throught mandriall APP
	 * https://mandrillapp.com/api/docs/messages.php.html
	 * @param  string  $resetLink
	 * @param  string  $userEmail
	 * @param  string  $userName
	 * @return Response
	 */
	private function sendResetPasswordEmail($resetLink,$userEmail,$userName,$lang="en"){
		try{
			if($lang=="en")
		    	$template_name = 'reset-english';
		    if($lang=="es")
		    	$template_name = 'reset-spanish';
		    if($lang=="pt")
		    	$template_name = 'reset-portuguese';
		    $template_content = array(
		        array(
		            'name' => 'activationLink',
		            'content' => 'sebas.com'
		        )
		    );
		    $message = array(
		        'to' => array(
		            array(
		                'email' =>	$userEmail,
		                'name' 	=> 	$userName,
		                'type' 	=> 'to'
		            )
		        ),
		        'global_merge_vars' => array(
		            array(
		                'name' => 'resetLink',
		            	'content' => $resetLink
		            ),
		            array(
		                'name' => 'name',
		            	'content' => $userName
		            )
		        ),
		    );
	    	$result = \MandrillMail::messages()->sendTemplate($template_name, $template_content, $message);
			if($result[0]["status"]=="sent" AND !$result[0]["reject_reason"]){
				return true;
			}
			else{
				return false;
			}
		}
		catch(Exeption $e){
			return false;
		}
	}



}
