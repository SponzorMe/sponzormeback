<?php

class Category extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	protected $table = 'interests_categories';
}
