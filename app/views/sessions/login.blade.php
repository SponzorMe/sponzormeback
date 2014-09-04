@extends('layouts.default-angular')

{{-- Web site Title --}}
@section('title')
{{trans('loginform.title')}}
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => 'SessionController@store')) }}

            <h2 class="form-signin-heading">{{trans('pages.login')}}</h2>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>
            
            <label class="checkbox">
                {{ Form::checkbox('rememberMe', 'rememberMe') }}{{trans('loginform.rememberme')}}
            </label>
            {{ Form::submit(Lang::get('loginform.signin'), array('class' => 'btn btn-primary'))}}
            <a class="btn btn-link" href="{{ route('forgotPasswordForm') }}">{{trans('loginform.forgot')}}</a>
        {{ Form::close() }}
    </div>
</div>

@stop