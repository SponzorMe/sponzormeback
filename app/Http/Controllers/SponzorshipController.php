<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponzorship;
use Illuminate\Support\Facades\Validator;

class SponzorshipController extends Controller {
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
		$SponzorsEvents = Sponzorship::get();
		return response()->json([
			"success" => true,
			"SponzorsEvents"=>$SponzorsEvents->toArray()
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
		$SponzorEvent = Sponzorship::find($id);
		if(!$SponzorEvent){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"SponzorEvent"=>$SponzorEvent->toArray(),
						"Event"=>$SponzorEvent->event,
						"Sponzor"=>$SponzorEvent->user,
						"Perk"=>$SponzorEvent->perk,
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
			'status'=>'required|max:4',
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'perk_id'=>'required|max:11|exists:perks,id', 
			'event_id'=>'required|max:11|exists:events,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$Sponzorship=Sponzorship::create($request->all());
			return response()->json(['message'=>"Inserted",'Sponzorship'=>$Sponzorship],201);
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
