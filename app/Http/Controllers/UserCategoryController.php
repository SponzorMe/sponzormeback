<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCategory;
use Illuminate\Support\Facades\Validator;

class UserCategoryController extends Controller {
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
		$UserCategories = UserCategory::get();
		return response()->json([
			"success" => true,
			"UserCategories"=>$UserCategories->toArray()
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
		$UserCategory = UserCategory::find($id);
		if(!$UserCategory){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"UserCategory"=>$UserCategory->toArray(),
						"User"=>$UserCategory->user,
						"Category"=>$UserCategory->category,
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
			'category_id'=>'required|max:11|exists:categories,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$UserCategory=UserCategory::create($request->all());
			return response()->json(['message'=>"Inserted",'UserCategory'=>$UserCategory],201);
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
		$UserCategory=UserCategory::find($id);
		if(!$UserCategory){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$user_id		= $request->input("user_id");
			$category_id	= $request->input("category_id");
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
					$UserCategory->user_id=$user_id;
				}
				else{
					$warnings[]=$validator->messages();
				}		
			}
			if(!empty($category_id)){				
				$validator = Validator::make(
				    ['category_id' => $category_id],
				    ['category_id' => ['required', 'max:255','exists:categories,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$UserCategory->category_id=$category_id;
				}
				else{
					$warnings[]=$validator->messages();
				}		
			}
			if($flag){
				$UserCategory->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'UserCategory'=>$UserCategory],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'UserCategory'=>$UserCategory],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'user_id'=>'required|max:11|exists:users,id',
			'category_id'=>'required|max:11|exists:categories,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
			}
			else
			{
				$UserCategory->user_id=$user_id;
				$UserCategory->category_id=$category_id;
				$UserCategory->save();
				return response()->json(['message'=>"Updated",'UserCategory'=>$UserCategory],200);
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
		$UserCategory=UserCategory::find($id);
		if(!$UserCategory){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$UserCategory->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}

}
