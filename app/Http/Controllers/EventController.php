<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Perk;
use App\Models\SavedEvents;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller {


	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['store','update','destroy']]);
	}


	//It should be moved to another controller
	public function saveEvent($eventId, $userId){
		$savedEvent=SavedEvents::create(['event_id'=>$eventId, 'user_id'=>$userId]);
		$Event = SavedEvents::with(
		'event.perks.tasks',
		'event.category',
		'event.type')
		->where('saved_events.id','=',$savedEvent->id)->first();
		return response()->json(['message'=>"Inserted",'event'=>$Event],201);
	}
	public function saveRemoveEvent($savedEventId){
		$savedEvent=SavedEvents::find($savedEventId)->first();
		if(!$savedEvent){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$savedEvent->delete();
			return response()->json(['message'=>"Delete"],200);
		}
	}
	///////////////////////////////////////////


	public function index(){

    $today = date("Y-m-d HH:ii:ss");
    $events = Event::with(
    'category',
    'type',
    'user_organizer',
    'perks.tasks')
    ->where('events.starts', '>', $today)->get();

		return response()->json(
			["data"=>
				[
					"events"=>$events->toArray()
				]
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
		$event = Event::with(
		'category',
		'type',
		'user_organizer',
		'perks.tasks',
		'sponzorship.sponzor',
		'sponzor_tasks')->where('events.id', '=', $id)->first();
		if(!$event){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else
		{
			return response()->json(
				[
					"event"=>$event
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
			$perks = $request->input('perks');
 			$event=Event::create($request->all());
			$aux = [];
			foreach ($perks as $p) {
				$validation = Validator::make($p, [
					'kind'=>'required|max:255',
					'usd'=>'required|max:11',
					'total_quantity'=>'required|max:11',
					'reserved_quantity'=>'required|max:11',
		    	 ]);
				if($validation->fails())
				{
					$aux[] = ['error'=>"Not inserted perk ".$p["kind"],'error'=>$validation->messages()];
				}
				else
				{
					$event->perks()->create($p);
				}
			}
			$Event = Event::with(
			'perks.tasks',
			'perks.sponzor_tasks')
			->where('events.id','=',$event->id)->first();
 			return response()->json(['message'=>"Inserted",'event'=>$Event, 'error'=>$aux],201);
 		}
 	}
	public function update(Request $request, $id){
		if($request->method()==="PUT"){//PUT all fields are required
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
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$event = Event::find($id);
				$event->title =$request->input('title');
				$event->location =$request->input('location');
				$event->ends =$request->input('ends');
				$event->starts =$request->input('starts');
				$event->location_reference =$request->input('location_reference');
				$event->image =$request->input('image');
				$event->description =$request->input('description');
				$event->privacy =$request->input('privacy');
				$event->lang =$request->input('lang');
				$event->organizer =$request->input('organizer');
				$event->category =$request->input('category');
				$event->type =$request->input('type');
				$event->save();

				$perks = $request->input('perks');
				$aux = [];
				foreach ($perks as $p) {
					$validation = Validator::make($p, [
						'kind'=>'required|max:255',
						'usd'=>'required|max:11',
						'total_quantity'=>'required|max:11',
						'reserved_quantity'=>'required|max:11',
						 ]);
					if($validation->fails()){
						$aux[] = ['error'=>"Not inserted/editing perk ".$p["kind"],'error'=>$validation->messages()];
					}
					else{
						if($p["id"]==-1){
								$event->perks()->create($p);
						}
						else{
							$newPerk = Perk::find($p["id"]);
							$newPerk->kind=$p["kind"];
							$newPerk->usd=$p["usd"];
							$newPerk->total_quantity=$p["total_quantity"];
							$newPerk->reserved_quantity=$p["reserved_quantity"];
							$newPerk->save();
						}
					}
				}
				$Event = Event::with(
				'perks.tasks',
				'perks.sponzor_tasks')
				->where('events.id','=',$event->id)->first();
	 			return response()->json(['message'=>"Updated",'event'=>$Event, 'error'=>$aux],200);
			}
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update2(Request $request,$id)
	{
		$event=Event::find($id);
		if(!$event){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required

			$flag=0;//If 0 persist nothing was updated.
			$warnings=array();
			if(!empty($title)){
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
				}
			}
			if(!empty($location)){
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
				}
			}
			if(!empty($ends)){
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
				}
			}
			if(!empty($starts)){
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
				}
			}
			if(!empty($location_reference)){
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
				}
			}
			if(!empty($image)){
				$validator = Validator::make(
				    ['image' => $image],
				    ['image' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->image=$image;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($description)){
				$validator = Validator::make(
				    ['description' => $description],
				    ['description' => ['required']]
				);
				if(!$validator->fails()){
					$flag=1;
					$event->description=$description;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($privacy)){
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
				}
			}
			if(!empty($lang)){
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
				}
			}
			if(!empty($organizer)){
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
				}
			}
			if(!empty($category)){
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
				}
			}
			if(!empty($type)){
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
				}
			}

			if($flag){
				$event->save();
				$eventToReturn = Event::with(
					'perks.tasks',
					'type',
					'category'
				)->where('id','=',$event->id);
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'event'=>$eventToReturn],200);
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
				$event->save();
				$eventToReturn = Event::with(
					'perks.tasks',
					'type',
					'category'
				)->where('id','=',$event->id);
				return response()->json(['message'=>"Updated", 'event'=>$eventToReturn],200);
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
			$sponzorship=$event->sponzorship;
			if(sizeof($sponzorship)>0){
				return response()->json(['message'=>"This event has sponzorship, first remove the sponzorship and try again"],409);
			}
			else{
				$event->perk_tasks()->delete();
				$event->perks()->delete();
				$event->delete();
				return response()->json(['message'=>"Deleted"],200);
			}
		}
	}

}
