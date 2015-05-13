<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerkTask;
use Illuminate\Support\Facades\Validator;

class PerkTaskController extends Controller {
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
		$PerkTask = PerkTask::find($id);
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
						"Event"=>$PerkTask->user,					]
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