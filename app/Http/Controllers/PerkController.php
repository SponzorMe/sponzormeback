<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perk;
use Illuminate\Support\Facades\Validator;

class PerkController extends Controller {
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
<<<<<<< HEAD
						"Tasks"=>$Perk->tasks,
						"SponzorTasks"=>$Perk->sponzor_tasks
					]
				], 200
			);
		}
=======
					]
				], 200
			);
		}		
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
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
<<<<<<< HEAD
			'reserved_quantity'=>'required|max:11',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
=======
			'reserved_quantity'=>'max:11',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
		}
		else
		{
			$Perk=Perk::create($request->all());
			return response()->json(['message'=>"Inserted",'Perk'=>$Perk],201);
<<<<<<< HEAD
		}
=======
		}			
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$Perk=Perk::find($id);
		if(!$Perk){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
<<<<<<< HEAD
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
=======
			//Get all values
			$kind				= $request->input("kind");
			$usd				= $request->input("usd");
			$id_event			= $request->input("id_event");
			$total_quantity		= $request->input("total_quantity");
			$reserved_quantity	= $request->input("reserved_quantity");
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
<<<<<<< HEAD
			if(!empty($usd)){
=======
			if(!empty($usd)){				
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
				$validator = Validator::make(
				    ['usd' => $usd],
				    ['usd' => ['required', 'max:11']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Perk->usd=$usd;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}
			}
			if(!empty($kind)){
=======
				}		
			}
			if(!empty($kind)){				
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
				$validator = Validator::make(
				    ['kind' => $kind],
				    ['kind' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Perk->kind=$kind;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}
			}
			if(!empty($id_event)){
=======
				}		
			}
			if(!empty($id_event)){				
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
				$validator = Validator::make(
				    ['id_event' => $id_event],
				    ['id_event' => ['required', 'max:11','exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Perk->id_event=$id_event;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}
			}
			if(!empty($reserved_quantity)){
=======
				}		
			}
			if(!empty($reserved_quantity)){				
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
				$validator = Validator::make(
				    ['reserved_quantity' => $reserved_quantity],
				    ['reserved_quantity' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Perk->reserved_quantity=$reserved_quantity;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}
			}
			if(!empty($total_quantity)){
=======
				}		
			}
			if(!empty($total_quantity)){				
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
				$validator = Validator::make(
				    ['total_quantity' => $total_quantity],
				    ['total_quantity' => ['required', 'max:11']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Perk->total_quantity=$total_quantity;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}
			}

=======
				}		
			}
			
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
			if($flag){
				$Perk->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'Perk'=>$Perk],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'Perk'=>$Perk],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
	        	'kind'=>'required|max:255',
				'usd'=>'required|max:11',
				'id_event'=>'required|max:11|exists:events,id',
				'total_quantity'=>'required|max:11',
<<<<<<< HEAD
				'reserved_quantity'=>'required|max:11',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
=======
				'reserved_quantity'=>'max:11',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
			}
			else
			{
				$Perk->kind=$kind;
				$Perk->usd=$usd;
				$Perk->id_event=$id_event;
				$Perk->total_quantity=$total_quantity;
				$Perk->reserved_quantity=$reserved_quantity;
				$Perk->save();
				return response()->json(['message'=>"Updated",'Perk'=>$Perk],200);
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
		$Perk=Perk::find($id);
		if(!$Perk){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$tasks=$Perk->tasks;
			$sponzor_tasks=$Perk->sponzor_tasks;
			if(sizeof($tasks)>0){
				return response()->json(['message'=>"This Perk has tasks, first remove the tasks and try again"],409);
			}
			elseif(sizeof($sponzor_tasks)>0){
				return response()->json(['message'=>"This Perk has Sponzor tasks, first remove the Sponzor tasks and try again"],409);
			}
			else{
				$Perk->delete();
				return response()->json(['message'=>"Deleted"],200);
<<<<<<< HEAD
			}
=======
			}			
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
		}
	}
}
