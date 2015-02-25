<html>
<head>
  <title>Dashboard</title>
<!Doctype html>
<html lang="en" ng-app="EventPage">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Dashboard</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
 <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}"/>  
  <link rel="stylesheet" href="{{ asset('css/event.css')}}"> 
  <!-- Javascripts ================================================== -->
</head>
<body>
  <div class="col-xs-12">
    <div class="col-sm-12">
    <h1 align="center">{{trans('widget.signupform')}}</h1>   </div> 
    {{ Form::open(array('action' => 'ApiController@storeExternalSponzor')) }}
    <table class="table">
      <tr><td>{{trans('widget.sponzorname')}}</td>
        <td><input type="text" name="company" placeholder="{{trans('widget.sponzornameplaceholder')}}"/></td></tr>
      <tr><td>{{trans('widget.contactsname')}}</td>
        <td><input type="text" name="name" placeholder="{{trans('widget.contactsnameplaceholder')}}"/></td></tr>
      <tr><td>{{trans('widget.contactsemail')}}</td>
        <td><input type="text" name="email" placeholder="{{trans('widget.contactsemailplacelhoder')}}"/></td></tr>
      <tr><td colspan="2" align="center">{{trans('widget.whichlevelsponzor')}}</td></tr>
      <tr><td colspan="2" align="center">        
        @foreach ($peaks as $p)
          <div class="col-sm-5 col-md-4">
            <div class="thumbnail">
              <div class="caption">
                <input type="radio" name="peak" value="{{$p->id}}"/><strong>{{$p->kind}}</strong>
                <hr/>
                <strong>{{trans('widget.price')}}</strong>
                <ul class="list-group">
                  <li class="list-group-item">${{$p->usd}} USD</li>
                </ul>
                <strong>{{trans('widget.details')}}</strong>
                <ul class="list-group">
                  @foreach ($tasks as $t)
                    @if ($t->peak_id==$p->id )
                      <li class="list-group-item">{{$t->title}}</li>
                    @endif          
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        @endforeach
        <div class="clearfix"></div>
        <div class="col-sm-10">
          <input type="submit" class="btn btn-success" value="{{trans('widget.submitbutton')}}"/>
        </div>
      </td></tr>
    </table>
    {{ Form::close() }}
  </div>
</body>
</html>