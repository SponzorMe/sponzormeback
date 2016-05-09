<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Validator;
use App\Services\Notification;
use App\Models\Sponzorship;

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
	public function getRatingBySponzorship($sponzorshipId, $type){
		$Rating = Rating::where('sponzorship_id', $sponzorshipId)->where('type',$type)->get();
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
						"Rating"=>$Rating->toArray()
					]
				], 200
			);
		}
	}
	public function getRatingByOrganizer($organizerId){
		$Rating = Rating::where('ratings.organizer_id', $organizerId)->where('ratings.type','1')
		->join('sponzorships', 'sponzorships.id', '=','ratings.sponzorship_id')
		->join('events', 'sponzorships.event_id', '=','events.id')
		->join('perks', 'sponzorships.perk_id', '=','perks.id')
		->join('users', 'ratings.sponzor_id', '=','users.id')
		->select('ratings.question0','ratings.question10','users.name AS sponzorName', 'events.title AS eventTitle', 'perks.kind AS perkKind', 'ratings.created_at', 'ratings.sponzor_id')
		->get();
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
						"Rating"=>$Rating->toArray()
					]
				], 200
			);
		}
	}
	public function getRatingBySponzor($sponzorId){
		$Rating = Rating::where('ratings.sponzor_id', $sponzorId)->where('ratings.type','0')
		->join('sponzorships', 'sponzorships.id', '=','ratings.sponzorship_id')
		->join('events', 'sponzorships.event_id', '=','events.id')
		->join('perks', 'sponzorships.perk_id', '=','perks.id')
		->join('users', 'ratings.organizer_id', '=','users.id')
		->select('ratings.question0','ratings.question6','users.name AS organizerName', 'events.title AS eventTitle', 'perks.kind AS perkKind', 'ratings.created_at', 'ratings.organizer_id')
		->get();
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
						"Rating"=>$Rating->toArray()
					]
				], 200
			);
		}
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
						"Organizer"=>$Rating->organizer,
						"Sponzor"=>$Rating->sponzor,
						"Sponzorship"=>$Rating->sponzorship
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
  			'organizer_id'=>'required|max:11|exists:users,id',
        'sponzor_id'=>'required|max:11|exists:users,id',
        'sponzorship_id'=>'required|max:11|exists:sponzorships,id',
  			'type'=>'required|max:2'
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$Rating=Rating::create($request->all());
			$Sponzorship=Sponzorship::find($Rating->sponzorship_id);
			$notification = new Notification();
			if($Rating->type == 1){
				$Sponzorship->rated_sponzor = 1;
				$Sponzorship->save();
				//----------------- --- NOTIFICATION EMAIL------------------------------//
				$vars = [
						'eventName' => $Sponzorship->event->title,
						'sponsorName' => $Sponzorship->sponzor->name,
						'organizerName' => $Sponzorship->organizer->name
				];
				$to = ['name'=>$Sponzorship->organizer->name, 'email'=>$Sponzorship->organizer->email];
				$notification->sendEmail('ratedbysponzor', $Sponzorship->organizer->lang, $to, $vars);
				//----------------------------------------------------------------------//
			}
			else{
				$Sponzorship->rated_organizer = 1;
				$Sponzorship->save();
				//----------------- --- NOTIFICATION EMAIL------------------------------//
				$vars = [
						'eventName' => $Sponzorship->event->title,
						'sponsorName' => $Sponzorship->sponzor->name,
						'organizerName' => $Sponzorship->organizer->name
				];
				$to = ['name'=>$Sponzorship->sponzor->name, 'email'=>$Sponzorship->sponzor->email];
				$notification->sendEmail('ratedbyorganizer', $Sponzorship->sponzor->lang, $to, $vars);
				//----------------------------------------------------------------------//
			}
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
		return response()->json(['message'=>"No Implemented"],200);
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
				$Rating->delete();
				return response()->json(['message'=>"Deleted"],200);
		}
	}
}
