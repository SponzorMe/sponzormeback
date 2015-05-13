<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perk;
use Illuminate\Support\Facades\Validator;

class PerkController extends Controller {
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
		$Perk = Perk::get();
		return response()->json([
			"success" => true,
			"Perk"=>$Perk->toArray()
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
		$Perk = Perk::find($id);
		if(!$Perk){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"Perk"=>$Perk->toArray(),
						"Event"=>$Perk->event,
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
			'kind'=>'required|max:255',
			'usd'=>'required|max:11',
			'id_event'=>'required|max:11|exists:events,id',
			'total_quantity'=>'required|max:11',
			'reserved_quantity'=>'max:11',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$Perk=Perk::create($request->all());
			return response()->json(['message'=>"Inserted",'Perk'=>$Perk],201);
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
