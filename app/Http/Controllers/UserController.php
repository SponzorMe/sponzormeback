<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic',['only'=>['store','update','destroy']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
	public function show($id)
	{
		$user = User::find($id);
		if(!$user){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else
		{
			$events=$user->events;
			$events=$user->categories;
			$events=$user->interests;
			return response()->json(
				["data"=>
					[
						"user"=>$user->toArray(),
					]
				], 200
			);
		}		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$validation = Validator::make($request->all(), [
			'email' 	=> 'required|email|max:255|unique:users',
			'password' 	=> 'required|confirmed|min:6',
			'name'		=>'required|max:255',
			'type'		=>'required|max:1',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$user=User::create([
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'type' => $request->input('type'),
				'password' => bcrypt($request->input('password')),
			]);
			return response()->json(['message'=>"Inserted",'User'=>$user],201);
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$User=User::find($id);
		if(!$User){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$name = $request->input('name');
			$email = $request->input('email');
			$type = $request->input('type');
			$password = bcrypt($request->input('password'));
			$activated = $request->input('activated');
			$activation_code = $request->input('activation_code');
			$activated_at = $request->input('activated_at');
			$last_login = $request->input('last_login');
			$persist_code = $request->input('persist_code');
			$reset_password_code = $request->input('reset_password_code');
			$company = $request->input('company');
			$sex = $request->input('sex');
			$age = $request->input('age');
			$custom_status = $request->input('custom_status');
			$login_code = $request->input('login_code');
			$login_valid_until = $request->input('login_valid_until');
			$lang = $request->input('lang');
			$image = $request->input('image');
			$description = $request->input('description');
			$eventbriteKey = $request->input('eventbriteKey');
			$meetupRefreshKey = $request->input('meetupRefreshKey');
			$comunity_size = $request->input('comunity_size');
			$location = $request->input('location');
			$location_reference = $request->input('location_reference');
			$demo = $request->input('demo');
			$status = $request->input('status');
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
			if(!empty($sex)){			
				$validator = Validator::make(
				    ['sex' => $sex],
				    ['sex' => ['required', 'max:255']]
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
				    ['lang' => ['required', 'max:5']]
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
				    ['image' => ['required', 'max:5']]
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
				    ['description' => ['required', 'max:400']]
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
			'age'		=>'required|max:255',
			'custom_status'		=>'required|max:255',
			'login_code'		=>'required|max:255',
			'login_valid_until'		=>'required|max:255',
			'lang'		=>'required|max:255',
			'image'		=>'required|max:255',
			'description'		=>'required|max:255',
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
	public function destroy($id)
	{
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

}
