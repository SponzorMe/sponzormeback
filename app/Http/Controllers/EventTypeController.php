<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventType;
use Illuminate\Support\Facades\Validator;

class EventTypeController extends Controller {

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
		$eventTypes = EventType::get();
		return response()->json([
			"eventTypes"=>$eventTypes->toArray()
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
		$eventTypes = EventType::find($id);
		if(!$eventTypes){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			$eventTypes->events;
			return response()->json(
				["data"=>
					[
						"eventTypes"=>$eventTypes->toArray(),
					]
				], 200
			);
		}		
	}
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'name'=>'required|unique:event_types,name|max:255',
			'description'=>'required|max:255',
			'lang'=>'required|max:5',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$eventType=EventType::create($request->all());
			return response()->json(['message'=>"Inserted",'eventype'=>$eventType],201);
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