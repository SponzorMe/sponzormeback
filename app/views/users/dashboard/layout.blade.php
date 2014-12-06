<!Doctype html>
<html lang="en" ng-app="Dashboard">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>
 <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/css/font-awesome.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/lib/angular/ngDialog.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/lib/angular/ngDialog-theme-default.min.css')}}"/>
  <!-- SCRIPTS -->
  <script src="{{ asset('js/lib/jquery.js')}}"></script>
  <script src="{{ asset('js/lib/angular/angular.js')}}"></script>
  <script src="{{ asset('js/lib/angular-cookies/angular-cookies.js')}}"></script>
  <script src="{{ asset('js/lib/angular-bootstrap/ui-bootstrap.js')}}"></script>
  <script src="{{ asset('js/lib/angular-bootstrap/ui-bootstrap-tpls.js')}}"></script>
  <script src="{{ asset('js/lib/angular-ui-router/angular-ui-router.js')}}"></script>  
  <script src="{{ asset('js/lib/ngDialog.min.js')}}"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
  <script src="{{ asset('js/lib/ngAutocomplete.js')}}"></script>
  <script src="{{ asset('js/lib/angular-sanitize.min.js')}}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script><!--script principal-->
  <script src="{{ asset('js/services/customizationService.js') }}"></script><!-- load our service -->
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
                <a href="#" class="dropdown-toggle">
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
               <a href="#" class="dropdown-toggle">
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
