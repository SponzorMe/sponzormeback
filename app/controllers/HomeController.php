<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function testimonials()
	{
		return View::make('testimonials');
	}
	public function setLanguage($lang)
	{
		Session::put('lang', $lang);
		return Redirect::route('home');
	}

}