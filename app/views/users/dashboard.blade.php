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
          <a href="#">{{trans('dashboard.account')}}<span class="menu-icon fa fa-tachometer"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/tables">{{trans('dashboard.addevent')}} <span class="menu-icon fa fa-table"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.seesponzors')}}<span class="menu-icon fa fa-tasks"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#">{{trans('dashboard.logout')}} <span class="menu-icon fa fa-cogs"></span></a>
        </li>
      </ul>
      <div class="sidebar-footer">
        <div class="col-xs-4">
          <a href="https://github.com/Ehesp/Responsive-Dashboard" target="_blank">
            Github
          </a>
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
              <div class="comment">Users</div>
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
              <div class="comment">Servers</div>
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
              <div class="title">225</div>
              <div class="comment">Documents</div>
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
              <div class="comment">Tickets</div>
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
            <i class="fa fa-tasks"></i> Events
            <a href="#" class="pull-right">Manage</a>
          </div>

          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table">
              caca = <% caca %>
              <thead>
              <th>Title</th><th>Location</th><th>Starts</th></th></th>
              </thead>
                <tbody>
                  <tr ng-repeat="test in e">
                    <td><% e.title %></td><td><% e.location %></td><% e.starts %></td>
                    <td><span class="text-success"><i class="fa fa-check"></i></span></td>
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
            <i class="fa fa-users"></i> Users
            <input type="text" placeholder="Search" class="form-control input-sm pull-right" />
            <div class="clearfix"></div>
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr><th class="text-center">ID</th><th>Username</th><th>Role</th><th>Account</th></tr>
                </thead>
                <tbody>
                  <tr><td class="text-center">1</td><td>Joe Bloggs</td><td>Super Admin</td><td>AZ23045</td></tr>
                  <tr><td class="text-center">2</td><td>Timothy Hernandez</td><td>Admin</td><td>AU24783</td></tr>
                  <tr><td class="text-center">3</td><td>Joe Bickham</td><td>User</td><td>AM23781</td></tr>
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
            <i class="fa fa-plus"></i> Extras
            <button class="btn btn-sm btn-info pull-right">Button</button>
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

            <hr />

            <form class="form-horizontal" role="form">
              <div class="form-group has-feedback has-success">
                <label for="label" class="col-sm-2 control-label">Inline Form</label>
                <div class="col-sm-5">
                  <input  type="text" class="form-control" />
                    <span class="fa fa-key form-control-feedback"></span>
                </div>
                <div class="col-sm-5">
                  <div class="input-mask">I am an input mask!</div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
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
    <!-- End Main Content -->
  </script>
</body>
</html>
@else
    <p>{{trans('pages.forbidden')}}</p>
@endif