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

	protected $registerForm;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct( 
		RegisterForm $registerForm)
	{
		$this->registerForm = $registerForm;
	}
	/**
	 * Display the API Help
	 * Url: public/api/v1
	 * @return Response
	 */
	public function index()
	{
      return View::make('api/description');
	}
	/**
	 * Check if the key is valid.
	 * Url: public/api/v1/check/{key}
	 * @return Response
	 */
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
	/**
	 * Do the explicit login
	 * Url: api/v1/authentication
	 * @param post[email], post[password]
	 * @return Response
	 */
	public function Authentication()
	{
		$credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password')
		    );
		try
		{
		    // Login credentials
		    

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
	/**
	 * Check if a given key is valid
	 * @return Response
	 */
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
	/**
	 * Get all users
	 * Url: api/v1/users/{key}
	 * @return Response
	 */
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
	/**
	 * Get a user
	 * Url: api/v1/user/{key}/{userid}
	 * @return Response
	 */
	public function getUserData($key)
	{
		$userId=Input::get('userId');
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
	/**
	 * Remove a user with the userId
	 * Url: api/v1/remove/user/{key}/{userId}
	 * @return Response
	 */
	public function removeUser($key)
	{
		$userId=Input::get('userId');
		if($this->key_valid($key))
		{
			$user = UserCustomization::find($userId);
			if(isset($user->email))
			{
				try
				{
					@$user->delete();
					return Response::json(array("success" => true,
					"status"=>"Authenticated",
					"error" =>False,
					"message"=> "User Removed"));
				}
				catch(Exception $e)
				{
					return Response::json(array("success" => true,
					"status"=>"Authenticated",
					"error" =>true,
					"message"=> $e->getMessage()));
				}
				
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
	/**
	 * create New User
	 * Url: api/v1/create/user
	 * @param post[email], post[password], post[confirm_password]
	 * @return Response
	 */
	public function createUser()
	{
		 $result = $this->registerForm->save( Input::all() );
           
        if( $result['success'] )
        {
        	
        	Event::fire('user.signup', array(
            	'email' => $result['mailData']['email'], 
            	'userId' => $result['mailData']['userId'], 
                'activationCode' => $result['mailData']['activationCode']
            ));
            return Response::json(array("success" => true, "error"=> false, "message"=>$result));
        }
        else
        {
        	return Response::json(array("success" => true, "error"=> true, "message"=>$result));
        }
	}
	/**
	 * Edit User
	 * Url: api/v1/edit/user
	 * @param post[age], post[sex], post[country], post[state], post[city], post[email], post[name]
	 * @return Response
	 */
	public function editUser($key)
	{
		$userId=Input::get('userId');
		if($this->key_valid($key))
		{			
			try{
				// store
				$user = UserCustomization::find($userId);
				$age=Input::get('age');
				$sex=Input::get('sex');
				$country=Input::get('country');
				$state=Input::get('state');
				$city=Input::get('city');
				$email=Input::get('email');
				$name=Input::get('name');
				if (!empty($age))
					$user->age = $age;

				if (!empty($sex))
					$user->sex = $sex;

				if (!empty($country))
					$user->country = $country;

				if (!empty($state))
					$user->state = $state;

				if (!empty($city))
					$user->city = $city;

				if (!empty($email))
					$user->email = $email;

				if (!empty($name))
					$user->name = $name;
				$user->save();

				return Response::json(array('success' => true,'error'=>false,'message'=>"User Updated Succesfuly","data"=>$user));
			}
			catch (Exception $e)
			{
				return Response::json(array('success' => true,'error'=>false,'message'=>$e->getMessage()));
			}				
		}
		else
		{
			return Response::json(array("success" => true,"status"=>"Not Authenticated"));
		}
	}

	public function getSponzors()
	{
			$user = UserCustomization::get();
			return Response::json(array("success" => true,"status"=>"Authenticated","User"=>$user->toArray()));
	}

	public function getEvents()
	{
		$events = Events::get();
		return Response::json(array("success" => true,"status"=>"Authenticated","Events"=>$events->toArray()));
	}
}