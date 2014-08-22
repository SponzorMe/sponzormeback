<?php

class CustomizationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		echo "nada";
	}
	/**
	 * Show all categories
	 *
	 * @return Response
	 */
	public function getCategories()
	{
		return Response::json(Category::get());
	}
	/**
	 * Show all categories
	 *
	 * @return Response
	 */
	public function getInterestsByCategories($id)
	{
		return Response::json(InterestsCategories::where('parent_id', '=', $id)->get());
	}
	public function getInterests()
	{
		return Response::json(InterestsCategories::get());
	}
	public function store()
	{
		User::create(array(
			'age' => Input::get('age'),
			'sex' => Input::get('sex'),
			'country' => Input::get('country'),
			'state' => Input::get('state'),
			'city' => Input::get('city')

		));

		return Response::json(array('success' => true));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		$rules = array(
			'age'       => 'required',
			'sex'      => 'required',
			'country' => 'required',
			'state' => 'required',
			'city' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Response::json(
				array(
					'success' => false,
					'age' => Input::get('age'),
					'sex' => Input::get('sex'),
					'country' => Input::get('country'),
					'state' => Input::get('state'),
					'city' => Input::get('city')
					));
		} else {
			// store
			$user = UserCustomization::find($id);
			$user->age       	= Input::get('age');
			$user->sex      	= Input::get('sex');
			$user->country 		= Input::get('country');
			$user->state      	= Input::get('state');
			$user->city      	= Input::get('city');
			$user->save();

			return Response::json(array('success' => true));
		}
	}
	public function saveInterests($id)
	{
		
		$interests=Input::get('interests');
		foreach ($interests as $interest) {
			RelUsersInterests::create(
				array(
					"interests_categories_idinterests"  => $interest,
					"user_id"     						=> $id
				));
		}
		
		return Response::json(array('success' => true));
	}
	
}
