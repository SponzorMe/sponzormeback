<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller {


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
		$events = Event::get();
		return response()->json([
			"success" => true,
			"events"=>$events->toArray()
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
		$event = Event::find($id);
		if(!$event){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else
		{
			$category=$event->category()->get();
			$type=$event->type()->get();
			$organizer=$event->organizer()->get();
			$event->perks;
			return response()->json(
				["data"=>
					[
						"event"=>$event->toArray(),
						"category"=>$category->toArray(),
						"type"=>$type->toArray(),
						"organizer"=>$type->toArray(),
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
			'location'=>'required|max:255',
			'ends'=>'required|max:255',
			'starts'=>'required|max:255',
			'location_reference'=>'required|max:255',
			'image'=>'required|max:255',
			'description'=>'required',
			'privacy'=>'required|max:255',
			'lang'=>'required|max:5',
			'organizer'=>'required|exists:users,id',
			'category'=>'required|exists:categories,id',
			'type'=>'required|exists:event_types,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$event=Event::create($request->all());
			return response()->json(['message'=>"Inserted",'event'=>$event],201);
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
