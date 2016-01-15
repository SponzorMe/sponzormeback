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
	public function update(Request $request,$id)
	{
		$UserInterest=UserInterest::find($id);
		if(!$UserInterest){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($user_id)){
				$validator = Validator::make(
				    ['user_id' => $user_id],
				    ['user_id' => ['required', 'max:255','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$UserInterest->user_id=$user_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($interest_id)){
				$validator = Validator::make(
				    ['interest_id' => $interest_id],
				    ['interest_id' => ['required', 'max:255','exists:interests_categories,id_interest']]
				);
				if(!$validator->fails()){
					$flag=1;
					$UserInterest->interest_id=$interest_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$UserInterest->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'UserInterest'=>$UserInterest],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'UserInterest'=>$UserInterest],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'user_id'=>'required|max:11|exists:users,id',
			'interest_id'=>'required|max:11|exists:interests_categories,id_interest',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$UserInterest->user_id=$user_id;
				$UserInterest->interest_id=$interest_id;
				$UserInterest->save();
				return response()->json(['message'=>"Updated",'UserInterest'=>$UserInterest],200);
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
