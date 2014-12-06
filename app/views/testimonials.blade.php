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
        <div class="col-md-4">
            <div class="content text-center">
                <div class="img-div img-responsive">
                    {{ HTML::image('images/testimonials/wladimir.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div>
                  <p>{{trans('testimonials.testimonial1')}}</p><br/>
                  <footer class="title">Wladimir Avila - PHP Colombia</footer><br/>
                  <cite class="twitter">@davidSilva</cite>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content">
                <blockquote>
                <div class="text">
                    {{ HTML::image('images/testimonials/dvidsilva.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</p><br/>
                  <footer class="title">Someone famous in <cite title="Source Title">John Torres <br/>IOS Developers Colombia</cite></footer><br/>
                  <cite class="twitter">@davidSilva</cite>
                </blockquote>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content">
                <blockquote>
                <div>
                    {{ HTML::image('images/testimonials/jtorres.png', $alt="Usuario", $attributes = array("width"=>"200px")) }}
                </div>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</p><br/>
                  <footer class="title">Someone famous in <cite title="Source Title">Daniel Matiz <br/>PHP Developers Colombia</cite></footer><br/>
                  <cite class="twitter">@davidSilva</cite>
                </blockquote>
            </div>
        </div>          
    </div>
</div>
@stop