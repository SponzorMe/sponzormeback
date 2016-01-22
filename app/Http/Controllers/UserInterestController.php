<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInterest;
use Illuminate\Support\Facades\Validator;

class UserInterestController extends Controller {
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
		$UserInterests = UserInterest::get();
		return response()->json([
			"success" => true,
			"UserInterests"=>$UserInterests->toArray()
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
		$UserInterest = UserInterest::find($id);
		if(!$UserInterest){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			$UserInterest = UserInterest::with(
			'users_interests.interest')->where('users_interests.id','=',$id)->first();
			return response()->json(
				["data"=>
					[
						"UserInterest"=>$UserInterest,
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
			'user_id'=>'required|max:11|exists:users,id',
			'interest_id'=>'required|max:11|exists:interests_categories,id_interest',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$UserInterest=UserInterest::create($request->all());
			$UserInterest->interest;
			return response()->json(['message'=>"Inserted",'UserInterest'=>$UserInterest],201);
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$all = $request->input("interests");
		$noInserted = [];
		$inserted = [];
		foreach ($all as $a) {
			$validation = Validator::make($a, [
      	'user_id'=>'required|max:11|exists:users,id',
				'interest_id'=>'required|max:11|exists:interests_categories,id_interest'
	    ]);
			if($validation->fails())
			{
				array_push($noInserted, $a);
			}
			else
			{
				UserInterest::create($a);
				array_push($inserted, $a);
			}
		}
		return response()->json(['inserted'=>$inserted,'noInserted'=>$noInserted],200);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$UserInterest=UserInterest::find($id);
		if(!$UserInterest){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$UserInterest->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

}
