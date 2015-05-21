<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller {

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
		$categories = Category::get();
		return response()->json([
			"success" => true,
			"categories"=>$categories->toArray()
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
		$category = Category::find($id);
		if(!$category){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			$category->events;
			$category->interests;
			return response()->json(
				["data"=>
					[
						"category"=>$category->toArray(),
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
        	'title' =>'required|unique:categories,title|max:255',
        	'body' => 'required',
        	'lang' => 'required|max:5',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);	
		}
		else
		{
			$category=Category::create($request->all());
			return response()->json(['message'=>"Inserted",'category'=>$category],201);
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
		$category=Category::find($id);
		if(!$category){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			//Get all values
			$title	= $request->input("title");
			$body	= $request->input("body");
			$lang	= $request->input("lang");
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
			$flag=0;//If 0 persist nothing was updated.
			if(!empty($title)){				
				$validator = Validator::make(
				    ['title' => $title],
				    ['title' => ['required', 'max:255','unique:categories,title,'.$id]]
				);
				if(!$validator->fails()){
					$flag=1;
					$category->title=$title;
				}
				else{
					$warnings[]=$validator->messages();
				}		
			}
			if(!empty($body)){
				$category->body=$body;
				$flag=1;
			}
			if(!empty($lang)){			
				$validator = Validator::make(
				    ['lang' => $lang],
				    ['lang' => ['required', 'max:5']]
				);
				if(!$validator->fails()){
					$flag=1;
					$category->lang=$lang;
				}
				else{
					$warnings[]=$validator->messages();
				}				
			}
			if($flag){
				$category->save();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'category'=>$category],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'category'=>$category],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'title' =>'required|max:255|unique:categories,title,'.$id,
        	'body' => 'required',
        	'lang' => 'required|max:5',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);	
			}
			else
			{
				$category->title=$title;
				$category->body=$body;
				$category->lang=$lang;
				$category->save();
				return response()->json(['message'=>"Updated",'category'=>$category],200);
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
		$category=Category::find($id);
		if(!$category){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$events=$category->events;
			$interests=$category->interests;
			if(sizeof($events)>0){
				return response()->json(['message'=>"This category has events, first remove the events and try again"],409);			
			}
			elseif(sizeof($interests)>0){
				return response()->json(['message'=>"This category has interests, first remove the interests and try again"],409);			
			}
			else{
				$category->delete();
				return response()->json(['message'=>"Deleted"],200);
			}			
		}
	}

}
