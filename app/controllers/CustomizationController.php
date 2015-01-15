<?php

class CustomizationController extends \BaseController {

	/**
	 * Show all categories
	 *
	 * @return JSON Response
	 */
	public function getCategories()
	{
		$lang=Session::get("lang");
		return Response::json(Category::where("lang",'=',$lang)->get());
	}
	/**
	 * Show all interestsCategories with a parent ($id)
	 *
	 * @return JSON Response
	 */
	public function getInterestsByCategories($id)
	{
		$lang=Session::get("lang");
		return Response::json(InterestsCategories::where('parent_id', '=', $id)->where("lang",'=',$lang)->get());
	}
	/**
	 * Show all InterestsCategories
	 *
	 * @return JSON Response
	 */
	public function getInterests()
	{
		$lang=Session::get("lang");
		return Response::json(InterestsCategories::where("lang",'=',$lang)->get());
	}
	/**
	 * Update the user info with the Country, State, City.
	 * sex and age, then 
	 *
	 * @param  int  $id
	 * @param  POST $age, $sex, $country, $city, $state
	 * @return JSON Response
	 */
	public function update($id)
	{
		// validate
		$rules = array(
			'age'       => 'required',
			'sex'      => 'required',
			'location' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Response::json(
				array(
					'success' => false,
					'age' => Input::get('age'),
					'sex' => Input::get('sex'),
					'location' => Input::get('location'),
					'location_reference' => Input::get('location_reference')
					));
		} else {
			// store
			$user = UserCustomization::find($id);
			$user->age       			= Input::get('age');
			$user->sex      			= Input::get('sex');
			$user->location_reference 	= Input::get('location_reference');
			$user->location      		= Input::get('location');
			$user->custom_status    	= 1;
			$user->save();

			return Response::json(array('success' => true));
		}
	}
	/**
	 * Update the reluserscategory with the categories
	 *
	 * @param  int  $id
	 * @param  POST $age, $sex, $country, $city, $state
	 * @return JSON Response
	 */
	public function saveInterests($id)
	{		
		$interests=Input::get('interests');
		foreach ($interests as $interest) {
			$interestsInfo=InterestsCategories::where('idinterests', '=', $interest)->get();
			$flag=RelUsersCategory::where('user_id','=',$id)->where('category_id', '=', $interestsInfo[0]->parent_id)->get();
			
			if(!isset($flag[0]))
			{
				RelUsersCategory::create(
					array(
							"user_id" => $id,
							"category_id" =>$interestsInfo[0]->parent_id
						));
			}
			RelUsersInterests::create(
				array(
					"interests_categories_idinterests"  => $interest,
					"user_id"     						=> $id
				));
		}
		// Update the custom Status User
		$user = UserCustomization::find($id);
		$user->custom_status    = 2;
		$user->save();
		
		return Response::json(array('success' => true));
	}	
}