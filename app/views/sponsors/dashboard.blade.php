<!doctype html>
<html lang="en" ng-app="Dashboard">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/lib/bootstrap/css/bootstrap.css')}}"/>
  <link rel="stylesheet" href="{{ asset('dashboard/lib/font-awesome/css/font-awesome.css')}}"/>
  <link rel="stylesheet" href="{{ asset('dashboard/css/dashboard/dashboard.css')}}"/>
  <!-- SCRIPTS -->
  <script src="{{ asset('js/jquery-2.0.2.min.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular/angular.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-cookies/angular-cookies.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-bootstrap/ui-bootstrap.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-bootstrap/ui-bootstrap-tpls.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-ui-router/angular-ui-router.js')}}"></script>  
  <script src="{{ asset('dashboard/js/dashboard.js')}}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script> <!-- load our custom scripts -->
  <script src="{{ asset('js/services/customizationService.js') }}"></script><!-- load our service -->
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
        <li class="sidebar-title"><span>NAVIGATION</span></li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.dashboard')}}<span class="menu-icon fa fa-tachometer"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/following">{{trans('dashboard.following')}} <span class="menu-icon fa fa-table"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/settings">{{trans('dashboard.settings')}}<span class="menu-icon fa fa-tasks"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/sponzoring">{{trans('dashboard.sponzoring')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
      </ul>
      <div class="sidebar-footer">
        <div class="col-xs-4">
          <a href="{{ URL::to(trans('pages.blogUrl')) }}">{{trans('pages.blog')}}</a>
        </div>
        <div class="col-xs-4">
          <a href="#" target="_blank">
            About
          </a>
        </div>
        <div class="col-xs-4">
          <a href="#">
            Support
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
                  <img src="{{ asset('images/users/user.png')}}">
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">
                    {{ Session::get('email') }}                     
                    <input type="hidden" ng-model="event.organizer" ng-init="event.organizer = {{ Session::get('userId') }}" />                   
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="#">
                      Account
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="{{ URL::to('logout') }}">
                      Logout
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
                    Notifications
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#">Server Down!</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="meta">
              <div class="page">
                Dashboard
              </div>
              <div class="breadcrumb-links">
                Home / Dashboard
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
  <!--Template asociado al dashboard principal-->
  <script type="text/ng-template" id="dashboard.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 ">
        <img width="100%" src="{{ asset('images/banner-sponzors.png')}}" alt="Banner"/>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 ">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-search"></i>
            <input type="text" data-ng-model="search" />
          </div>
          <div class="widget-body medium no-padding" data-ng-controller="searchController">
            <div data-ng-repeat="search in s" class="col-lg-5 col-lg-offset-1">
              <div class=""><% e.title %></div>
              <div class=""><% e.location %></div>
              <div class=""><% e.organizer %></div>   
              <div class="">
                <span class="text-success"><a href="#" data-ng-click="event.current = e.id"><i class="fa fa-check">
                  </i>Sponzor</a></span>
              </div>        
            </div>
          </div>
        </div>
      </div>
    </div>
  </script>
  <!--Template asociado a los eventos-->
  <script type="text/ng-template" id="following.html">    
      following -- sisas1
  </script>
  <!--Template asociado a los sponzors-->
  <script type="text/ng-template" id="sponzoring.html">
      sponzoring -- sisas
  </script>
  <!--Template asociado a los settings-->
  <script type="text/ng-template" id="settings.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.editaccount')}}
            <div class="clearfix"></div>
          </div><h4>{{trans('dashboard.eventdetails')}}</h4>      
          <hr />
          <form class="form-horizontal" role="form" data-ng-controller="settingsController">
          <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountname')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="account.name" ng-init= name="name" class="form-control" />
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="email">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountemail')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="account.email" name="email" class="form-control" />
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="company">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountcompany')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="account.company" name="company" class="form-control" />
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="age">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountage')}}
              </label>
              <div class="col-sm-5">
                <input  type="number" data-ng-model="account.age" name="age" class="form-control" />
              </div>
            </div>            
            <!--form field-->
            <div class="form-group" id="sex">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountsex')}}
              </label>
              <div class="col-sm-5">
                <select class="form-control" ng-model="account.sex" name="sex" id="sex">     
                  <option value="" selected>{{trans('pages.chooseSex')}}</option>
                  <option value="0">{{trans('pages.woman')}}</option>
                  <option value="1">{{trans('pages.man')}}</option>
                </select> 
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="location">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountlocation')}}
              </label>
              <div class="col-sm-3">
                <label>{{trans('pages.country')}}</label> <br/> 
                <select class="form-control" ng-model="account.country" name="country" id="country" required></select>
              </div>
              <div class="col-sm-3">
                <label>{{trans('pages.state')}}</label><br/> 
                <select class="form-control" ng-model="account.state" name="state" id="state" required></select>
              </div>
              <div class="col-sm-3">
                <label>{{trans('pages.city')}}</label> <br/> 
                <select class="form-control" ng-model="account.city" name="city" id="city" required></select>
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="description">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountdescription')}}
              </label>
              <div class="col-sm-5">
                <textarea rows="5" data-ng-model="account.description" name="description" class="form-control"></textarea>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <!--form field-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-4 "> 
                <button data-ng-click="editAccount()" class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
              </div>
            </div>
          </form>
        </div>
      </div>      
  </script>
</body>
</html>
@else
    <p>{{trans('pages.forbidden')}}</p>
@endif