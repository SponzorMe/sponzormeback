<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TaskSponzor;

class TaskSponzorController extends Controller {

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
