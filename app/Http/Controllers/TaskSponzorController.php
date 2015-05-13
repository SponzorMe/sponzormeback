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
	public function update($id)
	{
		//Falta por implementar.
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Falta por implementar.
	}

}
