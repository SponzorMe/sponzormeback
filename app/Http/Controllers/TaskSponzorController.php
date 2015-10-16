<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskSponzor;
use Illuminate\Support\Facades\Validator;

class TaskSponzorController extends Controller {
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
		$TasksSponzor = TaskSponzor::get();
		return response()->json([
			"success" => true,
			"TasksSponzor"=>$TasksSponzor->toArray()
			], 200
		);
	}
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> staging
	/** Get the task sponzor by sponzorship join with dependence tasks**/
	public function showBySponzorship($sponzorshipId){
		$tasks = TaskSponzor::where('sponzorship_id', $sponzorshipId)
		->join('perk_tasks', 'task_id', '=', 'perk_tasks.id')
		->select('perk_tasks.title','perk_tasks.type', 'perk_tasks.description', 'task_sponzors.*')
		->get();
		return response()->json([
			"success" => true,
			"tasks"=>$tasks->toArray()
			], 200
		);
	}
<<<<<<< HEAD
>>>>>>> local
=======
>>>>>>> staging
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$TaskSponzor = TaskSponzor::find($id);
		if(!$TaskSponzor){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"TaskSponzor"=>$TaskSponzor->toArray(),
						"Task"=>$TaskSponzor->task,
<<<<<<< HEAD
<<<<<<< HEAD
						"organizer"=>$TaskSponzor->organizer,
						"Sponzor"=>$TaskSponzor->sponzor,
						"sponzor_event"=>$TaskSponzor->sponzor_event,
						"event"=>$TaskSponzor->event,
					]
				], 200
			);
		}		
=======
=======
>>>>>>> staging
						"Organizer"=>$TaskSponzor->organizer,
						"Sponzor"=>$TaskSponzor->sponzor,
						"Sponzorship"=>$TaskSponzor->sponzorships,
						"Event"=>$TaskSponzor->event,
					]
				], 200
			);
		}
<<<<<<< HEAD
>>>>>>> local
=======
>>>>>>> staging
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'status'=>'max:4',
			'task_id'=>'required|max:11|exists:perk_tasks,id',
<<<<<<< HEAD
<<<<<<< HEAD
			'perk_id'=>'required|max:11|exists:perks,id', 
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'organizer_id'=>'required|max:11|exists:users,id', 
=======
			'perk_id'=>'required|max:11|exists:perks,id',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
>>>>>>> local
=======
			'perk_id'=>'required|max:11|exists:perks,id',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
>>>>>>> staging
			'event_id'=>'required|max:11|exists:events,id',
			'sponzorship_id'=>'required|max:11|exists:sponzorships,id',
    	 ]);
		if($validation->fails())
		{
<<<<<<< HEAD
<<<<<<< HEAD
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
=======
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
>>>>>>> local
=======
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
>>>>>>> staging
		}
		else
		{
			$TaskSponzor=TaskSponzor::create($request->all());
			return response()->json(['message'=>"Inserted",'TaskSponzor'=>$TaskSponzor],201);
<<<<<<< HEAD
<<<<<<< HEAD
		}			
=======
		}
>>>>>>> local
=======
		}
>>>>>>> staging
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$TaskSponzor=TaskSponzor::find($id);
		if(!$TaskSponzor){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
<<<<<<< HEAD
<<<<<<< HEAD
			//Get all values
			$status	= $request->input("status");
			$task_id		= $request->input("task_id");
			$perk_id		= $request->input("perk_id");
			$sponzor_id		= $request->input("sponzor_id");
			$organizer_id	= $request->input("organizer_id");
			$event_id		= $request->input("event_id");
			$sponzorship_id	= $request->input("sponzorship_id");
=======
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
>>>>>>> local
=======
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
>>>>>>> staging
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
<<<<<<< HEAD
<<<<<<< HEAD
			if(!empty($status)){			
=======
			if($status>=0){
>>>>>>> local
=======
			if($status>=0){
>>>>>>> staging
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}				
			}
			if(!empty($task_id)){				
=======
				}
			}
			if(!empty($task_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($task_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['task_id' => $task_id],
				    ['task_id' => ['required', 'max:11','exists:perk_tasks,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->task_id=$task_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}
			if(!empty($perk_id)){				
=======
				}
			}
			if(!empty($perk_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($perk_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['perk_id' => $perk_id],
				    ['perk_id' => ['required', 'max:11','exists:perks,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->perk_id=$perk_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}	
			if(!empty($sponzor_id)){				
=======
				}
			}
			if(!empty($sponzor_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($sponzor_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['sponzor_id' => $sponzor_id],
				    ['sponzor_id' => ['required', 'max:11','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}	
			if(!empty($organizer_id)){				
=======
				}
			}
			if(!empty($organizer_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($organizer_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['organizer_id' => $organizer_id],
				    ['organizer_id' => ['required', 'max:11','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->organizer_id=$organizer_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}
			if(!empty($event_id)){				
=======
				}
			}
			if(!empty($event_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($event_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['event_id' => $event_id],
				    ['event_id' => ['required', 'max:11','exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->event_id=$event_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}
			if(!empty($sponzorship_id)){				
=======
				}
			}
			if(!empty($sponzorship_id)){
>>>>>>> local
=======
				}
			}
			if(!empty($sponzorship_id)){
>>>>>>> staging
				$validator = Validator::make(
				    ['sponzorship_id' => $sponzorship_id],
				    ['sponzorship_id' => ['required', 'max:11','exists:sponzorships,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$TaskSponzor->sponzorship_id=$sponzorship_id;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
<<<<<<< HEAD
				}		
			}			
=======
				}
			}
>>>>>>> local
=======
				}
			}
>>>>>>> staging
			if($flag){
				$TaskSponzor->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'TaskSponzor'=>$TaskSponzor],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'TaskSponzor'=>$TaskSponzor],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'status'=>'max:4',
			'task_id'=>'required|max:11|exists:perk_tasks,id',
<<<<<<< HEAD
<<<<<<< HEAD
			'perk_id'=>'required|max:11|exists:perks,id', 
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'organizer_id'=>'required|max:11|exists:users,id', 
=======
			'perk_id'=>'required|max:11|exists:perks,id',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
>>>>>>> local
=======
			'perk_id'=>'required|max:11|exists:perks,id',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
>>>>>>> staging
			'event_id'=>'required|max:11|exists:events,id',
			'sponzorship_id'=>'required|max:11|exists:sponzorships,id',
	    	 ]);
			if($validation->fails())
			{
<<<<<<< HEAD
<<<<<<< HEAD
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
=======
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
>>>>>>> local
=======
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
>>>>>>> staging
			}
			else
			{
				$TaskSponzor->status=$status;
				$TaskSponzor->task_id=$task_id;
				$TaskSponzor->perk_id=$perk_id;
				$TaskSponzor->sponzor_id=$sponzor_id;
				$TaskSponzor->organizer_id=$organizer_id;
				$TaskSponzor->event_id=$event_id;
				$TaskSponzor->sponzorship_id=$sponzorship_id;
				$TaskSponzor->save();
				return response()->json(['message'=>"Updated",'TaskSponzor'=>$TaskSponzor],200);
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
		$TaskSponzor=TaskSponzor::find($id);
		if(!$TaskSponzor){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$TaskSponzor->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

}
