@extends('layouts.default-angular')

{{-- Web site Title --}}
@section('title')
{{trans('signinform.title')}}
@stop

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => 'SponsorController@store')) }}
            <div class="account-wall">
            <img class="profile-img" src="{{asset('images/register.png')}}" alt="">
            <h2 class="form-signin-heading">{{trans('signinform.title')}}</h2>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
                {{ ($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '') }}
            </div>
            
            {{ Form::submit(Lang::get('signinform.signin'), array('class' => 'btn btn-block')) }}
            
        {{ Form::close() }}
         </div>
        </div>
    </div>
</div>

@stop