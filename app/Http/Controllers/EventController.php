<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller {

	
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
	public function store()
	{
		//Falta por implementar.		
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
