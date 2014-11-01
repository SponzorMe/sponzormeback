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
  <link rel="stylesheet" href="{{ asset('css/ngDialog.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('css/ngDialog-theme-default.min.css')}}"/>
  <!-- SCRIPTS -->
  <script src="{{ asset('js/jquery-2.0.2.min.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular/angular.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-cookies/angular-cookies.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-bootstrap/ui-bootstrap.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-bootstrap/ui-bootstrap-tpls.js')}}"></script>
  <script src="{{ asset('dashboard/lib/angular-ui-router/angular-ui-router.js')}}"></script>  
  <script src="{{ asset('js/ngDialog.min.js')}}"></script>
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
        <li class="sidebar-title"><span>{{trans('dashboard.navigation')}}</span></li>
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
                    <a href="#">
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
  <!--Template asociado al dashboard principal-->
  <script type="text/ng-template" id="dashboard.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1  ">
        <h1>{{trans('dashboard.searchtitle')}}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 " data-ng-controller="searchController">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-search"></i>
            <input type="text" value="" id="search" data-ng-model="search1" />
            <button data-ng-click="searchEvents()" class="btn btn-info">Search</button>
          </div>
          <div class="widget-body large no-padding" >
            <div data-ng-repeat="s in search.list" class="col-lg-5 col-lg-offset-1 evento">
              <div class="pull-left"><img class="organizer-image img-circle" src="{{asset('images/users/user.png')}}" alt="User"></div>
              <div class="info-event">
                <div class=""><h1><% s.title %></h1></div>
                <div class=""><% s.location %></div>
                <div class=""><% s.email %></div>   
                <div class="">
                <span class="text-success"><a href="#" data-ng-click="openDialog($index)"><i class="fa fa-check">
                  </i>Sponzor</a></span>                  
                </div>
              </div>        
            </div>
          </div>
        </div>
      </div>
    </div>
  </script>
  <!--Template asociado a los eventos-->
  <script type="text/ng-template" id="following.html">    
      <input type="hidden" ng-model="sponzors.current" ng-init="sponzors.current = {{ Session::get('userId') }}" /> 
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">      
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.youfollowing')}}
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" data-ng-controller="followingController">
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.name')}}</th>
                    <th class="text-center">{{trans('dashboard.email')}}</th>
                    <th class="text-center">{{trans('dashboard.location')}}</th>
                    <th class="text-center">{{trans('dashboard.eventtitle')}}</th>
                    <th class="text-center">{{trans('dashboard.sponzoring')}} type</th>
                    <th class="text-center">{{trans('dashboard.state')}}</th>
                    <th class="text-center">{{trans('dashboard.options')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-ng-repeat="s in sponzors.list" >
                    <td class="text-center"><%s.name%></td>
                    <td class="text-center"><%s.email%></td>
                    <td class="text-center"><%s.city%>, <% s.state %>, <% s.country %></td>
                    <td class="text-center"><%s.event%></td>
                    <td class="text-center"><%s.kind%></td>
                    <td class="text-center"><%s.eventstate%></td>
                    <td class="text-center">
                      <a href="" ng-click="removeRelSponzorPeak(s.idRelSponzoring)"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </script>
  <!--Template asociado a los sponzors-->
  <script type="text/ng-template" id="sponzoring.html">
      <input type="hidden" ng-model="sponzors.current" ng-init="sponzors.current = {{ Session::get('userId') }}" /> 
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">      
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.yousponzring')}}
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" data-ng-controller="sponzoringController">
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.name')}}</th>
                    <th class="text-center">{{trans('dashboard.email')}}</th>
                    <th class="text-center">{{trans('dashboard.location')}}</th>
                    <th class="text-center">{{trans('dashboard.eventtitle')}}</th>
                    <th class="text-center">{{trans('dashboard.sponzoring')}} type</th>
                    <th class="text-center">{{trans('dashboard.state')}}</th>
                    <th class="text-center">{{trans('dashboard.options')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-ng-repeat="s in sponzors.list" >
                    <td class="text-center"><%s.name%></td>
                    <td class="text-center"><%s.email%></td>
                    <td class="text-center"><%s.city%>, <% s.state %>, <% s.country %></td>
                    <td class="text-center"><%s.event%></td>
                    <td class="text-center"><%s.kind%></td>
                    <td class="text-center"><%s.eventstate%></td>
                    <td class="text-center">
                      <a href="" ng-click="removeRelSponzorPeak(s.idRelSponzoring)"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
          </div>
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
                <input type="text" class="form-control" ng-model="account.country" name="country"/>
              </div>
              <div class="col-sm-3">
                <label>{{trans('pages.state')}}</label><br/> 
                <input type="text" class="form-control" ng-model="account.state" name="state"/>
              </div>
              <div class="col-sm-3">
                <label>{{trans('pages.city')}}</label> <br/> 
                 <input type="text" class="form-control" ng-model="account.city" name="city"/>
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
  <script type="text/ng-template" id="peaksDialog.html">
    <div class="text-center">
    <h3><% search.current.title %></h3>
    <h4>{{trans('dashboard.by')}}: <span ng-if="search.current.name == null || search.current.name == ''" %><%search.current.email%></span>
      <span ng-if="search.current.name != null"><%search.current.name%></span>
    </h4>
      <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.kind')}}</th>
                    <th class="text-center">{{trans('dashboard.quantity')}}</th>
                    <th class="text-center">${{trans('dashboard.usd')}}</th>
                    <th class="text-center">{{trans('dashboard.sponzor?')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-ng-repeat="p in peaks">
                    <td class="text-center"><% p.kind %></td>
                    <td class="text-center"><% p.quantity %></td>
                    <td class="text-center"><% p.usd %></td>
                    <td class="text-center"><button class="btn btn-primary" type="button" ng-click="sponzor(p.id,{{ Session::get('userId') }} )">Yes!</button>
                  </td>
                  </tr>
                </tbody>
              </table>
      </div>
    <div class="ngdialog-buttons text-center">
      <button class="btn btn-danger" ng-click="closeThisDialog()"><i class="fa fa-times"></i> {{trans('dashboard.close')}}</button>
    </div>
</script>
</body>
</html>
@else
    <p>{{trans('pages.forbidden')}}</p>
@endif