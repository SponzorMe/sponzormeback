<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponzorship;
use Illuminate\Support\Facades\Validator;
use Weblee\Mandrill\Mail;

class SponzorshipController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['store','update','destroy','sendSponzorshipEmail']]);
	}
	public function sendSponzorshipEmail(){
		$validation = Validator::make($request->all(), [
				'sponzorEmail'=>'required|max:255',
				'sponzorName'=>'required|max:255',
				'eventName'=>'required|max:255',
				'organizerEmail'=>'required|max:255',
				'lang'=>'required|max:3'
			 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"No sent, incomplete fields",'error'=>$validation->messages()],422);
		}
		else
		{
			try{

					$sponzorEmail=$request->input('sponzorEmail');
					$sponzorName=$request->input('sponzorName');
					$eventName=$request->input('eventName');
					$organizerEmail=$request->input('organizerEmail');
					$lang=$request->input('lang');
					if($lang=="en")
				    	$template_name = 'approved-english';
				    if($lang=="es")
				    	$template_name = 'approved-spanish';
				    if($lang=="pt")
				    	$template_name = 'approved-portuguese';
				    $template_content = array(
				        array(
				            'name' => 'Sponzorship-approved',
				            'content' => 'SponzorMe'
				        )
				    );
				    $message = array(
				        'to' => array(
				            array(
				                'email' =>	$sponzorEmail,
				                'name' 	=> 	$sponzorName,
				                'type' 	=> 'to'
				            )
				        ),
				        'global_merge_vars' => array(
				            array(
				                'name' => 'sponzorName',
				            	'content' => $sponzorName
				            ),
				            array(
				                'name' => 'eventName',
				            	'content' => $eventName
				            ),
										array(
				                'name' => 'organizerEmail',
				            	'content' => $organizerEmail
				            ),
				        ),
				    );
			    	$result = \MandrillMail::messages()->sendTemplate($template_name, $template_content, $message);
					if($result[0]["status"]=="sent" AND !$result[0]["reject_reason"]){
						return true;
					}
					elseif ($result[0]["status"]=="queued") {
						return false;
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
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$SponzorsEvents = Sponzorship::get();
		return response()->json([
			"success" => true,
			"SponzorsEvents"=>$SponzorsEvents->toArray()
			], 200
		);
	}
	/**
	* Display a list of sponzorships based in organizer id
	*/
	public function showByOrganizer($organizerId){
			$sponzorships = Sponzorship::where('organizer_id', $organizerId)
			->join('events', 'event_id', '=', 'events.id')
			->join('users', 'sponzor_id', '=', 'users.id')
			->join('perks', 'perk_id', '=', 'perks.id')
			->select('users.name','users.email','events.title', 'perks.*', 'sponzorships.*')
			->get();
			return response()->json([
				"success" => true,
				"SponzorsEvents"=>$sponzorships->toArray()
				], 200
			);
	}
	/**
	* Display a list of sponzorships based in sponzor id
	*/
	public function showBySponzor($sponzorId){
			$sponzorships = Sponzorship::where('sponzor_id', $sponzorId)
			->join('events', 'event_id', '=', 'events.id')
			->join('users', 'organizer_id', '=', 'users.id')
			->join('perks', 'perk_id', '=', 'perks.id')
			->select('users.name','users.email','events.title', 'perks.*', 'sponzorships.*')
			->get();
			return response()->json([
				"success" => true,
				"SponzorsEvents"=>$sponzorships->toArray()
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
		$SponzorEvent = Sponzorship::find($id);
		if(!$SponzorEvent){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			$SponzorEvent->task_sponzor;
			return response()->json(
				["data"=>
					[
						"SponzorEvent"=>$SponzorEvent->toArray(),
						"Event"=>$SponzorEvent->event,
						"Sponzor"=>$SponzorEvent->sponzor,
						"Organizer"=>$SponzorEvent->organizer,
						"Perk"=>$SponzorEvent->perk,
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
			'status'=>'required|max:4',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
			'cause'=>'required|max:255',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$Sponzorship=Sponzorship::create($request->all());
			return response()->json(['message'=>"Inserted",'Sponzorship'=>$Sponzorship],201);
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
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if($status>=0){
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:4']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($sponzor_id)){
				$validator = Validator::make(
				    ['sponzor_id' => $sponzor_id],
				    ['sponzor_id' => ['required', 'max:4','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($organizer_id)){
				$validator = Validator::make(
				    ['organizer_id' => $organizer_id],
				    ['organizer_id' => ['required', 'max:4','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($perk_id)){
				$validator = Validator::make(
				    ['perk_id' => $perk_id],
				    ['perk_id' => ['required', 'max:4','exists:perks,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->perk_id=$perk_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($cause)){
				$validator = Validator::make(
				    ['cause' => $cause],
				    ['cause' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->$cause=$cause;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($event_id)){
				$validator = Validator::make(
				    ['event_id' => $event_id],
				    ['event_id' => ['required', 'max:4', 'exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->event_id=$event_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$Sponzorship->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'Sponzorship'=>$Sponzorship],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'Sponzorship'=>$Sponzorship],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'status'=>'required|max:4',
					'cause'=>'required|max:255',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$Sponzorship->status=$status;
				$Sponzorship->sponzor_id=$sponzor_id;
				$Sponzorship->perk_id=$perk_id;
				$Sponzorship->event_id=$event_id;
				$Sponzorship->save();
				return response()->json(['message'=>"Updated",'Sponzorship'=>$Sponzorship],200);
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
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$tasksSponzor=$Sponzorship->task_sponzor;
			if(sizeof($tasksSponzor)>0){
				return response()->json(['message'=>"This Sponzorship has tasks_sponzor, first remove the tasks_sponzor and try again"],409);
			}
			else{
				$Sponzorship->delete();
				return response()->json(['message'=>"Deleted"],200);
			}
		}
	}
}
