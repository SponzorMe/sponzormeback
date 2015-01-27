<!Doctype html>
<html lang="en" ng-app="Dashboard">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Dashboard</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
 <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('components/ngDialog/css/ngDialog.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('components/ngDialog/css/ngDialog-theme-default.min.css')}}"/>
  <!--Date timer-->
  <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('components/angular-bootstrap-datetimepicker/src/css/datetimepicker.css')}}"/>
  <!--Estilos principales-->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}"/>  
  <!-- Javascripts ================================================== -->
  <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('components/angular/angular.min.js')}}"></script>
  <script src="{{ asset('components/angular-cookies/angular-cookies.min.js')}}"></script>
  <script src="{{ asset('components/angular-bootstrap/ui-bootstrap.min.js')}}"></script>
  <script src="{{ asset('components/angular-bootstrap/ui-bootstrap-tpls.min.js')}}"></script>
  <script src="{{ asset('components/angular-ui-router/release/angular-ui-router.min.js')}}"></script>
  <script src="{{ asset('components/ngDialog/js/ngDialog.min.js')}}"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
  <script src="{{ asset('components/ngAutocomplete/src/ngAutocomplete.js')}}"></script>
  <script src="{{ asset('components/angular-sanitize/angular-sanitize.min.js')}}"></script>
  <script src="{{ asset('components/angular-file-upload/angular-file-upload.min.js')}}"></script>  <!--Date timer-->
  <script type="text/javascript" src="{{ asset('components/moment/moment.js')}}"></script>
  <script type="text/javascript" src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('components/angular-bootstrap-datetimepicker/src/js/datetimepicker.js')}}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script><!--controller principal-->
  <script src="{{ asset('js/services/customizationService.js') }}"></script><!-- load our service -->
  <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script><!-- Pusher Service -->
  <script type="text/javascript">

    var pusher = new Pusher('d88e93903c0ddc65df8c');
    var eventsChannel = pusher.subscribe('events-channel');
    eventsChannel.bind('New-Sponzoring', function(data) {
      if(data.organizerId=={{ Session::get('userId') }})
      {
        alert("omg alguien ha patrocinado un evento tuyo.");
      }
    });
    eventsChannel.bind('Sponzoring', function(data) {
      console.log(data);
    });

  </script>
</head>
<!--Navegación y encabezado-->
@if (Sentry::check())
<body ng-controller="MasterCtrl">
  <div id="page-wrapper" ng-class="{'active': toggle}" ng-cloak>

    <!-- Sidebar -->

    <div id="sidebar-wrapper">
      <ul class="sidebar">
        <li class="sidebar-main">
          <a href="#" ng-click="toggleSidebar()">
            {{trans('dashboard.dashboard')}}
            <span class="menu-icon glyphicon glyphicon-transfer"></span>
          </a>
        </li>
        <li class="sidebar-title"><span>{{trans('dashboard.navigation')}}</span></li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.dashboard')}}<span class="menu-icon fa fa-tachometer"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/events">{{trans('dashboard.events')}} <span class="menu-icon fa fa-table"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/settings">{{trans('dashboard.settings')}}<span class="menu-icon fa fa-tasks"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/sponzors">{{trans('dashboard.sponzors')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/friend">{{trans('dashboard.invitefriend')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/todo">{{trans('dashboard.todo')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="{{ URL::to('logout') }}">{{trans('pages.logout')}}<span class="menu-icon fa fa-cogs"></span></a>
        </li>    
                        
      </ul>
      <div class="sidebar-footer">
        <div class="col-xs-4">
          <a id="blogUrl" href="{{ URL::to(trans('pages.blogUrl')) }}">{{trans('pages.blog')}}</a>
        </div>
        <div class="col-xs-4">
          <a href="{{ URL::to('testimonials') }}" target="_blank">
            {{trans('dashboard.about')}}
          </a>
        </div>
        <div class="col-xs-4">
          <a target="_blank" href="{{ URL::to(trans('pages.supportUrl')) }}">
            {{trans('dashboard.support')}}
          </a>
        </div>
      </div>
    </div>

    <!-- End Sidebar -->

    <div id="content-wrapper">
      <div class="page-content">

        <!-- Header Bar -->

        <div class="row header">
          <div class="col-xs-12">
            <div class="user pull-right">
              <div class="item dropdown">
                <a href="" class="dropdown-toggle">
                  <img src="{{ asset('images/photo.png')}}">
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">
                    {{ Session::get('email') }}                     
                    <input type="hidden" ng-model="event.organizer" ng-init="event.organizer = {{ Session::get('userId') }}" />                   
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="#/settings">
                      {{trans('dashboard.account')}}
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="{{ URL::to('logout') }}">
                      {{trans('dashboard.logout')}}
                    </a>
                  </li>
                </ul>
              </div>
              <div class="item dropdown">
               <a href="" class="dropdown-toggle">
                  <i class="fa fa-bell-o"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">
                    {{trans('dashboard.notifications')}}
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#">{{trans('dashboard.notification')}}</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="meta">
              <div class="page">
                {{trans('dashboard.dashboard')}}
              </div>
              <div class="breadcrumb-links">
                {{trans('dashboard.home')}} / {{trans('dashboard.dashboard')}}
              </div>
            </div>
          </div>
        </div>
        <!-- End Header Bar -->

        <!-- Main Content -->
        <section data-ui-view></section>
      </div><!-- End Page Content -->
    </div><!-- End Content Wrapper -->
  </div><!-- End Page Wrapper -->
	@yield("content")
@else
    <p>{{trans('pages.forbidden')}}</p>
@endif
  
</body>
</html>
