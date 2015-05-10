<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller {

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