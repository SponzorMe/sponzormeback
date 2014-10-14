@extends('layouts.default-angular')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')

<div class="">
	<ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>{{trans('pages.slide1')}}</h3></div></li>
            <li><span>Image 02</span><div><h3>{{trans('pages.slide2')}}</h3></div></li>
            <li><span>Image 03</span><div><h3>{{trans('pages.slide3')}}</h3></div></li>
            <li><span>Image 04</span><div><h3>{{trans('pages.slide4')}}</h3></div></li>
            <li><span>Image 05</span><div><h3>{{trans('pages.slide5')}}</h3></div></li>
            </ul>
  <div class="container">
  	<header>
                <h1><span>{{trans('pages.copy')}}</span></h1>
                <h2>{{trans('pages.nextaction')}}</h2>
    </header>
  </div>
</div>

@if (Sentry::check() )
@endif
@stop