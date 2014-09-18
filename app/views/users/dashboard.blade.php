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
  <script src="{{ asset('js/services/customizationService.js') }}"></script> <!-- load our service -->

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
          <a href="#/events">{{trans('dashboard.events')}} <span class="menu-icon fa fa-table"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.settings')}}<span class="menu-icon fa fa-tasks"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.sponzors')}} <span class="menu-icon fa fa-cogs"></span></a>
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
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="#">
                      Account
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="#">
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

  <script type="text/ng-template" id="dashboard.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="widget">
          <div class="widget-body">
            <div class="widget-icon green pull-left">
              <i class="fa fa-users"></i>
            </div>
            <div class="widget-content pull-left">
              <div class="title">80</div>
              <div class="comment">{{trans('dashboard.sponzors')}}</div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="widget">
          <div class="widget-body">
            <div class="widget-icon red pull-left">
              <i class="fa fa-tasks"></i>
            </div>
            <div class="widget-content pull-left">
              <div class="title">16</div>
              <div class="comment">{{trans('dashboard.events')}}</div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="widget">
          <div class="widget-body">
            <div class="widget-icon orange pull-left">
              <i class="fa fa-sitemap"></i>
            </div>
            <div class="widget-content pull-left">
              <div class="title">$225</div>
              <div class="comment">{{trans('dashboard.balance')}}</div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="spacer visible-xs"></div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="widget">
          <div class="widget-body">
            <div class="widget-icon blue pull-left">
              <i class="fa fa-support"></i>
            </div>
            <div class="widget-content pull-left">
              <div class="title">62</div>
              <div class="comment">{{trans('dashboard.comunity')}}</div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.events')}}
            <a href="#" class="pull-right">Manage</a>
          </div>

          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" data-ng-controller="eventsController">
              <thead>
                <th>Title</th>
                <th>Location</th>
                <th>Starts</th>
                <th>Peaks</th>
              </thead>
                <tbody>
                  <tr data-ng-repeat="e in eventos.list" data-ng-class="{success : event.current === e.id , djlaksdkasd : event.current != e.id}">
                    <td><% e.title %></td>
                    <td><% e.location %></td>
                    <td><% e.starts %></td>
                    <td><span class="text-success"><a href="#" data-ng-click="event.current = e.id"><i class="fa fa-check"></i></a></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-users"></i> {{trans('dashboard.peak')}} <% peaks %>
            <div class="clearfix"></div>
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              
              <table class="table table-striped"  ng-controller="peaksController">
                <thead>
                  <tr>
                    <th class="text-center">Kind</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">$USD</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-ng-repeat="p in peaks">
                    <td class="text-center"><% p.kind %></td>
                    <td class="text-center"><% p.quantity %></td>
                    <td class="text-center"><% p.usd %></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i> {{trans('dashboard.suggestions')}}
            <button class="btn btn-sm btn-info pull-right">{{trans('dashboard.buttonsugestions')}}</button>
            <div class="clearfix"></div>
          </div>
          <div class="widget-body">
            <div class="message">
              This is a standard message which will also work the ".no-padding" class, I can also <span class="error">be an error message!</span>
            </div>
            <hr />
            <div class="message">
              <a href="http://angular-ui.github.io/bootstrap/" target="_blank">UI Bootstrap</a> is included, so you can use <a href="#" tooltip="I'm a tooltip!">tooltips</a> and all of the other native Bootstrap JS components!
            </div>
            <hr/>
          </div>
        </div>
      </div>
    </div>
    <!-- End Main Content -->
  </script>
  <script type="text/ng-template" id="events.html">
    <div class="row">
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.addevent')}}
            <div class="clearfix"></div>
          </div><h4>{{trans('dashboard.eventdetails')}}</h4>      
          <hr />
          <form class="form-horizontal" role="form" data-ng-submit="newEvent()">
          <!--form field-->
            <div class="form-group" id="title">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.neweventtitle')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="newevent.title" name="title" class="form-control" />
              </div>
              <div class="col-sm-5">
                <div class="input-mask">{{trans('dashboard.neweventtitledescription')}}</div>
              </div>
            </div>
           <!--form field-->
            <div class="form-group" id="location">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.neweventlocation')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="newevent.location" name="location" class="form-control" />
              </div>
              <div class="col-sm-5">
                <div class="input-mask">{{trans('dashboard.neweventlocationdescription')}}</div>
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="description">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.neweventdescription')}}
              </label>
              <div class="col-sm-7">
                <textarea rows="5" data-ng-model="newevent.description" name="description" class="form-control"></textarea>
              </div>
              <div class="col-sm-3">
                <div class="input-mask">{{trans('dashboard.neweventdescriptiondescription')}}</div>
              </div>
            </div>
            <!--form field-->
            <div class="form-group col-sm-6" id="starts">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventstarts')}}
              </label>
              <div class="col-sm-8">
                <input  type="date" data-ng-model="newevent.starts" name="starts" class="form-control" />
              </div>
            </div>
            <div class="form-group col-sm-6 " id="ends">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventends')}}
              </label>
              <div class="col-sm-8">
                <input  type="date" data-ng-model="newevent.ends" name="ends" class="form-control" />
                <input type="hidden" name="organizer" value="1"/>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <!--form field-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-4 ">
                <button class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.events')}}
            <a href="#" class="pull-right">Manage</a>
          </div>

          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" data-ng-controller="eventsController">
              <thead>
                <th>Title</th>
                <th>Location</th>
                <th>Starts</th>
                <th>Peaks</th>
              </thead>
                <tbody>
                  <tr data-ng-repeat="e in eventos.list" data-ng-class="{success : event.current === e.id , djlaksdkasd : event.current != e.id}">
                    <td><% e.title %></td>
                    <td><% e.location %></td>
                    <td><% e.starts %></td>
                    <td><span class="text-success"><a href="#" data-ng-click="event.current = e.id"><i class="fa fa-check"></i></a></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-cog fa-spin"></i> Loading Directive
            <a href="http://tobiasahlin.com/spinkit/" target="_blank" class="pull-right">SpinKit</a>
          </div>
          <div class="widget-body">
            <!-- Check out the Angular Directive inside bootstrap.js! -->
            <rd-loading></rd-loading>
          </div>
        </div>
      </div>
    </div>
  </script>
</body>
</html>
@else
    <p>{{trans('pages.forbidden')}}</p>
@endif
