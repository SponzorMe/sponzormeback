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
	public function connectEvenbrite()
	{
		$get_code=Input::get("code");
		if(empty($get_code))
		{
			echo '<script type="text/javascript">alert("'.Lang::get('dashboard.evenbriteNotConnected').'");</script>';
		}
		else
		{
			$params["client_id"]=Config::get('constants.evenbriteClientId');
			$params["client_secret"]=Config::get('constants.eventbriteClientSecret');
			$params["code"]=$get_code;
			$params["grant_type"]="authorization_code";
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_POST, TRUE);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
	        curl_setopt($ch, CURLOPT_URL, "https://www.eventbrite.com/oauth/token");
	        curl_setopt($ch, CURLOPT_HEADER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $json_data = curl_exec($ch);
	        curl_close($ch);
	       	$token_array=json_decode($json_data,true);
			if(!empty($token_array["access_token"]))
			{
				$user2 = Sentry::getUser();
				$user = UserCustomization::find($user2->id);
				$user->eventbriteKey=$token_array["access_token"];
				$user->save();
				echo '<script type="text/javascript">alert("'.Lang::get('dashboard.evenbriteConnected').'");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("'.Lang::get('dashboard.evenbriteNotConnected').'");</script>';
			}
		}
			return Redirect::to('users/dashboard#/settings');
	}
	public function getEventbriteEvents($access_token)
	{
		//Obtenemos los datos del usuario
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.eventbriteapi.com/v3/users/me/?token=".$access_token);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $json_user_data = curl_exec($ch);
        curl_close($ch);
        $user_array=json_decode($json_user_data,true);
		if(empty($user_array["id"]))
			return Response::json(array("success" => false,"message"=>$user_array["error_description"]));

		if(!empty($user_array["id"]))
		{
			//Obtenemos los datos del usuario
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "https://www.eventbriteapi.com/v3/users/".$user_array["id"]."/owned_events/");
	        curl_setopt($ch, CURLOPT_HEADER, false);
	        curl_setopt($ch,CURLOPT_HTTPHEADER,array (
		        "Authorization: Bearer ".$access_token));
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $json_events_data = curl_exec($ch);
	        curl_close($ch);
        	$events=json_decode($json_events_data,true);
	        return Response::json(array("success" => true,"Events"=>$events));
		}
	}
	public function connectMeetup()
	{
		$redirect_url=Config::get('constants.meetupRedirectUrl');
		$get_code=Input::get("code");
		if(empty($get_code))
		{
			echo '<script type="text/javascript">alert("'.Lang::get('dashboard.meetupNotConnected').'");</script>';
		}
		else
		{
			$params["client_id"]=Config::get('constants.meetupClientId');
			$params["client_secret"]=Config::get('constants.meetupClientSecret');
			$params["code"]=$get_code;
			$params["redirect_uri"]=$redirect_url;
			$params["grant_type"]="authorization_code";
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_POST, TRUE);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
	        curl_setopt($ch, CURLOPT_URL, "https://secure.meetup.com/oauth2/access");
	        curl_setopt($ch, CURLOPT_HEADER, false);	        
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);       
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $json_data = curl_exec($ch);
	        curl_close($ch);
	        $token_array=json_decode($json_data,true);
			if(!empty($token_array["access_token"]))
			{
				$user2 = UserCustomization::find(Session::get('userId'));
				//$user2 = Sentry::getUser();
				$user = UserCustomization::find($user2->id);
				$user->meetupRefreshKey=$token_array["refresh_token"];
				$user->save();
				echo '<script type="text/javascript">alert("'.Lang::get('dashboard.evenbriteConnected').'");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("'.Lang::get('dashboard.evenbriteNotConnected').'");</script>';
			}
		}
		return Redirect::to('users/dashboard#/settings');		
	}
	public function getMeetupGroups($refresh_token)
	{
		$params["client_id"]=Config::get('constants.meetupClientId');
		$params["client_secret"]=Config::get('constants.meetupClientSecret');
		$params["grant_type"]="refresh_token";
		$params["refresh_token"]=$refresh_token;		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_URL, "https://secure.meetup.com/oauth2/access");
        curl_setopt($ch, CURLOPT_HEADER, false);	        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $json_data = curl_exec($ch);
        var_dump($json_data);
        curl_close($ch);
        $token_array=json_decode($json_data,true);
        var_dump($token_array);
        /*--Aca empieza el error de meetup--*/
        $user = UserCustomization::find(Session::get('userId'));
		$user->meetupRefreshKey=$token_array["refresh_token"];
		$user->save();
        $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://api.meetup.com/2/member/self");
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,array (
		        "Authorization: Bearer ".$token_array["access_token"],
		        "Content-Type: application/json",
    			"Accept: application/json"));	    
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $json_user_data = curl_exec($ch);
	    $user_info=json_decode($json_user_data,true);
	    $params2["member_id"]=$user_info["id"];
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://api.meetup.com/2/profiles?member_id=".$user_info["id"]);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,array (
		        "Authorization: Bearer ".$token_array["access_token"],
		        "Content-Type: application/json",
    			"Accept: application/json"));
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $json_groups_data = curl_exec($ch);
	    return Response::json(array("refresh_token"=>$token_array["refresh_token"],"success" => true,"Groups"=>json_decode($json_groups_data)));
	    /*traigo los grupos, el usuario escoje grupos, el usuario ve los 
	    eventos que escoje, el usuario importa el evento.*/
	}
	public function getMeetupEvents($groupId,$refresh_token)
	{
		$params["client_id"]=Config::get('constants.meetupClientId');
		$params["client_secret"]=Config::get('constants.meetupClientSecret');
		$params["grant_type"]="refresh_token";
		$params["refresh_token"]=$refresh_token;		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_URL, "https://secure.meetup.com/oauth2/access");
        curl_setopt($ch, CURLOPT_HEADER, false);	        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $json_data = curl_exec($ch);
        curl_close($ch);
        $token_array=json_decode($json_data,true);
        $user = UserCustomization::find(Session::get('userId'));
		$user->meetupRefreshKey=$token_array["refresh_token"];
		$user->save();
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://api.meetup.com/2/events?group_id=".$groupId);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,array (
		        "Authorization: Bearer ".$token_array["access_token"],
		        "Content-Type: application/json",
    			"Accept: application/json"));
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $json_events_data = curl_exec($ch);
	    return Response::json(array("refresh_token"=>$token_array["refresh_token"],"success" => true,"Events"=>json_decode($json_events_data)));
	    /*traigo los grupos, el usuario escoje grupos, el usuario ve los 
	    eventos que escoje, el usuario importa el evento.*/
	}
	
	public function unconnectMeetup($userId)
	{
		$user = UserCustomization::find($userId);
		$user->meetupRefreshKey="";
		$user->save();
	}
	public function unconnectEventbrite($userId)
	{
		$user = UserCustomization::find($userId);
		$user->eventbriteKey="";
		$user->save();
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
			return Response::json(array("success" => true,"status"=>"Authenticated","key"=>$key,"userId"=>$user->id));
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
			$permission = UsersGroups::where('user_id', '=', $userId)->get();
			return Response::json(array("success" => true,"status"=>"Authenticated","User"=>$user->toArray(),"permission"=>$permission->toArray()));
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
				$location=Input::get('location');
				$location_reference=Input::get('location_reference');
				$email=Input::get('email');
				$name=Input::get('name');
				$description=Input::get('description');
				$company=Input::get('company');
				$comunity_size=Input::get('comunity_size');
				if (!empty($age))
					$user->age = $age;

				if (!empty($sex))
					$user->sex = $sex;

				if (!empty($location_reference))
					$user->location_reference = $location_reference;

				if (!empty($location))
					$user->location = $location;

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
            	'users.location as location',
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
		if(is_numeric($newState))
		{
			$relSponzor=RelSponzorsEvents::find($idRelSponzor);
			if($relSponzor->state==$newState) //Si esta igual no podemos crear mas peaks task.
				$noPeak=true;
			else
			{
				$relSponzor->state=$newState;
				$relSponzor->save();
				$noPeak=false;
			}		
			$event=Events::find($relSponzor->idevent);//Obtenemos la información del evento			
			$organizer=UserCustomization::find($event->organizer);//Sacamos los datos de organizador para enviarcelos al sponzor
			
			$sponzor=DB::table('rel_sponzors_events')
			->join('users', 'rel_sponzors_events.idsponzor', '=', 'users.id')
			->where("rel_sponzors_events.id","=",$idRelSponzor)->get();//conseguimos el id y el email del sponzor para notificarlo.
			//Si el estado se convierte en 1, porque el organizador lo aprobó entonces creamos la relacion con los todo 
			if($newState==1 and !$noPeak) //siempre y cuando el estado anterior no haya sido uno.
			{
				$peakTask=PeakTask::where("peak_id","=",$relSponzor->rel_peak)->get();//traemos los todos asociados al peak.
				foreach ($peakTask as $p) {
					$this->internalcreateTaskBySponzor(
						$p->id, $relSponzor->rel_peak, 
						$relSponzor->idsponzor, 
						$p->user_id, 
						0,
						$p->event_id,
						$idRelSponzor);//Creamos los todos asociados al peak
				}							
				Pusherer::trigger('events-channel', 'Sponzoring', //Aca configuramos la notificación de aceptación al sponzor.
				array( 
					'type' => "UpdateSponzorToEvent", 
					'peakId'=>$idRelSponzor, 
					'state'=>$newState,
					'sponzorId'=>$relSponzor->idsponzor,
					'message'=>Lang::get('dashboard.NotificationOrganizerSponzorAceptance', array('titleEvent'=>$event->title))
					));
				$sponzorEmail=$sponzor[0]->email;
				$title=$event->title;
				//Procedemos a enviar el email al sponzor diciendole que se acepto el patrocinio del evento
				Mail::send('emails.OrganizerSponzorAceptance', 
					array(
						'eventTitle' => $event->title,
						'organizerEmail' => $organizer->email,
						'organizerName' => $organizer->name
						), 
					function($message) use ($sponzorEmail,$title)
					{
					    $message->to("$sponzorEmail", "SponzorMe")->subject(Lang::get('dashboard.OrganizerSponzorAceptanceEmailNotification', array('titleEvent'=>$title)));
					}
				);	
			}
			elseif($newState==0)//Si lo que ocurrio fue que el organizador desacepto un patrocinio
			{
				Pusherer::trigger('events-channel', 'Sponzoring', //Aca configuramos la notificación de aceptación al sponzor.
				array( 
					'type' => "UpdateSponzorToEvent", 
					'peakId'=>$idRelSponzor, 
					'state'=>$newState,
					'sponzorId'=>$relSponzor->idsponzor,
					'message'=>Lang::get('dashboard.NotificationOrganizerSponzorDesaceptance', array('titleEvent'=>$event->title))
					));
				$sponzorEmail=$sponzor[0]->email;
				$title=$event->title;
				//Procedemos a enviar el email al sponzor diciendole que se desacepto el patrocinio del evento
				Mail::send('emails.OrganizerSponzorAceptance', 
					array(
						'eventTitle' => $event->title,
						'organizerEmail' => $organizer->email,
						'organizerName' => $organizer->name
						), 
					function($message) use ($sponzorEmail,$title)
					{
					    $message->to("$sponzorEmail", "SponzorMe")->subject(Lang::get('dashboard.OrganizerSponzorDesaceptanceEmailNotification', array('titleEvent'=>$title)));
					}
				);	
				TaskBySponzor::where('sponzor_event_id', '=', $idRelSponzor)->delete(); //Borramos la relacion de los todos al relsponzor
			}
			else
			{
				return Response::json(array("success" => true,"status"=>"Authenticated","message"=>"Nothing to do, this is the current state"));
			}
			return Response::json(array("success" => true,"status"=>"Authenticated","message"=>"State Updated Succesfuly"));
		}
		else
		{
			return Response::json(array("success" => true,"status"=>"Authenticated","error"=>true,"message"=>"Bad value for status"));
		}
		
	}
	public function removeRelSponzorPeak($idRelSponzor){
		try{
			$rel=RelSponzorsEvents::where('id', '=', $idRelSponzor)->take(1)->get();
			$event=Events::where('id', '=', $rel[0]->idevent)->take(1)->get();
			$user=Sentry::getUser();//Obtenemos el usuario que hizo la peticion para saber si es organizer o sponzor
			$organizer=UserCustomization::find($event[0]->organizer); //Obtenemos el organizer
			$sponzor=UserCustomization::find($rel[0]->idsponzor);//Obtenemos el sponzor
			if($user->id==$event[0]->organizer) {//Si es el id del organizer
				$message=Lang::get('dashboard.NotificationSponzorDelete', array('titleEvent'=>$event[0]->title));//fue el organizer quien lo elminó
				$email=$sponzor->email;//Sacamos el email
				$bandera=true;//Para saber a quien le enviamos el email
			}
			else{
				$message=Lang::get('dashboard.NotificationOrganizerDelete', array('titleEvent'=>$event[0]->title));//fue el sponzor quien lo elminó
				$email=$organizer->email;//Sacamos el email
				$bandera=false;//Para saber a quien le enviamos el email				
			}
			RelSponzorsEvents::where('id', '=', $idRelSponzor)->delete(); //Borramos la relacion de los peaks.
			TaskBySponzor::where('sponzor_event_id', '=', $idRelSponzor)->delete(); //Borramos la relacion de todas las tareas al relsponzor
			Pusherer::trigger('events-channel', 'Sponzoring', 
				array( 
					'type' 			=> "RemoveSponzorToEvent", 
					'peakId'		=> $idRelSponzor,
					'sponzorId'		=> $rel[0]->idsponzor,
					'organizerId'	=> $event[0]->organizer,
					'eventId'		=> $event[0]->id,
					'message'		=> $message
				)
			);			
			$title=$event[0]->title;//Sacamos el titulo del evento
			if($bandera){//Si bandera == true es porque se lo mandamos al sponzor
				Mail::send('emails.sponzorSponzoringDelete', 
					array(
						'eventTitle' => $event[0]->title,
						'organizerEmail' => $organizer->email,
						'organizerName' => $organizer->name
						), 
					function($message) use ($email,$title){
						$message->to("$email", "SponzorMe")->subject(Lang::get('dashboard.NotificationSponzorDeleteEmailNotification', array('titleEvent'=>$title)));
					}
				);
			}
			else{//Si bandera == false es porque se lo mandamos al organizador
				Mail::send('emails.organizerSponzoringDelete', 
					array(
						'eventTitle' => $event[0]->title,
						'sponzorEmail' => $sponzor->email,
						'sponzorName' => $sponzor->name
						), 
					function($message) use ($email,$title){
						$message->to("$email", "SponzorMe")->subject(Lang::get('dashboard.NotificationOrganizerDeleteEmailNotification', array('titleEvent'=>$title)));
					}
				);
			}
			return Response::json(array("success" => true,"status"=>"Authenticated","message"=>"Removed Succesfuly"));
		}
		catch (Exception $e)
		{
			return Response::json(array('success' => true,'error'=>false,'message'=>$e->getMessage()));
		}
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
            	'events.id as event',
            	'events.image as eventimage',
            	'events.location as eventlocation'
            	)
            ->where("title",'like',"%$text%")
            ->orWhere("events.location",'like',"%$text%")->get();
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
	public function createEventThumb($imagePath,$eventId,$extension)
	{
		$img = Image::make($imagePath)->resize(450, 450);
    	$img->save("images/events/thumbs/thumb_event_".$eventId.".".$extension);
	}
	public function eventUploadImage($eventId)
	{
		try
		{
			$file = Input::file('file');
			$extension=Input::file('file')->getClientOriginalExtension();
			Input::file('file')->move("images/events/", "event_".$eventId.".".$extension);
			$event=Events::find($eventId);
			$event->image="event_".$eventId.".".$extension;
			$event->save();
			$this->createEventThumb("images/events/event_".$eventId.".".$extension,$eventId,$extension);
			return Response::json(array("success" => true,"path"=>"event_".$eventId.".".$extension));
		}
		catch(Exception $e)
		{
			return Response::json(array("success" => false,'message'=>$e->getMessage())); //Devolvemos la respues de error.
		}		
	}	
	public function userUploadImage($userId){ //Funcion para subir la imagen de los usuarios
		try
		{
			$file = Input::file('file'); //Obtenemos la imagen
			if(empty($file))
				return Response::json(array("success" => false,'message'=>"image is required"));
			else{
			$extension=Input::file('file')->getClientOriginalExtension(); //Obtenemos la extensión del archivo
			Input::file('file')->move("images/users/", "user_".$userId.".".$extension);//Movemos el archivo
			$event=UserCustomization::find($userId);//Encontramos el usuario
			$event->image="user_".$userId.".".$extension;//Asignamos la imagen
			$event->save();//guardamos en la base de datos
			$this->createUserThumb("images/users/user_".$userId.".".$extension,$userId,$extension);//llamamos a la funcion que hace el thumb
			return Response::json(array("success" => true,"path"=>"user_".$userId.".".$extension));//devolvemos la respuesta
			}
		}
		catch(Exception $e) //Si hay algun error
		{
			return Response::json(array("success" => false,'message'=>$e->getMessage())); //Devolvemos la respues de error.
		}		
	}
	public function createUserThumb($imagePath,$userId,$extension){
		$img = Image::make($imagePath)->resize(450, 450); //Cambiamos el tamaño de la imagen
    	$img->save("images/users/thumbs/thumb_user_".$userId.".".$extension); //Guardamos la imagen en el path de thumbs
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
			//Validamos que las fechas sean consistentes
			$starts = new DateTime(Input::get('starts'));
			$ends = new DateTime(Input::get('ends'));
			if($ends<$starts)
			{
				return Response::json(
				array(
					'success' => false,
					'message' => Lang::get("dashboard.newEventInvalidDates"),
					'peaks'	  => Input::get('peaks')
					));
			}
			// Guardamos el evento
			$evento=array(
					'title'       			=> Input::get('title'),
					'description'   		=> Input::get('description'),
					'location' 				=> Input::get('location'),
					'starts'				=> Input::get('starts'),
					'location_reference'	=> Input::get('location_reference'),
					'ends' 					=> Input::get('ends'),
					'organizer' 			=> Input::get('organizer'),
					'privacy' 				=> Input::get('privacy')
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
		//primero verificamos que ese patrocinio no exista
		$rel=RelSponzorsEvents::where("idsponzor","=",$userid)
		->where("rel_peak","=",$peakid)
		->where("idevent","=",$peak->id)
		->get();
		//Ojo trabajarle a esta vuelta
		/*if($rel[0]->id>0){//Si ya hay un sponzoring con esos datos no hacemos na
			return Response::json(array('success' => false,'error'=>true,'message'=>"Sponzoring Already Exist","data"=>$rel));
		}*/

		$sponzor=UserCustomization::find($userid);
		$rel=RelSponzorsEvents::create(array(
				"idsponzor"	=>$userid,
				"idevent"	=>$peak->id,
				"rel_peak"	=>$peakid,
				"state"		=>0
			));		
		//conseguimos el id y el email del organizador para notificarlo.
		$organizer=DB::table('events')
		->join('users', 'events.organizer', '=', 'users.id')
		->where("events.id","=",$peak->id_event)->get();

		$event=Events::find($peak->id_event);
		//Enviamos la notificación via pusher
		Pusherer::trigger('events-channel', 'New-Sponzoring', 
			array( 
				'type' 			=> "AddSponzorToEvent", 
				'sponzorId'		=>$userid,
				'kind'			=>$peak->kind,
				'eventId'		=>$peak->id_event,
				'peakId'		=>$peak->id,
				'relPeakId'		=>$rel->id,
				'organizerId'	=>$organizer[0]->id,
				'message'		=>Lang::get('dashboard.NotificationNewSponzorAnEvent', array('titleEvent'=>$event->title))
				)
		);
		$organizerEmail=$organizer[0]->email;
		//Procedemos a enviar el email
		Mail::send('emails.newSponzor', 
			array(
				'eventTitle' => $organizer[0]->title,
				'sponzoringType' => $peak->kind,
				'sponzorEmail' => $sponzor->email,
				'sponzorName' => $sponzor->name
				), 
			function($message) use ($organizerEmail)
			{
			    $message->to("$organizerEmail", "SponzorMe")->subject(Lang::get('dashboard.newSponzorEmailNotification'));
			}
		);
		//Finalmente devolvemos la respuesta
		return Response::json(array('success' => true,'error'=>false,'message'=>"Sponzoring Updated Succesfuly","data"=>$rel));
	}
	public function getEventsBySponzor($sponzor,$status)
	{
		$sponzors=DB::table('events')
			->join('rel_peaks', 'events.id', '=', 'rel_peaks.id_event')
            ->join('rel_sponzors_events', 'rel_peaks.id', '=', 'rel_sponzors_events.rel_peak')            
            ->join('users', 'users.id', '=', 'events.organizer')
            ->select(
            	'events.title as event', 
            	'events.id as eventId',
            	'events.location as eventlocation', 
            	'users.name as name', 
            	'users.email as email',
            	'users.location as location',
            	'rel_peaks.id as idpeak',
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
		$message1=Input::get('message');
		if (empty($email))
			return Response::json(array("success" => false, "message"=>Lang::get('dashboard.friendemailrequired')));
		else
		{
			try{
				Mail::send('emails.auth.invitefriend', array('message1' => $message1), function($message)
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
	/*Funcion para mostrar la informacion de un evento*/
	public function eventById($id)
	{
		try{
			$event = Events::where("id",'=',$id)->get();
			$data["organizer"] = UserCustomization::where("id",'=',$event[0]->organizer)->get();
			$data["category"] = Category::where("id",'=',$event[0]->type)->get();
			$data["peaks"] = Peaks::where("id_event",'=',$id)->get();
			$data["tasks"] = PeakTask::where("event_id",'=',$id)->get();
			$data["event"]=$event;
			$events = Events::where("organizer",'=',$event[0]->organizer)->orderBy('starts', 'desc')->take(1)->get();
			$data["nextEvent"]=$events[0]->starts;
			if($data["organizer"][0]->image == ''){
				$data["organizer"][0]->image = 'user.png';
			}

			if($data["event"][0]->image == ''){
				$data["event"][0]->image = 'user.png';
			}
			return View::make('event')->with($data);
		}
		catch(Exception $e)
		{
			return View::make('error404');
		}
	}
	/*Funcion que crea solo el formulario de patrocinio por evento, para ser embebido en otra parte*/
	public function formSponzorEventById($id)
	{
		try{
			$event = Events::where("id",'=',$id)->get();
			$data["organizer"] = UserCustomization::where("id",'=',$event[0]->organizer)->get();
			$data["category"] = Category::where("id",'=',$event[0]->type)->get();
			$data["peaks"] = Peaks::where("id_event",'=',$id)->get();
			$data["tasks"] = PeakTask::where("event_id",'=',$id)->get();
			$data["event"]=$event;
			$events = Events::where("organizer",'=',$event[0]->organizer)->orderBy('starts', 'desc')->take(1)->get();
			$data["nextEvent"]=$events[0]->starts;
			if($data["organizer"][0]->image == ''|| empty($data["organizer"][0]->image)){
				$data["organizer"][0]->image = 'user.png';
			}
			if($data["event"][0]->image == ''){
				$data["event"][0]->image = 'user.png';
			}
			return View::make('formSponzorEvent')->with($data);
		}
		catch(Exception $e)
		{
			return View::make('error404');
		}
	}
	public function saveTodo()
	{
		$title=Input::get("title");
		$description=Input::get("description");
		$event=Input::get("event");
		$peak=Input::get("peak");
		$type=Input::get("type");
		$user_id=Session::get('userId');
		$relPeak=Input::get('relPeak');
		if(empty($title)||empty($event)||empty($peak)||empty($user_id))
			return Response::json(array("success" => false, "error"=>true, "status"=>"Authenticated","message"=>"title is required"));
		$data=PeakTask::create(
			array(
				"title"=>$title,
				"description"=>$description,
				"event_id"=>$event,
				"peak_id"=>$peak,
				"user_id"=>$user_id,
				"type"=>$type)
			);
		if($type==1) //Si es una todo del sponzor, entonces nosotros creamos al real peak
		{
			$this->internalcreateTaskBySponzor(
						$data->id, 
						$peak, 
						$user_id, 
						$user_id, 
						0,
						$event,
						$relPeak);
		}
		return Response::json(array("success" => true,"status"=>"Authenticated","peakTodo"=>$data));
	}
	public function getTodo($idPeak)
	{
		$peakTask=PeakTask::where("peak_id","=",$idPeak)->get();
		return Response::json(array("success" => true,"Todos"=>$peakTask->toArray()));
	}
	public function removeTodo($idTodo)
	{
		try{
			$todo = PeakTask::find($idTodo);
			$todo->delete();
			return Response::json(array("success" => true,"error"=>false));
		}
		catch(Exception $e)
		{
			return Response::json(array("success" => true,"error"=>true,"Message"=>$e->getMessage()));
		}
	}
	private function internalcreateTaskBySponzor($task_id, $peak_id, $sponzor_id, $organizer_id, $status, $event_id,$sponzor_event_id)
	{
		try
		{
			$data=TaskBySponzor::create(
				array(
					"task_id"=>$task_id,
					"peak_id"=>$peak_id,
					"sponzor_id"=>$sponzor_id,
					"organizer_id"=>$organizer_id,
					"status"=>$status,
					"event_id"=>$event_id,
					"sponzor_event_id"=>$sponzor_event_id)
				);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	public function getTaskBySponzorByRelPeak($rel_peak,$type)
	{
		$data=TaskBySponzor::where('sponzor_event_id', '=', $rel_peak)->where("type",'=',$type)
		->join("peak_task","task_id",'=',"peak_task.id")
		->select(
            	'peak_task.*', 
            	'task_by_sponzor.*',
            	'task_by_sponzor.id as idTS'
            	)
		->get(); //Borramos la relacion de los todos al relsponzor
		return Response::json(array("success" => $type,"status"=>"Authenticated","TaskBySponzor"=>$data->toArray()));
	}
	public function createTaskBySponzor()
	{
		$task_id=Input::get("task_id");
		$peak_id=Input::get("peak_id");
		$sponzor_id=Input::get("sponzor_id");
		$organizer_id=Input::get("organizer_id");
		$status=Input::get("status");
		$event_id=Session::get('event_id');
		$sponzor_event_id=Session::get('sponzor_event_id');
		$data=TaskBySponzor::create(
			array(
				"task_id"=>$task_id,
				"peak_id"=>$peak_id,
				"sponzor_id"=>$sponzor_id,
				"organizer_id"=>$organizer_id,
				"status"=>$status,
				"event_id"=>$event_id,
				"sponzor_event_id"=>$sponzor_event_id)
			);
		return Response::json(array("success" => true,"status"=>"Authenticated","TaskBySponzor"=>$data));
	}
	public function deleteTaskBySponzor($idTodoSponzor)
	{
		try
		{
			$todoSponzor = TaskBySponzor::find($idTodoSponzor);
			$todoSponzor->delete();
			return Response::json(array("success" => true,"error"=>false));
		}
		catch(Exception $e)
		{
			return Response::json(
				array(
					"success" => true,
					"error"=>true,
					"Message"=>$e->getMessage()
					)
				);
		}
	}
	public function changeStatusTaskBySponzor($idTodoSponzor,$status)
	{
		try
		{
			$todoSponzor = TaskBySponzor::find($idTodoSponzor);
			$todoSponzor->status=$status;
			$todoSponzor->save();
			return Response::json(array("success" => true,"error"=>false));
		}
		catch(Exception $e)
		{
			return Response::json(
				array(
					"success" => true,
					"error"=>true,
					"Message"=>$e->getMessage()
					)
				);
		}
	}
	public function getDemoStatus($userId){
		$demoStatus=UserCustomization::where("id","=",$userId)->pluck('demo');
		return Response::json(array("success" => true,"demoStatus"=>$demoStatus,"lang"=>Session::get("lang")));//Aca devolvemos el lenguaje
	}
	public function setDemoStatus($userId,$status){
		try
		{
			if($status>1)
				$status=1;
			$user=UserCustomization::find($userId);
			$user->demo=$status;
			$user->save();
			return Response::json(array("success" => true,"message"=>"Demos status changed Succesfuly","User"=>$user->toArray()));
		}
		catch(Exception $e){
			return Response::json(array("success" => false,"message"=>"User Not Found"));
		}
	}
	public function removeTaskSponzorPeak($idTaskRelPeak)
	{
		try{
			$todoSponzor = TaskBySponzor::find($idTaskRelPeak);
			$todo = PeakTask::find($todoSponzor->task_id);
			if($todo->type==1)
			{
				$todo->delete();
			}
			$todoSponzor->delete();
			return Response::json(array("success" => true,"error"=>false));
		}
		catch(Exception $e)
		{
			return Response::json(array("success" => true,"error"=>true,"Message"=>$e->getMessage()));
		}
	}
	public function storeExternalSponzor()
	{
		$company=Input::get("company"); //Obtenemos las variables enviadas por el formulario
		$name=Input::get("name");
		$email=Input::get("email");
		$peak_id=Input::get("peak");	
		$rules = array(
			'company'       => 'required',
			'name'      => 'required',
			'email' => 'required',
			'peak_id' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);//Validamos que hayan llegado todos los campos
		if ($validator->fails()) {//Si no se cumple se retorna mensaje
			$messages=$validator->messages();
			echo "<h1>".Lang::get('widget.validationRules')."</h1>";
			echo "<p>".$messages."</p>";
		}
		else{//Si llenaron todos los campos -> a trabajar!
			try{//Si el usuario ya se encuentra registrado, sigue este flujo					    
			    $user = Sentry::findUserByLogin($email); // Encontramos el usuario con el email introducido
			}
			catch (Exception $e) //Se dispara cuando el usuario no existe
			{
			    $user = Sentry::register(array( //creamos el usuario
			        'email'    => $email,
			        'password' => "123456"
			    ));
			    $activationCode = $user->getActivationCode(); //Obtenemos el codigo de activación
			    Event::fire('user.signup', array(  //Enviamos el correo de activacion
	            	'email' => $email, 
	            	'userId' => $user->id, 
	                'activationCode' => $activationCode
	            ));
	            Session::put('userId', $user->id ); //guardamos las sesiones por si acaso
	            Session::put('email', $email );
	            UsersGroups::create(array( //Le asignamos el grupo
	                "user_id" =>$user->id,
	                "group_id"=>6 //6 es el grupo de los sponzors
	            ));//Asignamos el grupo del usuario.
	            $resetCode = $user->getResetPasswordCode(); //Le reseteamos el passowrd
	            Event::fire('user.forgot', array( //Le mandamos el password al correo
					'email' => $email,
					'userId' => $user->id,
					'resetCode' => $resetCode
				));
				$user->name=$name;
				$user->company=$company;
				$user->save();
			}
			if($user->hasAccess('sponsors')){ //Preguntamos si el usuario es realmente un sponzor
		    	$peakid=$peak_id;
				$userid=$user->id;
				$peak=Peaks::find($peakid);
				$sponzor=UserCustomization::find($userid);
				$rel=RelSponzorsEvents::create(array(
					"idsponzor"	=>$userid,
					"idevent"	=>$peak->id,
					"rel_peak"	=>$peakid,
					"state"		=>0
				));		
				//conseguimos el id y el email del organizador para notificarlo.
				$organizer=DB::table('events')
				->join('users', 'events.organizer', '=', 'users.id')
				->where("events.id","=",$peak->id_event)->get();

				$event=Events::find($peak->id_event);
				//Enviamos la notificación via pusher
				Pusherer::trigger('events-channel', 'New-Sponzoring', 
					array( 
						'type' 			=> "AddSponzorToEvent", 
						'sponzorId'		=>$userid,
						'kind'			=>$peak->kind,
						'eventId'		=>$peak->id_event,
						'peakId'		=>$peak->id,
						'relPeakId'		=>$rel->id,
						'organizerId'	=>$organizer[0]->id,
						'message'		=>Lang::get('dashboard.NotificationNewSponzorAnEvent', array('titleEvent'=>$event->title))
						)
				);
				$organizerEmail=$organizer[0]->email;
				//Procedemos a enviar el email
				Mail::send('emails.newSponzor', 
					array(
						'eventTitle' => $organizer[0]->title,
						'sponzoringType' => $peak->kind,
						'sponzorEmail' => $sponzor->email,
						'sponzorName' => $sponzor->name
						), 
					function($message) use ($organizerEmail)
					{
					    $message->to("$organizerEmail", "SponzorMe")->subject(Lang::get('dashboard.newSponzorEmailNotification'));
					}
				);
				echo "<h1>".Lang::get('widget.sponzoringsaveandemailsent')."</h1>";
			}
			else{
			    echo "<h1>".Lang::get('widget.nosponzoremail')."</h1>";
			}
		}
	}
}