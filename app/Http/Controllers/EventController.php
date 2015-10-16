<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller {


	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['store','update','destroy']]);
	}
<<<<<<< HEAD
	
=======

>>>>>>> local
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
<<<<<<< HEAD
=======
			$event->sponzorship;
			$event->perk_tasks;
			$event->sponzor_tasks;
>>>>>>> local
			return response()->json(
				["data"=>
					[
						"event"=>$event->toArray(),
						"category"=>$category->toArray(),
						"type"=>$type->toArray(),
<<<<<<< HEAD
						"organizer"=>$type->toArray(),
					]
				], 200
			);
		}		
=======
						"organizer"=>$organizer->toArray(),
					]
				], 200
			);
		}
>>>>>>> local
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
<<<<<<< HEAD
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
=======
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
>>>>>>> local
		}
		else
		{
			$event=Event::create($request->all());
			return response()->json(['message'=>"Inserted",'event'=>$event],201);
<<<<<<< HEAD
		}			
=======
		}
>>>>>>> local
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$event=Event::find($id);
		if(!$event){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
<<<<<<< HEAD
			//Get all values
			$title	= $request->input("title");
			$location	= $request->input("location");
			$ends	= $request->input("ends");
			$starts	= $request->input("starts");
			$location_reference	= $request->input("location_reference");
			$image	= $request->input("image");
			$description	= $request->input("description");
			$privacy	= $request->input("privacy");
			$lang	= $request->input("lang");
			$organizer	= $request->input("organizer");
			$category	= $request->input("category");
			$type	= $request->input("type");			
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			
			$flag=0;//If 0 persist nothing was updated.
			$warnings=array();
			if(!empty($title)){				
=======
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required

			$flag=0;//If 0 persist nothing was updated.
			$warnings=array();
			if(!empty($title)){
>>>>>>> local
				$validator = Validator::make(
				    ['title' => $title],
				    ['title' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->title=$title;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}				
			}
			if(!empty($location)){				
=======
				}
			}
			if(!empty($location)){
>>>>>>> local
				$validator = Validator::make(
				    ['location' => $location],
				    ['location' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->location=$location;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($ends)){				
=======
				}
			}
			if(!empty($ends)){
>>>>>>> local
				$validator = Validator::make(
				    ['ends' => $ends],
				    ['ends' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->ends=$ends;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}				
			}
			if(!empty($starts)){				
=======
				}
			}
			if(!empty($starts)){
>>>>>>> local
				$validator = Validator::make(
				    ['starts' => $starts],
				    ['starts' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->starts=$starts;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($location_reference)){				
=======
				}
			}
			if(!empty($location_reference)){
>>>>>>> local
				$validator = Validator::make(
				    ['location_reference' => $location_reference],
				    ['location_reference' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->location_reference=$location_reference;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($image)){				
=======
				}
			}
			if(!empty($image)){
>>>>>>> local
				$validator = Validator::make(
				    ['image' => $image],
				    ['image' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->image=$image;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($description)){				
=======
				}
			}
			if(!empty($description)){
>>>>>>> local
				$validator = Validator::make(
				    ['description' => $description],
				    ['description' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->description=$description;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($privacy)){				
=======
				}
			}
			if(!empty($privacy)){
>>>>>>> local
				$validator = Validator::make(
				    ['privacy' => $privacy],
				    ['privacy' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->privacy=$privacy;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}					
			}
			if(!empty($lang)){				
=======
				}
			}
			if(!empty($lang)){
>>>>>>> local
				$validator = Validator::make(
				    ['lang' => $lang],
				    ['lang' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->lang=$lang;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}				
			}
			if(!empty($organizer)){				
=======
				}
			}
			if(!empty($organizer)){
>>>>>>> local
				$validator = Validator::make(
				    ['organizer' => $organizer],
				    ['organizer' => ['required','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->organizer=$organizer;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}							
			}
			if(!empty($category)){				
=======
				}
			}
			if(!empty($category)){
>>>>>>> local
				$validator = Validator::make(
				    ['category' => $category],
				    ['category' => ['required', 'max:5', 'exists:categories,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->category=$category;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}				
			}
			if(!empty($type)){				
=======
				}
			}
			if(!empty($type)){
>>>>>>> local
				$validator = Validator::make(
				    ['type' => $type],
				    ['type' => ['required', 'max:5','exists:event_types,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->type=$type;
				}
				else{
					$warnings[]=$validator->messages();
<<<<<<< HEAD
				}				
			}
			
=======
				}
			}

>>>>>>> local
			if($flag){
				$event->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'event'=>$event],200);
			}
			else{
				return response()->json(['message'=>"Nothing to update",'warnings'=>$warnings,'event'=>$event],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
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
<<<<<<< HEAD
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
			}
			else
			{
				$event->$title =$title;
				$event->$location =$location;	
				$event->$ends =$ends;	
				$event->$starts =$starts;	
				$event->$location_reference =$location_reference;	
				$event->$image =$image;
				$event->$description =$description;	
				$event->$privacy =$privacy;
				$event->$lang =$lang;
				$event->$organizer =$organizer;
				$event->$category =$category;
				$event->$type =$type;
=======
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$event->title =$title;
				$event->location =$location;
				$event->ends =$ends;
				$event->starts =$starts;
				$event->location_reference =$location_reference;
				$event->image =$image;
				$event->description =$description;
				$event->privacy =$privacy;
				$event->lang =$lang;
				$event->organizer =$organizer;
				$event->category =$category;
				$event->type =$type;
>>>>>>> local
				$event->save();
				return response()->json(['message'=>"Updated",'event'=>$event],200);
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
		$event=Event::find($id);
		if(!$event){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$perks=$event->perks;
			$sponzorship=$event->sponzorship;
<<<<<<< HEAD
			if(sizeof($perks)>0){
				return response()->json(['message'=>"This event has perks, first remove the perks and try again"],409);			
			}
			elseif(sizeof($sponzorship)>0){
				return response()->json(['message'=>"This event has sponzorship, first remove the sponzorship and try again"],409);			
=======
			$perkTasks=$event->perk_tasks;
			if(sizeof($perks)>0){
				return response()->json(['message'=>"This event has perks, first remove the perks and try again"],409);
			}
			elseif(sizeof($sponzorship)>0){
				return response()->json(['message'=>"This event has sponzorship, first remove the sponzorship and try again"],409);
			}
			elseif(sizeof($perkTasks)>0){
				return response()->json(['message'=>"This event has perkTasks, first remove the perk tasks and try again"],409);
>>>>>>> local
			}
			else{
				$event->delete();
				return response()->json(['message'=>"Deleted"],200);
<<<<<<< HEAD
			}			
=======
			}
>>>>>>> local
		}
	}

}
