<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerkTask;
use Illuminate\Support\Facades\Validator;

class PerkTaskController extends Controller {
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
		$PerkTasks = PerkTask::get();
		return response()->json([
			"success" => true,
			"PerkTasks"=>$PerkTasks->toArray()
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
		$PerkTask = PerkTask::find($id)->join('events', 'perk_tasks.event_id', '=', 'events.id')->select('perk_tasks.*', 'events.title')->get();
		if(!$PerkTask){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"PerkTask"=>$PerkTask->toArray(),
						"Perk"=>$PerkTask->perk,
						"Event"=>$PerkTask->event,
						"User"=>$PerkTask->user
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
			'title'=>'required|max:255',
			'description'=>'required',
			'type'=>'required|max:5',
			'status'=>'required|max:5',
			'user_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$PerkTask=PerkTask::create($request->all());
			return response()->json(['message'=>"Inserted",'PerkTask'=>$PerkTask],201);
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
		$PerkTask=PerkTask::find($id);
		if(!$PerkTask){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($title)){
				$validator = Validator::make(
				    ['title' => $title],
				    ['title' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$PerkTask->title=$title;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($description)){
				$PerkTask->description=$description;
				$flag=1;
			}
			if(!empty($type)){
				$validator = Validator::make(
				    ['type' => $type],
				    ['type' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$PerkTask->type=$type;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($status) || $status > -1){
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$PerkTask->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($user_id)){
				$validator = Validator::make(
				    ['user_id' => $user_id],
				    ['user_id' => ['required', 'max:11','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$PerkTask->user_id=$user_id;
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
					$PerkTask->perk_id=$perk_id;
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
					$PerkTask->event_id=$event_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$PerkTask->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'PerkTask'=>$PerkTask],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'PerkTask'=>$PerkTask],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
	        	'title'=>'required|max:255',
				'description'=>'required',
				'type'=>'required|max:5',
				'status'=>'required|max:5',
				'user_id'=>'required|max:11|exists:users,id',
				'perk_id'=>'required|max:11|exists:perks,id',
				'event_id'=>'required|max:11|exists:events,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$PerkTask->title=$title;
				$PerkTask->description=$description;
				$PerkTask->type=$type;
				$PerkTask->status=$status;
				$PerkTask->user_id=$user_id;
				$PerkTask->perk_id=$perk_id;
				$PerkTask->event_id=$event_id;
				$PerkTask->save();
				return response()->json(['message'=>"Updated",'PerkTask'=>$PerkTask],200);
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
		$PerkTask=PerkTask::find($id);
		if(!$PerkTask){
			return response()->json(['message'=>"Not found"],404);
		}
		$tasksSponzor=$PerkTask->task_sponzor;
		if(sizeof($tasksSponzor)>0){
			return response()->json(['message'=>"This task has tasks_sponzor, first remove the tasks_sponzor and try again"],409);
		}
		else{
			$PerkTask->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

}
