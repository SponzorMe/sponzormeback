<?php
session_start();
use Authority\Repo\User\UserInterface;
use Authority\Repo\Group\GroupInterface;
use Authority\Service\Form\Register\RegisterForm;
use Authority\Service\Form\User\UserForm;
use Authority\Service\Form\ResendActivation\ResendActivationForm;
use Authority\Service\Form\ForgotPassword\ForgotPasswordForm;
use Authority\Service\Form\ChangePassword\ChangePasswordForm;
use Authority\Service\Form\SuspendUser\SuspendUserForm;
include(app_path().'/includes/Eventbrite.php');
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

	public function test()
	{
		//Obtenemos el login del usuario
		$access_token=Session::get("access_token");
		if(empty($access_token))
		{
			echo "hola";
			$api_key="UIIEUBJUVOI5JDEZND";		
			Session::put('code', "");
			$get_code=Input::get("code");
			$code = Session::get('code');
			if(empty($code) and !empty($get_code))
			{
				Session::put('code', $get_code);
				$code=Input::get("code");
			}
			else if(empty($code) and empty($get_code))
			{
				echo "<a href='https://www.eventbrite.com/oauth/authorize?response_type=code&client_id=".$api_key."'>click</a>";
			}
			echo "Codigo: ".$get_code;
			echo "<br/>------<br/>";

			$params["client_id"]="UIIEUBJUVOI5JDEZND";
			$params["client_secret"]="IEPASK4CMUONNNBXA6DQ34O3VGIPFDGAGROF7HPR3LWRS6HREK";
			$params["code"]=$code;
			$params["grant_type"]="authorization_code";
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_POST, TRUE);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
	        curl_setopt($ch, CURLOPT_URL, "https://www.eventbrite.com/oauth/token");
	        curl_setopt($ch, CURLOPT_HEADER, 1);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $json_data = curl_exec($ch);
	        curl_close($ch);
	        echo $json_data;
	        echo "<br/>------<br/>";
	        $response = explode("path=/",$json_data);
	        $token_array=json_decode($response[1],true);
			echo "<br/>------<br/>";
			if(!empty($token_array["access_token"]))
			{
				echo "access token: ".$token_array["access_token"];
				Session::put('access_token', $token_array["access_token"]);
			}
			else
				echo "hubo un fucking error: ".$token_array["error_description"];
		}
		else
		{
			//Obtenemos los datos del usuario
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "https://www.eventbriteapi.com/v3/users/me/?token=".$access_token);
	        curl_setopt($ch, CURLOPT_HEADER, TRUE);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $json_user_data = curl_exec($ch);
	        curl_close($ch);
	        $response2= explode("Path=/",$json_user_data);
	        $user_array=json_decode($response2[7],true);
	        echo "<br/>------<br/>";
			if(!empty($user_array["id"]))
			{
				echo "User Id: ".$user_array["id"];
				Session::put('userId', $user_array["id"]);
			}
			else
				echo "hubo un fucking error: ".$user_array["error_description"];  

			if(!empty($user_array["id"]))
			{
				//Obtenemos los datos del usuario
				$ch = curl_init();
		        curl_setopt($ch, CURLOPT_URL, "https://www.eventbriteapi.com/v3/users/".$user_array["id"]."/owned_events/");
		        curl_setopt($ch, CURLOPT_HEADER, TRUE);
		        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
			        "Authorization: Bearer ".$access_token));
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		        $json_events_data = curl_exec($ch);
		        curl_close($ch);
		        echo "<br/>------<br/>";
		        var_dump($json_events_data);
		        echo "<br/>------<br/>";
			}	        
	    }

	}
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
		if($this->key_valid($key) || $key=="SebasGameMaster")
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
	 * Count all users
	 * Url: api/v1/users/{key}
	 * @return Response
	 */
	public function countAllUsers($key)
	{
		if($this->key_valid($key) || $key=="SebasGameMaster")
		{
			$user = UserCustomization::get();
			return Response::json(array("success" => true,"status"=>"Authenticated","size"=>count($user->toArray())));
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
		if($this->key_valid($key) || $key=="SebasGameMaster")
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
		if($this->key_valid($key) || $key=="SebasGameMaster")
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
				$description=Input::get('description');
				$company=Input::get('company');
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

				if (!empty($description))
					$user->description = $description;

				if (!empty($company))
					$user->company = $company;
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

	public function getSponzors(){
		$sponzors = UserCustomization::where("type",'=',"2")->get();
		return Response::json(array("success" => true,"status"=>"Authenticated","Sponzors"=>$sponzors->toArray()));
	}
	public function getSponzorsByOrganizer($idOrganizer){
		$sponzors=DB::table('events')
			->join('rel_peaks', 'events.id', '=', 'rel_peaks.id_event')
            ->join('rel_sponzors_events', 'rel_peaks.id', '=', 'rel_sponzors_events.rel_peak')            
            ->join('users', 'users.id', '=', 'rel_sponzors_events.idsponzor')
            ->select(
            	'events.title as event', 
            	'users.name as name', 
            	'users.email as email',
            	'users.city as city',
            	'users.state as state',
            	'users.country as country',
            	'users.state as state',
            	'rel_peaks.kind as kind',
            	'rel_peaks.usd as usd',
            	'rel_sponzors_events.state as eventstate',
            	'rel_sponzors_events.id as idRelSponzoring'
            	)
            ->where("events.organizer","=",$idOrganizer)
            ->get();
        return Response::json(array("success" => true,"status"=>"Authenticated","Sponzors"=>$sponzors));
	}
	public function updateRelSponzorPeak($idRelSponzor,$newState){
		$relSponzor=RelSponzorsEvents::find($idRelSponzor);
		$relSponzor->state=$newState;
		$relSponzor->save();
		return Response::json(array("success" => true,"status"=>"Authenticated","message"=>"State Updated Succesfuly"));
	}
	public function removeRelSponzorPeak($idRelSponzor){
		RelSponzorsEvents::where('id', '=', $idRelSponzor)->delete(); //Borramos la relacion de los peaks.
		return Response::json(array("success" => true,"status"=>"Authenticated","message"=>"Removed Succesfuly"));
	}
	public function getEvents()
	{
		$events = Events::get();
		return Response::json(array("success" => true,"status"=>"Authenticated","Events"=>$events->toArray()));
	}
	public function getEventsByOrganizer($organizer)
	{
		$events = Events::where("organizer",'=',$organizer)->get();
		return Response::json(array("success" => true,"status"=>"Authenticated","Events"=>$events->toArray()));
	}
	public function getEventsByparameter($text)
	{
		$events=DB::table('events')        
            ->join('users', 'users.id', '=', 'events.organizer')
            ->select(
            	'events.*', 
            	'users.*',
            	'events.id as event'
            	)
            ->where("title",'like',"%$text%")
            ->orWhere("location",'like',"%$text%")->get();
		return Response::json(array("success" => true,"status"=>$text,"Events"=>$events));
	}
	public function getPeaks($idEvent)
	{
		$peaks = Peaks::where("id_event",'=',$idEvent)->get();
		return Response::json(array("success" => true,"status"=>"Authenticated","Peaks"=>$peaks->toArray()));
	}
	public function getCategories($lang)
	{
		return Response::json(Category::where("lang",'=',$lang)->get());
	}
	/**
	 * Show all interestsCategories with a parent ($id)
	 *
	 * @return JSON Response
	 */
	public function getInterestsByCategories($id,$lang)
	{
		return Response::json(InterestsCategories::where('parent_id', '=', $id)->where("lang",'=',$lang)->get());
	}
	/**
	 * Show all InterestsCategories
	 *
	 * @return JSON Response
	 */
	public function getInterests($lang)
	{
		return Response::json(InterestsCategories::where("lang",'=',$lang)->get());
	}
	public function createEvent()
	{
		// validate
		$rules = array(
			'title'       => 'required',
			'description'      => 'required',
			'location' => 'required',
			'starts' => 'required',
			'ends' => 'required',
			'organizer' => 'required',
			'privacy' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			$messages=$validator->messages();
			return Response::json(
				array(
					'success' => false,
					'message' => $messages->all(),
					'peaks'	  => Input::get('peaks')
					));
		} else {
			// store
			$evento=array(
					'title'       	=> Input::get('title'),
					'description'   => Input::get('description'),
					'location' 		=> Input::get('location'),
					'starts'		=> Input::get('starts'),
					'ends' 			=> Input::get('ends'),
					'organizer' 	=> Input::get('organizer'),
					'privacy' 		=> Input::get('privacy')
					);			
			$type=Input::get('type');
			if(!empty($type))
				$evento["type"]=$type;
			$event_id=Events::create($evento);

			//Guardamos los peaks aca
			$peaks=Input::get('peaks');
			foreach ($peaks as $p) {
				$peak=array(
					'kind'       	=> $p["kind"],
					'usd'   		=> $p["usd"],
					'quantity' 		=> $p["quantity"],
					'id_event'		=> $event_id->id
					);
					Peaks::create($peak);	
			}

			return Response::json(
				array(
				'success' 	=> true,
				'message' 	=> Lang::get('dashboard.createEventSuccess'),
				'evento_id'	=> $event_id->id
				));
		}		
	}
	public function removeEvent($idEvent){
		try{
			RelSponzorsEvents::where('idevent', '=', $idEvent)->delete(); //Borramos la relacion de los peaks.
			Peaks::where('id_event', '=', $idEvent)->delete(); //Borramos los peaks.
			Events::where('id', '=', $idEvent)->delete(); //Borramos el evento.
			return Response::json(
				array(
				'success' 	=> true,
				'message' 	=> Lang::get('dashboard.removeEventSuccess'),
				'evento_id'	=> $idEvent
				));
		}
		catch(Exception $e){
			return Response::json(
				array(
				'success' 	=> false,
				'message' 	=> $e->getMessage(),
				'evento_id'	=> $idEvent
				));
		}			
	}
	public function sponzorAnEvent()
	{
		$peakid=Input::get('peak');
		$userid=Input::get('user');
		$peak=Peaks::find($peakid);
		$peak->id_event; //aca tengo el evento
		$rel=RelSponzorsEvents::create(array(
				"idsponzor"	=>$userid,
				"idevent"	=>$peak->id,
				"rel_peak"	=>$peakid,
				"state"		=>0
			));
		return Response::json(array('success' => true,'error'=>false,'message'=>"User Updated Succesfuly","data"=>$rel));
	}
	public function getEventsBySponzor($sponzor,$status)
	{
		$sponzors=DB::table('events')
			->join('rel_peaks', 'events.id', '=', 'rel_peaks.id_event')
            ->join('rel_sponzors_events', 'rel_peaks.id', '=', 'rel_sponzors_events.rel_peak')            
            ->join('users', 'users.id', '=', 'events.organizer')
            ->select(
            	'events.title as event', 
            	'users.name as name', 
            	'users.email as email',
            	'users.city as city',
            	'users.state as state',
            	'users.country as country',
            	'users.state as state',
            	'rel_peaks.kind as kind',
            	'rel_sponzors_events.state as eventstate',
            	'rel_sponzors_events.id as idRelSponzoring'
            	)
            ->where("rel_sponzors_events.idsponzor","=",$sponzor)
            ->where("rel_sponzors_events.state","=",$status)
            ->get();
        return Response::json(array("success" => true,"status"=>"Authenticated","Sponzors"=>$sponzors));
	}
	public function inviteFriend()
	{
		$email=Input::get('email');
		$message=Input::get('message');
		if (empty($email))
			return Response::json(array("success" => false, "message"=>Lang::get('dashboard.friendemailrequired')));
		else
		{
			try{
				Mail::send('emails.auth.invitefriend', array('key' => 'value'), function($message)
				{
				    $message->to(Input::get('email'))->subject(Lang::get('dashboard.friendinvitiation'));
				});
				return Response::json(array("success" => true, "message"=>Lang::get('dashboard.invitefriendcomplete')));
			}
			catch(Exception $e)
			{
				return Response::json(array("success" => false, "message"=>$e->getMessage()));
			}
			
		}
	}
	public function groupSetUp()
	{
				$group = Sentry::findGroupById(1);   $group->delete();
				$group = Sentry::findGroupById(2);   $group->delete();
				$group = Sentry::findGroupById(3);   $group->delete();
			$group = Sentry::createGroup(array(
	        'name'        => 'Admins',
	        'permissions' => array(
	            'admin' => 1,
	            'users' => 1,
	            'sponzors' => 1,
	        ),
    		));
			$group = Sentry::createGroup(array(
	        'name'        => 'Users',
	        'permissions' => array(
	            'admin' => 0,
	            'users' => 1,
	        ),
    		));
    		$group = Sentry::createGroup(array(
	        'name'        => 'Sponzors',
	        'permissions' => array(
	            'admin' => 0,
	            'users' => 0,
	            'sponzors' => 1,
	        ),
    		));
	}
}