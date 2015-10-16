<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventType;
use Illuminate\Support\Facades\Validator;

class EventTypeController extends Controller {

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
	public function update(Request $request,$id)
	{
		$EventType=EventType::find($id);
		if(!$EventType){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($name)){
				$validator = Validator::make(
				    ['name' => $name],
				    ['name' => ['required', 'max:255','unique:event_types,name,'.$id]]
				);
				if(!$validator->fails()){
					$flag=1;
					$EventType->name=$name;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($description)){
				$EventType->description=$description;
				$flag=1;
			}
			if(!empty($lang)){
				$validator = Validator::make(
				    ['lang' => $lang],
				    ['lang' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$EventType->lang=$lang;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$EventType->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'EventType'=>$EventType],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'EventType'=>$EventType],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'name' =>'required|max:255|unique:event_types,name,'.$id,
        	'description' => 'required',
        	'lang' => 'required|max:5',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$EventType->name=$name;
				$EventType->description=$description;
				$EventType->lang=$lang;
				$EventType->save();
				return response()->json(['message'=>"Updated",'EventType'=>$EventType],200);
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
		$EventType=EventType::find($id);
		if(!$EventType){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$events=$EventType->events;
			if(sizeof($events)>0){
				return response()->json(['message'=>"This EventType has events, first remove the events and try again"],409);
			}
			else{
				$EventType->delete();
				return response()->json(['message'=>"Deleted"],200);
			}
		}
	}
}
