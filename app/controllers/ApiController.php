<?php

use Authority\Repo\User\UserInterface;
use Authority\Repo\Group\GroupInterface;
use Authority\Service\Form\Register\RegisterForm;
use Authority\Service\Form\User\UserForm;
use Authority\Service\Form\ResendActivation\ResendActivationForm;
use Authority\Service\Form\ForgotPassword\ForgotPasswordForm;
use Authority\Service\Form\ChangePassword\ChangePasswordForm;
use Authority\Service\Form\SuspendUser\SuspendUserForm;

class ApiController extends BaseController {




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Sentry::check())
        {
        	return Response::json(array("success" => true,"status"=>"Authenticated"));
        }
        else
        {
        	return Response::json(array("success" => true,"status"=>"Not Authenticated"));
        }
	}
	public function check_authentication($key)
	{
		$user=UserCustomization::where('login_code', '=', md5($key))->get();
		if(isset($user[0]))
		{
			$today=date("Y-m-d H:i:s");
			if(($user[0]->login_valid_until>$today) && !empty($user[0]->login_valid_until))
	        {
	        	return Response::json(array("success" => true,"status"=>"Authenticated"));
	        }
	    }
	    return Response::json(array("success" => true,"status"=>"Not Authenticated"));
	}
	public function Authentication()
	{
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => 'user@user.com',
		        'password' => 'sentryuser'
		    );

		    // Authenticate the user
		    $token 		= Sentry::authenticate($credentials, false);
		    $string 	= str_random(40);
			$key 		= md5($string);
			$tomorrow 	= new DateTime();
			$tomorrow->add(new DateInterval('P1D'));
			$user = UserCustomization::find($token->id);
			$user->login_code    		= md5($key);
			$user->login_valid_until	= $tomorrow;
			$user->save();
			return Response::json(array("success" => true,"status"=>"Authenticated","key"=>$key));
		}
		catch (Exception $e)
		{
		    return Response::json(array("success" => true,"status"=>"Not Authenticated","message"=>$e->getMessage()));
		}		
	}
	private function key_valid($key)
	{
		$user=UserCustomization::where('login_code', '=', md5($key))->get();
		if(isset($user[0]))
		{
			$today=date("Y-m-d H:i:s");
			if(($user[0]->login_valid_until>$today) && !empty($user[0]->login_valid_until))
	        {
	        	return true;
	        }
	    }
	    return false;
	}
	public function getAllUsers($key)
	{
		if($this->key_valid($key))
		{
			$user = UserCustomization::get();
			return Response::json(array("success" => true,"status"=>"Authenticated","User"=>$user->toArray()));
		}
		else
		{
			return Response::json(array("success" => true,"status"=>"Not Authenticated"));
		}
	}
	public function getUserData($key,$userId)
	{
		if($this->key_valid($key))
		{
			$user = UserCustomization::where('id', '=', $userId)->get();
			return Response::json(array("success" => true,"status"=>"Authenticated","User"=>$user->toArray()));
		}
		else
		{
			return Response::json(array("success" => true,"status"=>"Not Authenticated"));
		}
	}
	public function removeUser($key,$userId)
	{
		if($this->key_valid($key))
		{
			$user = UserCustomization::find($userId);
			if(isset($user->email))
			{
				$user->delete();
				return Response::json(array("success" => true,
				"status"=>"Authenticated",
				"error" =>False,
				"message"=> "User Removed"));
			}
			else
			{	
				return Response::json(array("success" => true,
				"status"=>"Authenticated",
				"error"=>true,
				"message"=> "User Not Found"));
			}
			
		}
		else
		{
			return Response::json(array("success" => true,"status"=>"Not Authenticated"));
		}
	}
}