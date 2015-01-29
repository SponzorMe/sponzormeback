<!Doctype html>
<html lang="en" ng-app="Dashboard">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ secure_asset('images/favicon.ico') }}"/>
  <title>Dashboard</title>
 <!-- CSS -->
  <link rel="stylesheet" href="{{ secure_asset('components/bootstrap/dist/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" href="{{ secure_asset('components/font-awesome/css/font-awesome.min.css')}}"/>
  <link rel="stylesheet" href="{{ secure_asset('components/ngDialog/css/ngDialog.min.css')}}"/>
  <link rel="stylesheet" href="{{ secure_asset('components/ngDialog/css/ngDialog-theme-default.min.css')}}"/>
  <!--Date timer-->
  <link rel="stylesheet" href="{{ secure_asset('components/bootstrap/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('components/angular-bootstrap-datetimepicker/src/css/datetimepicker.css')}}"/>
  <!--Estilos principales-->
  <link rel="stylesheet" href="{{ secure_asset('css/dashboard.css')}}"/>  
  <!-- Javascripts ================================================== -->
  <script src="{{ secure_asset('components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ secure_asset('components/angular/angular.min.js')}}"></script>
  <script src="{{ secure_asset('components/angular-cookies/angular-cookies.min.js')}}"></script>
  <script src="{{ secure_asset('components/angular-bootstrap/ui-bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset('components/angular-bootstrap/ui-bootstrap-tpls.min.js')}}"></script>
  <script src="{{ secure_asset('components/angular-ui-router/release/angular-ui-router.min.js')}}"></script>
  <script src="{{ secure_asset('components/ngDialog/js/ngDialog.min.js')}}"></script>
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
  <script src="{{ secure_asset('components/ngAutocomplete/src/ngAutocomplete.js')}}"></script>
  <script src="{{ secure_asset('components/angular-sanitize/angular-sanitize.min.js')}}"></script>
  <script src="{{ secure_asset('components/angular-file-upload/angular-file-upload.min.js')}}"></script>  <!--Date timer-->
  <script type="text/javascript" src="{{ secure_asset('components/moment/moment.js')}}"></script>
  <script type="text/javascript" src="{{ secure_asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ secure_asset('components/angular-bootstrap-datetimepicker/src/js/datetimepicker.js')}}"></script>
  <script src="{{ secure_asset('js/dashboard.js')}}"></script><!--controller principal-->
  <script src="{{ secure_asset('js/services/customizationService.js') }}"></script><!-- load our service -->
</head>
@if (Sentry::check())
<body ng-controller="MasterCtrl">
  <div id="page-wrapper" ng-class="{'active': toggle}" ng-cloak>

    <!-- Sidebar -->

    <div id="sidebar-wrapper">
      <ul class="sidebar">
        <li class="sidebar-main">
          <a href="#" ng-click="toggleSidebar()">
            Dashboard
            <span class="menu-icon glyphicon glyphicon-transfer"></span>
          </a>
        </li>
        <li class="sidebar-title"><span>{{trans('dashboard.navigation')}}</span></li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.dashboard')}}<span class="menu-icon fa fa-tachometer"></span></a>
        </li>        
        <li class="sidebar-list">
          <a href="#/settings">{{trans('dashboard.settings')}}<span class="menu-icon fa fa-tasks"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/following">{{trans('dashboard.following')}} <span class="menu-icon fa fa-table"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/sponzoring">{{trans('dashboard.sponzoring')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="{{ secure_url(URL::to('logout')) }}">{{trans('pages.logout')}}<span class="menu-icon fa fa-cogs"></span></a>
        </li>   
      </ul>
      <div class="sidebar-footer">
        <div class="col-xs-4">
          <a href="{{ secure_url(URL::to(trans('pages.blogUrl'))) }}">{{trans('pages.blog')}}</a>
        </div>
        <div class="col-xs-4">
          <a href="{{ secure_url(URL::to('testimonials')) }}" target="_blank">
            {{trans('dashboard.about')}}
          </a>
        </div>
        <div class="col-xs-4">
          <a target="_blank" href="{{ secure_url(URL::to(trans('pages.supportUrl'))) }}">
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
                  <img src="{{ secure_asset('images/photo.png')}}">
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
                    <a href="{{ secure_url(URL::to('logout')) }}">
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
