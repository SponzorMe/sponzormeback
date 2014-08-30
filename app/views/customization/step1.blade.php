@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('profileform.title')}}
@stop

{{-- Content --}}
@section('content')
<div class="jumbotron text-center">
{{ Form::open(array(
    'action' => array('UserController@custom_step2'), 
    'method' => 'put',
    'class' => 'form-horizontal', 
    'role' => 'form'
    )) }}
<h1 class="cover-heading">You are just two clicks awayfrom your individualized style profile.</h1>
  <br/>
  <h6>* based on our stats</h6>
  <br/>
  <div class="btn-group" data-toggle="buttons" style="margin:10px">
    @foreach($categories as $category)       
        @if($category->status==1)
        <label class="btn btn-primary active">
          <input type="checkbox" name="categories[]" value="{{ $category->id }}" checked="checked" /> {{ $category->title }}
        </label>
        @else
        <label class="btn btn-primary">
          <input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->title }}
        </label>
        @endif
    @endforeach
    <br/>
    </div>
  <p class="lead" style="margin:20px">
     {{ Form::submit(Lang::get('profileform.tostep2button'), array('class' => 'btn btn-default')) }}
  </p>
  {{ Form::close() }}
</div>
@stop