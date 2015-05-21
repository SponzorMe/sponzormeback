<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskSponzor;
use Illuminate\Support\Facades\Validator;

class TaskSponzorController extends Controller {
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
		$TasksSponzor = TaskSponzor::get();
		return response()->json([
			"success" => true,
			"TasksSponzor"=>$TasksSponzor->toArray()
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
						"organizer"=>$TaskSponzor->organizer,
						"Sponzor"=>$TaskSponzor->sponzor,
						"sponzor_event"=>$TaskSponzor->sponzor_event,
						"event"=>$TaskSponzor->event,
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
			'status'=>'max:4',
			'task_id'=>'required|max:11|exists:perk_tasks,id',
			'perk_id'=>'required|max:11|exists:perks,id', 
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'organizer_id'=>'required|max:11|exists:users,id', 
			'event_id'=>'required|max:11|exists:events,id',
			'sponzorship_id'=>'required|max:11|exists:sponzorships,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$TaskSponzor=TaskSponzor::create($request->all());
			return response()->json(['message'=>"Inserted",'TaskSponzor'=>$TaskSponzor],201);
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
		$TaskSponzor=TaskSponzor::find($id);
		if(!$TaskSponzor){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$status	= $request->input("status");
			$task_id		= $request->input("task_id");
			$perk_id		= $request->input("perk_id");
			$sponzor_id		= $request->input("sponzor_id");
			$organizer_id	= $request->input("organizer_id");
			$event_id		= $request->input("event_id");
			$sponzorship_id	= $request->input("sponzorship_id");
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($status)){			
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
				}				
			}
			if(!empty($task_id)){				
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
				}		
			}
			if(!empty($perk_id)){				
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
				}		
			}	
			if(!empty($sponzor_id)){				
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
				}		
			}	
			if(!empty($organizer_id)){				
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
				}		
			}
			if(!empty($event_id)){				
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
				}		
			}
			if(!empty($sponzorship_id)){				
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
				}		
			}			
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
			'perk_id'=>'required|max:11|exists:perks,id', 
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'organizer_id'=>'required|max:11|exists:users,id', 
			'event_id'=>'required|max:11|exists:events,id',
			'sponzorship_id'=>'required|max:11|exists:sponzorships,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
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
