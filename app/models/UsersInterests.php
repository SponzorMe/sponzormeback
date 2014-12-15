<?php

class UsersInterests extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'rel_users_interests';

	public static function getInterestsByUser($idUser)
	{
		$userscategories = DB::table('rel_users_interests')
            ->join('interests_categories', 'rel_users_interests.interests_categories_idinterests', '=', 'interests_categories.idinterests')
            ->where('rel_users_interests.web_users_id','=',$idUser)
            ->select('interests_categories.name')
            ->get();
            return $userscategories;
	}
	
}
