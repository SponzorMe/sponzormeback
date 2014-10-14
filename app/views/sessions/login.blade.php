@extends('layouts.default-angular')

{{-- Web site Title --}}
@section('title')
{{trans('loginform.title')}}
@stop

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            {{ Form::open(array('action' => 'SessionController@store')) }}
            <div class="account-wall">
                <img class="profile-img" src="{{asset('images/photo.png')}}?sz=120" alt="">
                <form class="form-signin">
                <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
                </div>
                <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                </div>
                {{ Form::submit(Lang::get('pages.login'), array('class' => 'btn btn-block'))}}
                <div class="row">
                <div class="col-xs-6">
                <label class="checkbox">
                <input type="checkbox" value="remember-me"/>Remember me   
                </label>
                </div>

                
            <div class="col-xs-6"><a class="btn btn-link" href="{{ route('forgotPasswordForm') }}">{{trans('loginform.forgot')}}</a></div>
            </div>
        {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop