<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponzorship;
use Illuminate\Support\Facades\Validator;

class SponzorshipController extends Controller {
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
	public function update(Request $request,$id)
	{
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$status		= $request->input("status");
			$sponzor_id	= $request->input("sponzor_id");
			$perk_id	= $request->input("perk_id");
			$event_id	= $request->input("event_id");
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($status)){				
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:4']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
				}		
			}
			if(!empty($sponzor_id)){			
				$validator = Validator::make(
				    ['sponzor_id' => $sponzor_id],
				    ['sponzor_id' => ['required', 'max:4','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if(!empty($perk_id)){			
				$validator = Validator::make(
				    ['perk_id' => $perk_id],
				    ['perk_id' => ['required', 'max:4','exists:perks,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->perk_id=$perk_id;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if(!empty($event_id)){			
				$validator = Validator::make(
				    ['event_id' => $event_id],
				    ['event_id' => ['required', 'max:4', 'exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->event_id=$event_id;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if($flag){
				$Sponzorship->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'Sponzorship'=>$Sponzorship],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'Sponzorship'=>$Sponzorship],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'status'=>'required|max:4',
			'sponzor_id'=>'required|max:11|exists:users,id', 
			'perk_id'=>'required|max:11|exists:perks,id', 
			'event_id'=>'required|max:11|exists:events,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
			}
			else
			{
				$Sponzorship->status=$status;
				$Sponzorship->sponzor_id=$sponzor_id;
				$Sponzorship->perk_id=$perk_id;
				$Sponzorship->event_id=$event_id;
				$Sponzorship->save();
				return response()->json(['message'=>"Updated",'Sponzorship'=>$Sponzorship],200);
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
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$Sponzorship->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

}