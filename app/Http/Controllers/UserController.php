<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\UserInterest;
use App\Models\InterestCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DrewM\MailChimp\MailChimp;
use App\Services\Notification;



class UserController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['update','destroy','index','show']]);
	}
	
	/*public function test(){
		echo "Hola";
		$notification = new Notification();
		
		$vars = ['userName'=>"123",'message' => "adsdasdas"];
		$notification->sendEmail('invite',"en",["name"=>"seagomezar@gmail.com", "email"=>"seagomezar@gmail.com"], $vars);
	}*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$users = User::get();
		return response()->json([
			"success" => true,
			"users"=>$users->toArray()
			], 200
		);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$user = User::find($id);
		if(!$user){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else
		{
			$interests = InterestCategory::join('users_interests', 'users_interests.interest_id', '=','interests_categories.id_interest')->where('users_interests.user_id', '=', $id)->get();
			$user->events;
			$user->categories;
			$user->interests;
			$user->perk_tasks;
			if($user->type==0){
				$user->sponzorships_like_organizer;
				$user->tasks_sponzor_like_organizer;
				$user->rating_like_organizer;
				$filtered = $user->rating_like_organizer->filter(function ($item) {
				    return $item->type == 1;
				});
				$rating = $filtered->avg('question0');
			}
			else if ($user->type==1){
				$user = User::with(
				'tasks_sponzor_like_sponzor',
				'rating_like_sponzor',
				'saved_events.event.perks.tasks',
	      'saved_events.event.type',
	      'saved_events.event.category',
				'sponzorships.organizer',
				'sponzorships.event',
				'sponzorships.perk.tasks',
				'sponzorships.task_sponzor.task',
				'sponzorships.ratings',
				'interests.interest',
				'transactions')
				->where('users.id','=',$id)->first();
				$filtered = $user->rating_like_sponzor->filter(function ($item) {
				    return $item->type == 0;
				});
				$rating = $filtered->avg('question0');
			}
			return response()->json(
				["data"=>
					[
						"user"=>$user->toArray(),
						"rating"=>$rating
					]
				], 200
			);
		}
	}

	public function homeRequest($id){
		$user = User::find($id);
		$today = date('Y-m-d H:i:s');
		if($user->type == 0){
			$user = User::with(
			'events.perks.tasks',
			'events.type',
			'events.category',
			'events.perks.sponzor_tasks',
			'sponzorships_like_organizer.sponzor',
			'sponzorships_like_organizer.event',
			'sponzorships_like_organizer.perk',
			'sponzorships_like_organizer.task_sponzor.task',
			'sponzorships_like_organizer.ratings',
			'interests.interest')
			->where('users.id','=',$id)->first();
			$eventTasks = Event::with(
        'sponzorship',
        'perks.sponzor_tasks.task',
        'perks.sponzor_tasks.sponzor')
        ->where('events.organizer','=', $id)->get();
			return response()->json(
				[
					"user"=>$user->toArray(),
					"eventTasks"=>$eventTasks->toArray()
				], 200
			);
		}
		else if($user->type == 1){
			$user = User::with(
			'saved_events.event.perks.tasks',
      		'saved_events.event.type',
      		'saved_events.event.category',
			'sponzorships.organizer',
			'sponzorships.event',
			'sponzorships.perk.tasks',
			'sponzorships.task_sponzor.task',
			'sponzorships.ratings',
			'interests.interest',
			'transactions')
			->where('users.id','=',$id)->first();
			$events = Event::with(
			'category',
			'type',
			'user_organizer',
			'perks.tasks')->where('events.starts', '>', $today)->get();
			return response()->json(
				[
						"user"=>$user->toArray(),
						"events"=>$events->toArray()
				], 200
			);
		}
		else{
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
	}

	private function subscribeToMailchimp($email, $name, $type, $lang="en"){
		$MailChimp = new MailChimp('2cc5e8c25894c43a2a4f022e6e47c352-us7');
		$name=explode(" ", trim($name));
		if(empty($name[1])){//
			$name[1]=" ";//If nothing was explode assign empty string by default.
		}
		switch ($lang) {
		    case "pt":
		        $sponzorList='3a5d1a0864';
		        $organizerList='d0ae68ea63';
		        break;
		    case "es":
		        $sponzorList='da62c9f3ff';
		        $organizerList='1d8e15698d';
		        break;
		    case "en":
		        $sponzorList='4017131605';
	        	$organizerList='d14bde02d9';
		        break;
		}
		if($type==1){//If new user is sponzor
			$result = $MailChimp->post("lists/$sponzorList/members", [
			    'email_address' => $email,
			    'status'        => 'subscribed',
					'send_welcome'  => false,
					'merge_vars'    => array('FNAME'=>$name[0], 'LNAME'=>$name[1])
			]);
		}
		else{//If the new user is organizer
			$result = $MailChimp->post("lists/$organizerList/members", [
			    'email_address' => $email,
			    'status'        => 'subscribed',
					'send_welcome'  => false,
					'merge_vars'    => array('FNAME'=>$name[0], 'LNAME'=>$name[1])
			]);
		}
	}
	/**
	 * Verify the user's email and the activation code
	 * @param  POST  $email
	 * @return Response
	 */
	public function sendActivationLink(Request $request){
		$email=$request->input('email');
		$user=User::where("email","=",$email)->first();
		if(!$user){//If the user does not exist.
			return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
		}
		elseif($user->activated){//If the user is already activated
			return response()->json(['message'=>"User is already activated",'code'=>'201'],201);
		}
		else{//So we reset the activation link
			$activationCode = md5($email.str_random(30));
			$user->activation_code=$activationCode;
			$user->save();
			$link=\Config::get('constants.activation_url').$activationCode;
			$notification = new Notification();

			$vars = array('activationLink'=>$link,'name' => $user->name);
			$to = ['name'=>$user->name, 'email'=>$user->email];
			$notification->sendEmail('welcome',$user->lang,$to, $vars);
			response()->json(['message'=>"Activation Link sent",'code'=>'200'],200);
		}
	}
	public function verifyActivationLink($activationCode){
		$user=User::where("activation_code","=",$activationCode)->first();
		if(!$user){//If the user does not exist.
			return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
		}
		elseif($user->activated){//If the user is already activated
			return response()->json(['message'=>"User is already activated",'code'=>'201'],201);
		}
		else{//So we activate the user
			$user->activated=1;
			$user->activation_code="";
			$user->save();
			return response()->json(['message'=>"Account activated",'code'=>'200'],200);
		}
	}
	public function inviteFriend(Request $request){
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255',
			'message' 	=> 'required|max:400',
			'user_id'		=>'required|max:255|exists:users,id'
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"No invited",'error'=>$validation->messages()],400);
		}
		else{
			$user=User::find($request->input("user_id"));//Get the user info
			if(!$user){
				return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
			}
			else{
				$notification = new Notification();
				$vars = array('message'=>$request->input("message"),'userName' => $user->name);
				$to = ['name'=>$request->input("email"), 'email'=>$request->input("email")];
				$notification->sendEmail('invite', $user->lang, $to, $vars);
				return response()->json(['message'=>"Email Sent",'code'=>'200'],200);
			}
		}
	}
	public function store(Request $request){
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255|unique:users',
			'password'=> 'required|confirmed|min:6',
			'name'		=>'required|max:255',
			'type'		=>'required|max:1',
			'lang'		=>'required|max:5|in:en,es,pt'
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],400);
		}
		else
		{
			$user=User::create([
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'type' => $request->input('type'),
				'lang' => $request->input('lang'),
				'ionic_id' => $request->input('ionic_id'),
				'password' => bcrypt($request->input('password')),
				'image' => 'https://s3-us-west-2.amazonaws.com/sponzormewebappimages/user_default.jpg'
			]);
			$emailSender=$this->sendActivationLink($request);
//			$this->subscribeToMailchimp($request->input('email'),$request->input('name'),$request->input('type'),$request->input('lang'));
			return response()->json(['message'=>"Inserted",'User'=>$user],201);
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id){
		$User=User::find($id);
		if(!$User){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($email)){
				$validator = Validator::make(
				    ['email' => $email],
				    ['email' => ['required','email','max:255','unique:users,email,'.$id]]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->email=$email;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($password)){
				$validator = Validator::make(
				    ['password' => $password],
				    ['password' => ['required', 'min:6','confirmed']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->password=$password;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($name)){
				$validator = Validator::make(
				    ['name' => $name],
				    ['name' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->name=$name;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($type)){
				$validator = Validator::make(
				    ['type' => $type],
				    ['type' => ['required', 'max:1']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->type=$type;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($activated)){
				$validator = Validator::make(
				    ['activated' => $activated],
				    ['activated' => ['required', 'max:1']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->activated=$activated;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($activation_code)){
				$validator = Validator::make(
				    ['activation_code' => $activation_code],
				    ['activation_code' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->activation_code=$activation_code;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($activated_at)){
				$validator = Validator::make(
				    ['activated_at' => $activated_at],
				    ['activated_at' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->activated_at=$activated_at;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($last_login)){
				$validator = Validator::make(
				    ['last_login' => $last_login],
				    ['last_login' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->last_login=$last_login;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($persist_code)){
				$validator = Validator::make(
				    ['persist_code' => $persist_code],
				    ['persist_code' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->persist_code=$persist_code;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($reset_password_code)){
				$validator = Validator::make(
				    ['reset_password_code' => $reset_password_code],
				    ['reset_password_code' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->reset_password_code=$reset_password_code;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($company)){
				$validator = Validator::make(
				    ['company' => $company],
				    ['company' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->company=$company;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(isset($sex) && ($sex==0 || $sex==1)){
				$validator = Validator::make(
				    ['sex' => $sex],
				    ['sex' => ['max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->sex=$sex;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($age)){
				$validator = Validator::make(
				    ['age' => $age],
				    ['age' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->age=$age;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($custom_status)){
				$validator = Validator::make(
				    ['custom_status' => $custom_status],
				    ['custom_status' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->custom_status=$custom_status;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($login_code)){
				$validator = Validator::make(
				    ['login_code' => $login_code],
				    ['login_code' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->login_code=$login_code;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($login_valid_until)){
				$validator = Validator::make(
				    ['login_valid_until' => $login_valid_until],
				    ['login_valid_until' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->login_valid_until=$login_valid_until;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($lang)){
				$validator = Validator::make(
				    ['lang' => $lang],
				    ['lang' => ['required', 'max:5','in:en,es,pt']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->lang=$lang;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($image)){
				$validator = Validator::make(
				    ['image' => $image],
				    ['image' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->image=$image;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($description)){
				$validator = Validator::make(
				    ['description' => $description],
				    ['description' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->description=$description;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($eventbriteKey)){
				$validator = Validator::make(
				    ['eventbriteKey' => $eventbriteKey],
				    ['eventbriteKey' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->eventbriteKey=$eventbriteKey;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($meetupRefreshKey)){
				$validator = Validator::make(
				    ['meetupRefreshKey' => $meetupRefreshKey],
				    ['meetupRefreshKey' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->meetupRefreshKey=$meetupRefreshKey;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($comunity_size)){
				$validator = Validator::make(
				    ['comunity_size' => $comunity_size],
				    ['comunity_size' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->comunity_size=$comunity_size;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($location)){
				$validator = Validator::make(
				    ['location' => $location],
				    ['location' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->location=$location;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($location_reference)){
				$validator = Validator::make(
				    ['location_reference' => $location_reference],
				    ['location_reference' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->location_reference=$location_reference;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($demo)){
				$validator = Validator::make(
				    ['demo' => $demo],
				    ['demo' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->demo=$demo;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($status)){
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($logo)){
				$validator = Validator::make(
				    ['logo' => $logo],
				    ['logo' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->logo=$logo;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($pitch)){
				$validator = Validator::make(
				    ['pitch' => $pitch],
				    ['pitch' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->pitch=$pitch;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($newsletter)){
				$validator = Validator::make(
				    ['newsletter' => $newsletter],
				    ['newsletter' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->newsletter=$newsletter;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($ionic_id)){
				$validator = Validator::make(
				    ['newsletter' => $ionic_id],
				    ['newsletter' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->ionic_id=$ionic_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($phone)){
				$validator = Validator::make(
				    ['phone' => $phone],
				    ['phone' => ['max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->phone=$phone;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($website)){
				$validator = Validator::make(
				    ['website' => $website],
				    ['website' => ['max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$User->website=$website;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$User->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'User'=>$User],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'User'=>$User],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'email' 			=> 'required|email|max:255|unique:users,email,'.$id,
			'password' 			=> 'required|confirmed|min:6',
			'name'				=>'required|max:255',
			'type'				=>'required|max:1',
			'activated'			=>'required|max:255',
			'activation_code'	=>'required|max:255',
			'activated_at'		=>'required|max:255',
			'last_login'		=>'required|max:255',
			'persist_code'		=>'required|max:255',
			'reset_password_code'		=>'required|max:255',
			'company'		=>'required|max:255',
			'sex'		=>'required|max:255',
			'age'		=>'max:255',
			'custom_status'		=>'required|max:255',
			'login_code'		=>'required|max:255',
			'login_valid_until'		=>'required|max:255',
			'lang'		=>'required|max:5|in:en,es,pt',
			'image'		=>'required',
			'description'		=>'required',
			'eventbriteKey'		=>'required|max:255',
			'meetupRefreshKey'		=>'required|max:255',
			'comunity_size'		=>'required|max:255',
			'location'		=>'required|max:255',
			'location_reference'		=>'required|max:255',
			'demo'		=>'required|max:255',
			'status'		=>'required|max:255',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$User->name=$name;
				$User->email=$email;
				$User->password=$password;
				$User->activated=$activated;
				$User->activation_code=$activation_code;
				$User->activated_at=$activated_at;
				$User->last_login=$last_login;
				$User->persist_code=$persist_code;
				$User->reset_password_code=$reset_password_code;
				$User->company=$company;
				$User->sex=$sex;
				$User->age=$age;
				$User->custom_status=$custom_status;
				$User->login_code=$login_code;
				$User->login_valid_until=$login_valid_until;
				$User->lang=$lang;
				$User->ionic_id=$ionic_id;
				$User->image=$image;
				$User->description=$description;
				$User->eventbriteKey=$eventbriteKey;
				$User->meetupRefreshKey=$meetupRefreshKey;
				$User->comunity_size=$comunity_size;
				$User->location=$location;
				$User->location_reference=$location_reference;
				$User->demo=$demo;
				$User->status=$status;
				$User->save();
				return response()->json(['message'=>"Updated",'User'=>$User],200);
			}
		}
		else{
			return response()->json(['message'=>"Method Not Allowed"],405);
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$User=User::find($id);
		if(!$User){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$events=$User->events;
			$interests=$User->interests;
			$categories=$User->categories;
			$perk_tasks=$User->perk_tasks;
			$sponzorships=$User->sponzorships;
			$tasks_sponzor_like_organizer=$User->tasks_sponzor_like_organizer;
			$tasks_sponzor_like_sponzor=$User->tasks_sponzor_like_sponzor;
			if(sizeof($events)>0){
				return response()->json(['message'=>"This user has events, first remove the events and try again"],409);
			}
			elseif(sizeof($categories)>0){
				return response()->json(['message'=>"This user has categories, first remove the categories and try again"],409);
			}
			elseif(sizeof($interests)>0){
				return response()->json(['message'=>"This user has interests, first remove the interests and try again"],409);
			}
			elseif(sizeof($perk_tasks)>0){
				return response()->json(['message'=>"This user has perk_tasks, first remove the perk_tasks and try again"],409);
			}
			elseif(sizeof($sponzorships)>0){
				return response()->json(['message'=>"This user has sponzorships, first remove the sponzorships and try again"],409);
			}
			elseif(sizeof($tasks_sponzor_like_organizer)>0){
				return response()->json(['message'=>"This user has tasks_sponzor_like_organizer, first remove the tasks_sponzor_like_organizer and try again"],409);
			}
			elseif(sizeof($tasks_sponzor_like_sponzor)>0){
				return response()->json(['message'=>"This user has tasks_sponzor_like_sponzor, first remove the tasks_sponzor_like_sponzor and try again"],409);
			}
			else{
				$User->delete();
				return response()->json(['message'=>"Deleted"],200);
			}
		}
	}
	/**
	 * Get Eventbrite Token and redirect to the front
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function acceptEventbrite(Request $r){
		if($_GET['code']){
			$link=\Config::get('constants.redirect_evenbrite_front').$_GET['code'];
			return Redirect::to($link);
		}
		else{
			$link=\Config::get('constants.redirect_evenbrite_front').'0';
			return Redirect::to($link);
		}
	}
	/**
	 * Get Meetup Token and redirect to the front
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function acceptMeetup(Request $r){
		if($_GET['code']){
			$link=\Config::get('constants.redirect_meetup_front').$_GET['code'];
			return Redirect::to($link);
		}
		else{
			$link=\Config::get('constants.redirect_meetup_front').'0';
			return Redirect::to($link);
		}
	}
	/*Generate bearer token*/
	public function getMeetupToken($code){
		$client_secret = \Config::get('constants.meetup_client_secret');
		$client_id = \Config::get('constants.meetup_client_id');
		$redirect_meetup_url = \Config::get('constants.redirect_meetup_url');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://secure.meetup.com/oauth2/access",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "code=$code&client_secret=$client_secret&grant_type=authorization_code&client_id=$client_id&redirect_uri=$redirect_meetup_url",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  return response()->json(['Code'=>$code, 'response'=>$response],400);
		} else {
			return response()->json(['Code'=>$code, 'response'=>$response],200);
		}
	}
	public function getMeetupEvents($token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.meetup.com/self/events/?access_token=".$token,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  return response()->json(['Code'=>$token, 'response'=>$response],400);
		} else {
			return response()->json(['Code'=>$token, 'response'=>$response],200);
		}
	}
	/*Generate bearer token*/
	public function getEventbriteToken($code){
		$client_secret = \Config::get('constants.eventbrite_client_secret');
		$client_id = \Config::get('constants.eventbrite_client_id');
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.eventbrite.com/oauth/token",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "code=$code&client_secret=$client_secret&grant_type=authorization_code&client_id=$client_id",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  return response()->json(['Code'=>$code, 'response'=>$response],400);
		} else {
			return response()->json(['Code'=>$code, 'response'=>$response],200);
		}
	}

  public function chatNotification(Request $request){
    $userTo = $request->input("userTo");
    $userFrom = $request->input("userFrom");
		$user=User::where("email","=",$userTo['email'])->first();
		if(!$user){//If the user does not exist.
			return response()->json(['message'=>"User does not exist",'code'=>'404'],404);
		}
		else{
			$link=\Config::get('constants.chat_url').$request->input("sponzorshipId");
			$notification = new Notification();
			$vars = ['chatLink'=>$link, 'nameTo' => $userTo['name'], 'nameFrom' => $userFrom['name'],'message' => $request->input("message")];
			$to = ['name'=>$userTo['name'], 'email'=>$userTo['email']];
      if($request->input("userType") == 1){
        $notification->sendEmail('chatsendbysponsor',$user->lang, $to, $vars);
      }
      else if($request->input("userType") == 0){
        $notification->sendEmail('chatsendbyorganizer',$user->lang, $to, $vars);
      }
			return response()->json(['message'=>"Email Notification Sent",'code'=>$link],200);
		}
  }
}
