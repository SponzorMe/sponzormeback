<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponzorship;
use Illuminate\Support\Facades\Validator;

class SponzorshipController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['store','update','destroy']]);
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
<<<<<<< HEAD
=======
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
>>>>>>> local
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
<<<<<<< HEAD
=======
			$SponzorEvent->task_sponzor;
>>>>>>> local
			return response()->json(
				["data"=>
					[
						"SponzorEvent"=>$SponzorEvent->toArray(),
						"Event"=>$SponzorEvent->event,
<<<<<<< HEAD
						"Sponzor"=>$SponzorEvent->user,
=======
						"Sponzor"=>$SponzorEvent->sponzor,
						"Organizer"=>$SponzorEvent->organizer,
>>>>>>> local
						"Perk"=>$SponzorEvent->perk,
					]
				], 200
			);
<<<<<<< HEAD
		}		
=======
		}
>>>>>>> local
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
<<<<<<< HEAD
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'perk_id'=>'required|max:11|exists:perks,id', 
			'event_id'=>'required|max:11|exists:events,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
=======
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
			'cause'=>'required|max:255',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
>>>>>>> local
		}
		else
		{
			$Sponzorship=Sponzorship::create($request->all());
			return response()->json(['message'=>"Inserted",'Sponzorship'=>$Sponzorship],201);
<<<<<<< HEAD
		}			
=======
		}
>>>>>>> local
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
<<<<<<< HEAD
			//Get all values
			$status		= $request->input("status");
			$sponzor_id	= $request->input("sponzor_id");
			$perk_id	= $request->input("perk_id");
			$event_id	= $request->input("event_id");
=======
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
>>>>>>> local
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
<<<<<<< HEAD
			if(!empty($status)){				
=======
			if($status>=0){
>>>>>>> local
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
<<<<<<< HEAD
				}		
			}
			if(!empty($sponzor_id)){			
=======
				}
			}
			if(!empty($sponzor_id)){
>>>>>>> local
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
<<<<<<< HEAD
				}				
			}
			if(!empty($perk_id)){			
=======
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
>>>>>>> local
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
<<<<<<< HEAD
				}				
			}
			if(!empty($event_id)){			
=======
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
>>>>>>> local
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
<<<<<<< HEAD
				}				
=======
				}
>>>>>>> local
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
<<<<<<< HEAD
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'perk_id'=>'required|max:11|exists:perks,id', 
=======
					'cause'=>'required|max:255',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
>>>>>>> local
			'event_id'=>'required|max:11|exists:events,id',
	    	 ]);
			if($validation->fails())
			{
<<<<<<< HEAD
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
=======
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
>>>>>>> local
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
<<<<<<< HEAD
			$Sponzorship->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

=======
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
>>>>>>> local
}
