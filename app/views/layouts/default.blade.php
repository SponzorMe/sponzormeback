<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title> 
			@section('title') 
			@show 
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootstrap 3.0: Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
       <link rel="stylesheet" href="{{ asset('css/default.css') }}">
       <link rel="stylesheet" href="{{ asset('css/style3.css') }}">

		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"> -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">

		<style>
		@section('styles')
			body {
				padding-top: 60px;
			}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	
	</head>

	<body id="page">
		<!-- Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="" href="{{ URL::route('home') }}"><img height="45px" src="{{asset('images/logo.gif')}}"></a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
					<li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">{{trans('pages.users')}}</a></li>
					<li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">{{trans('pages.groups')}}</a></li>
				@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="/users/{{ Session::get('userId') }}">{{ Session::get('email') }}</a></li>
				<li><a href="{{ URL::to('logout') }}">{{trans('pages.logout')}}</a></li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">{{trans('pages.login')}}</a></li>
				<li {{ (Request::is('sponsors/create') ? 'class="active"' : '') }}><a href="{{ URL::to('sponsors/create') }}">{{trans('pages.sponsorreg')}}</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ URL::to('users/create') }}">{{trans('pages.organizerreg')}}</a></li>
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
            
	      </div>
	    </div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
        
			<!-- Notifications -->
			@include('layouts/notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
            
		</div>

		<!-- ./ container -->

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('js/jquery-2.0.2.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script> 
       <script src="{{ asset('js/modernizr.custom.86080.js') }}"></script> 
        
		<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
	</body>
</html>
