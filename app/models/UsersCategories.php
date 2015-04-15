<?php

class UsersCategories extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'rel_users_categories';

	public static function getCategoriesByUser($idUser)
	{
		$userscategories = DB::table('rel_users_categories')
            ->join('categories', 'rel_users_categories.category_id', '=', 'categories.id')
            ->where('rel_users_categories.user_id','=',$idUser)
            ->select('categories.title', 'categories.id')
            ->get();
            return $userscategories;
	}
	
}