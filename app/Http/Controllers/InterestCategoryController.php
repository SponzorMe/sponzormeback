<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestCategory;
use Illuminate\Support\Facades\Validator;

class InterestCategoryController extends Controller {

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
		$InterestCategory = InterestCategory::get();
		return response()->json([
			"success" => true,
			"InterestCategory"=>$InterestCategory->toArray()
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
		$InterestCategory = InterestCategory::find($id);
		if(!$InterestCategory){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			return response()->json(
				["data"=>
					[
						"InterestCategory"=>$InterestCategory->toArray(),
						"Category"=>$InterestCategory->category()->get(),
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
			'name'=>'required|max:255',
			'description'=>'required|max:255',
			'lang'=>'required|max:5',
			'category_id'=>'required|max:11|exists:categories,id',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$InterestCategory=InterestCategory::create($request->all());
			return response()->json(['message'=>"Inserted",'InterestCategory'=>$InterestCategory],201);
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
		$InterestCategory=InterestCategory::find($id);
		if(!$InterestCategory){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$name			= $request->input("name");
			$description	= $request->input("description");
			$lang			= $request->input("lang");
			$category_id	= $request->input("category_id");
		}		
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($name)){				
				$validator = Validator::make(
				    ['name' => $name],
				    ['name' => ['required', 'max:255','unique:event_types,name,'.$id]]
				);
				if(!$validator->fails()){
					$flag=1;
					$InterestCategory->name=$name;
				}
				else{
					$warnings[]=$validator->messages();
				}		
			}
			if(!empty($description)){
				$InterestCategory->description=$description;
				$flag=1;
			}
			if(!empty($lang)){				
				$validator = Validator::make(
				    ['lang' => $lang],
				    ['lang' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$InterestCategory->lang=$lang;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if(!empty($category_id)){				
				$validator = Validator::make(
				    ['category_id' => $category_id],
				    ['category_id' => ['required', 'max:5','exists:categories,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$InterestCategory->category_id=$category_id;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if($flag){
				$InterestCategory->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'InterestCategory'=>$InterestCategory],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'InterestCategory'=>$InterestCategory],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'name'=>'required|max:255',
			'description'=>'required|max:255',
			'lang'=>'required|max:5',
			'category_id'=>'required|max:11|exists:categories,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
			}
			else
			{
				$InterestCategory->name=$name;
				$InterestCategory->description=$description;
				$InterestCategory->lang=$lang;
				$InterestCategory->category_id=$category_id;
				$InterestCategory->save();
				return response()->json(['message'=>"Updated",'InterestCategory'=>$InterestCategory],200);
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
		$InterestCategory=InterestCategory::find($id);
		if(!$InterestCategory){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
				$InterestCategory->delete();
				return response()->json(['message'=>"Deleted"],200);
		}			
	}
}
