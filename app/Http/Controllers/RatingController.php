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
			return response()->json(['message'=>"Inserted",'Rating'=>$Rating, 'inputs'=>$request->all()],201);
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
