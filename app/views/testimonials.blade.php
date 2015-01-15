@extends('layouts.default-angular')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')
<div class="testimonials">
    <div class="row">
      <h1>{{trans('pages.testimonials')}}</h1>
    </div>
    <div class="row">        
        <div class="col-md-4">
            <div class="content" align="center">
                <div class="img-div img-responsive">
                    {{ HTML::image('images/testimonials/wladimir.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div><br/>
                  <p>"{{trans('testimonials.testimonial1')}}"</p><br/>
                  <footer class="title">Wladimir Avila - <a href="http://www.meetup.com/PHPColMeetup/" target="_blank">PHP Colombia</a></footer><br/>
                  <cite class="twitter">@wladimiravila</cite>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content" align="center">
                <div class="img-div img-responsive">
                    {{ HTML::image('images/testimonials/dvidsilva.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div><br/>
                  <p>"{{trans('testimonials.testimonial2')}}"</p><br/>
                  <footer class="title">David Silva - <a href="http://www.meetup.com/GDGBerkeley/" target="_blank">GDG Berkeley</a></footer><br/>
                  <cite class="twitter">@davidSilva</cite>
                </div>
        </div>
        <div class="col-md-4">
            <div class="content" align="center">
                <div class="img-div img-responsive">
                    {{ HTML::image('images/testimonials/jtorres.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div><br/>
                  <p>"{{trans('testimonials.testimonial3')}}"</p><br/>
                  <footer class="title">John Torres - <a href="http://www.meetup.com/ioscolombia/" target="_blank">IOS Colombia</a></footer><br/>
                  <cite class="twitter">@AlexTorresGamer</cite>
            </div>
        </div>          
    </div>
</div>
@stop