<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestCategory;
use Illuminate\Support\Facades\Validator;

class InterestCategoryController extends Controller {

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
	public function update($id)
	{
		//Falta por implementar.
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Falta por implementar.
	}

}
