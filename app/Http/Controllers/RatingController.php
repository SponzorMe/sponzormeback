<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller {
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
		$Rating = Rating::get();
		return response()->json([
			"success" => true,
			"Rating"=>$Rating->toArray()
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
		$Rating = Rating::find($id);
		if(!$Rating){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"Rating"=>$Rating->toArray(),
						"Event"=>$Rating->event,
						"Tasks"=>$Rating->tasks,
						"SponzorTasks"=>$Rating->sponzor_tasks
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
			'reserved_quantity'=>'required|max:11',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$Rating=Rating::create($request->all());
			return response()->json(['message'=>"Inserted",'Rating'=>$Rating],201);
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
		$Rating=Rating::find($id);
		if(!$Rating){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($usd)){
				$validator = Validator::make(
				    ['usd' => $usd],
				    ['usd' => ['required', 'max:11']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Rating->usd=$usd;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($kind)){
				$validator = Validator::make(
				    ['kind' => $kind],
				    ['kind' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Rating->kind=$kind;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($id_event)){
				$validator = Validator::make(
				    ['id_event' => $id_event],
				    ['id_event' => ['required', 'max:11','exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Rating->id_event=$id_event;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($reserved_quantity)){
				$validator = Validator::make(
				    ['reserved_quantity' => $reserved_quantity],
				    ['reserved_quantity' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Rating->reserved_quantity=$reserved_quantity;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($total_quantity)){
				$validator = Validator::make(
				    ['total_quantity' => $total_quantity],
				    ['total_quantity' => ['required', 'max:11']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Rating->total_quantity=$total_quantity;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}

			if($flag){
				$Rating->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'Rating'=>$Rating],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'Rating'=>$Rating],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
	        	'kind'=>'required|max:255',
				'usd'=>'required|max:11',
				'id_event'=>'required|max:11|exists:events,id',
				'total_quantity'=>'required|max:11',
				'reserved_quantity'=>'required|max:11',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$Rating->kind=$kind;
				$Rating->usd=$usd;
				$Rating->id_event=$id_event;
				$Rating->total_quantity=$total_quantity;
				$Rating->reserved_quantity=$reserved_quantity;
				$Rating->save();
				return response()->json(['message'=>"Updated",'Rating'=>$Rating],200);
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
		$Rating=Rating::find($id);
		if(!$Rating){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$tasks=$Rating->tasks;
			$sponzor_tasks=$Rating->sponzor_tasks;
			if(sizeof($tasks)>0){
				return response()->json(['message'=>"This Rating has tasks, first remove the tasks and try again"],409);
			}
			elseif(sizeof($sponzor_tasks)>0){
				return response()->json(['message'=>"This Rating has Sponzor tasks, first remove the Sponzor tasks and try again"],409);
			}
			else{
				$Rating->delete();
				return response()->json(['message'=>"Deleted"],200);
			}
		}
	}
}
