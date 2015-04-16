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
      <h1>{{trans('privacy.headprivacy')}}</h1>
    </div>
    <div class="row">        
        <div class="col-md-12">
            <div class="content" align="justify">
                <section class="icoprivate">
                    <i class="fa fa-lock"></i>
                </section>
                <section class="contenprivate">
                    <p>{{trans('privacy.head2privacy')}}</p>
                    <p>{{trans('privacy.text1')}}</p>
                    <p>{{trans('privacy.head3privacy')}}</p>
                    <p>{{trans('privacy.text2')}}</p>
                    <p>{{trans('privacy.head4privacy')}}</p>
                    <p>{{trans('privacy.text3')}}</p>
                    <p>{{trans('privacy.head5privacy')}}</p>
                    <p>{{trans('privacy.text4')}}</p>
                    <p>{{trans('privacy.head6privacy')}}</p>
                    <p>{{trans('privacy.text5')}}</p>
                    <p>{{trans('privacy.head7privacy')}}</p>
                    <p>{{trans('privacy.text6')}}</p>
                    <p>{{trans('privacy.head8privacy')}}</p>
                    <p>{{trans('privacy.text7')}}</p>
                    <p>{{trans('privacy.head9privacy')}}</p>
                    <p>{{trans('privacy.head10privacy')}}</p>
                    <p>{{trans('privacy.text8')}}</p>
                    <p>{{trans('privacy.head11privacy')}}</p>
                    <p>{{trans('privacy.text9')}}</p>
                    <p>{{trans('privacy.head12privacy')}}</p>
                    <p>{{trans('privacy.head13privacy')}}</p>
                    <p>{{trans('privacy.text10')}}</p>
                    <p>{{trans('privacy.head14privacy')}}</p>
                    <p>{{trans('privacy.text11')}}</p>
                    <p>{{trans('privacy.head15privacy')}}</p>
                    <p>{{trans('privacy.text12')}}</p>
                    <p>{{trans('privacy.head16privacy')}}</p>
                    <p>{{trans('privacy.text13')}}</p>
                    <p>{{trans('privacy.head17privacy')}}</p>
                    <p>{{trans('privacy.text14')}}</p>
                    <p>{{trans('privacy.head18privacy')}}</p>
                    <p>{{trans('privacy.text15')}}</p>
                    <p>{{trans('privacy.head19privacy')}}</p>
                    <p>{{trans('privacy.text16')}}</p>
                    <p>{{trans('privacy.head20privacy')}}</p>
                    <p>{{trans('privacy.text17')}}</p>
                    <p>{{trans('privacy.head21privacy')}}</p>
                    <p>{{trans('privacy.text18')}}</p>
                    <p>{{trans('privacy.head22privacy')}}</p>
                    <p>{{trans('privacy.text19')}}</p>
                    <p>{{trans('privacy.head23privacy')}}</p>
                    <p>{{trans('privacy.text20')}}</p>
                    <p>{{trans('privacy.head24privacy')}}</p>
                    <p>{{trans('privacy.text21')}}</p>
                    <p>{{trans('privacy.head25privacy')}}</p>
                    <p>{{trans('privacy.text22')}}</p>
                    <p>{{trans('privacy.head26privacy')}}</p>
                    <p>{{trans('privacy.text23')}}</p>
                    <p>{{trans('privacy.head27privacy')}}</p>
                    <p>{{trans('privacy.text24')}}</p>
                </section>
            </div>
        </div>       
    </div>
</div>
@stop