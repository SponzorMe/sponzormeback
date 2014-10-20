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
  <script src="{{ asset('js/angular-sanitize.min.js')}}"></script>
  <script src="{{ asset('dashboard/js/dashboard.js')}}"></script><!--script principal-->
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
                <th>{{trans('dashboard.title')}}</th>
                <th>{{trans('dashboard.location')}}</th>
                <th>{{trans('dashboard.starts')}}</th>
                <th>{{trans('dashboard.perks')}}</th>
              </thead>
                <tbody>
                  <tr data-ng-repeat="e in eventos.list" data-ng-class="{success : event.current === e.id}">
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
                    <th class="text-center">{{trans('dashboard.kind')}}</th>
                    <th class="text-center">{{trans('dashboard.quantity')}}</th>
                    <th class="text-center">${{trans('dashboard.usd')}}</th>
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
          <div class="widget-body" data-ng-controller="rssController">
            <div class="message" data-ng-repeat="r in rss">
              <h1><% r.title %></h1>
              <a href="<% r.link %>" target="_blank">{{trans('dashboard.seemore')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Main Content -->
  </script>
  <!--Template asociado a los eventos-->
  <script type="text/ng-template" id="events.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.addevent')}}
            <div class="clearfix"></div>
          </div>
          <h4 class="h4formdash">{{trans('dashboard.eventdetails')}}</h4>      
          <hr />
          <form class="form-horizontal" role="form">
          <!--form field-->
            <div class="form-group" id="title">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventtitle')}}
              </label>
              <div class="col-sm-7">
                <input  type="text" data-ng-model="newevent.title" placeholder="{{trans('dashboard.neweventtitledescription')}}" name="title" class="form-control" />
              </div><br/><br/>
            </div>
           <!--form field-->
            <div class="form-group" id="location">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventlocation')}}
              </label>
              <div class="col-sm-7">
                <input  type="text" data-ng-model="newevent.location" placeholder="{{trans('dashboard.neweventlocationdescription')}}" name="location" class="form-control" />
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="description">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventdescription')}}
              </label>
              <div class="col-sm-7">
                <textarea rows="5" data-ng-model="newevent.description" placeholder="{{trans('dashboard.neweventdescriptiondescription')}}" name="description" class="form-control"></textarea>
              </div>
            </div>
            <!--form field-->
            <div class="form-group" id="starts">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventstarts')}}
              </label>
              <div class="col-sm-7">
                <input  type="date" data-ng-model="newevent.starts" name="starts" class="form-control" />
              </div>
            </div>
            <div class="form-group" id="ends">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventends')}}
              </label>
              <div class="col-sm-7">
                <input  type="date" data-ng-model="newevent.ends" name="ends" class="form-control" />
                <input type="hidden" data-ng-model="newevent.organizer" name="organizer" ng-init="newevent.organizer = {{ Session::get('userId') }}"/>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <h4 class="h4formdash">{{trans('dashboard.eventaditionalseetings')}}</h4>  
            <hr/>
            <!--form field-->
            <div class="form-group" id="public">
              <div class="col-sm-11">
                <h5 class="h4formdash">{{trans('dashboard.neweventprivacy')}}</h5>
              </div>
              <div class="col-sm-4 control-label">
                  <input id="privacy0"  type="radio" data-ng-model="newevent.privacy" name="privacy" value="0" /> 
              </div>  
                  <label for="privacy0" class="col-sm-7">
                    <strong>{{trans('dashboard.privacyoption0')}} :  </strong>                   
                 
                  {{trans('dashboard.privacydescription0')}} </label>

              <div class="col-sm-4 control-label">
                  <input id="privacy1" type="radio" data-ng-model="newevent.privacy" name="privacy" value="1" />   
              </div>

                <label for="privacy1" class="col-sm-7">
                    <strong>{{trans('dashboard.privacyoption1')}} :  </strong>                   
                  
                  {{trans('dashboard.privacydescription1')}}</label>
            </div>
            <!--form field-->
            <div class="form-group" id="type">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventtype')}}
              </label>
              <div class="col-sm-7">
                <select ng-model="newevent.type" name="type" class="form-control">
                  <option value="">{{trans('dashboard.choosetype')}}</option>
                  <option data-ng-repeat="c in categorias.list" data-ng-value="c.id">
                    <%c.title%>
                  </option>                
                </select>
              </div>
            </div>
            <hr/>
            <div class="clearfix"></div>
            <h4 class="h4formdash">{{trans('dashboard.eventsponzors')}}</h4>  
            <hr/>
            <!--form field-->            
            <div class="table-responsive">              
              <table class="table table-striped">
                <thead>
                  <th class="text-center">
                    {{trans('dashboard.typesponzor')}}
                  </th>
                  <th class="text-center">
                    {{trans('dashboard.quantitysponzor')}}
                  </th>
                  <th class="text-center">
                    {{trans('dashboard.pricesponzor')}}
                  </th>
                  <th class="text-center">
                    {{trans('dashboard.actionssponzor')}}
                  </th>              
                </thead>
                <tr ng-repeat="s in sponzors" data-ng-show="sponzors.length">
                  <td class="text-center">
                    <input type="text" class="form-control" placeholder="" ng-model="s.kind" />
                  </td>   
                  <td class="text-center">
                    <input type="text" class="form-control" placeholder="" ng-model="s.quantity" />
                  </td>
                  <td class="text-center">
                    <input type="text" class="form-control" placeholder="" ng-model="s.usd" />
                  </td>
                  <td class="text-center">
                    <a href="" ng-click="removeSponzor($index)"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-4">
            <button class="btn btn-block" ng-click="addsponzor()"> + Add</button>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <!--form field-->
            <div class="form-group">
              <div class="col-sm-12">
                <button data-ng-click="newEvent()" class="btn btn-block">{{trans('dashboard.submitbutton')}}</button>
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
                <th class="text-center">{{trans('dashboard.neweventtitle')}}</th>
                <th class="text-center">{{trans('dashboard.neweventlocation')}}</th>
                <th class="text-center">{{trans('dashboard.neweventstarts')}}</th>
                <th class="text-center">{{trans('dashboard.neweventends')}}</th>
                <th class="text-center">{{trans('dashboard.neweventdescription')}}</th>
                <th class="text-center">{{trans('dashboard.eventtype')}}</th>
                <th class="text-center">{{trans('dashboard.eventprivacy')}}</th>
                <th class="text-center"> {{trans('dashboard.actionssponzor')}}</th>
              </thead>
                <tbody>
                  <tr data-ng-repeat="e in eventos.list" data-ng-class="{success : event.current === e.id}">
                    <td class="text-center"><% e.title %></td>
                    <td class="text-center"><% e.location %></td>
                    <td class="text-center"><% e.starts %></td>
                    <td class="text-center"><% e.ends %></td>
                    <td class="text-center"><% e.description %></td>
                    <td class="text-center"><% e.type %></td>
                    <td class="text-center"><% e.privacy %></td>
                    <td class="text-center">
                      <a href="" ng-click="removeEvent(e.id)"><i class="fa fa-trash-o"></i></a>
                    </td>
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

  <!--Template asociado a los sponzors-->
  <script type="text/ng-template" id="sponzors.html">
  <input type="hidden" ng-model="event.organizer" ng-init="event.organizer = {{ Session::get('userId') }}" /> 
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">      
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.sponzors')}}
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" data-ng-controller="sponzorsController">
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
                      <div style="display: inline-block">
                        <div ng-if="s.eventstate == 0"> 
                          <a  href="" ng-click="updateRelSponzorPeak(s.idRelSponzoring,1)"><i class="fa fa-star"></i></a>
                        </div>
                        <div ng-if="s.eventstate == 1"> 
                          <a  href="" ng-click="updateRelSponzorPeak(s.idRelSponzoring,0)"><i class="fa fa-star-o"></i></a>
                        </div>
                      </div>
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
   <!--Template asociado a invitar a un amigo-->
  <script type="text/ng-template" id="friend.html">
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
            <i class="fa fa-plus"></i>{{trans('dashboard.invitefriend')}}
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal" role="form" data-ng-controller="friendController">
          <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.friendemail')}}
              </label>
              <div class="col-sm-5">
                <input  type="email" data-ng-model="friend.email" ng-init= name="email" class="form-control" />
              </div>
            </div>            
            <!--form field-->
            <div class="form-group" id="description">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.friendmessage')}}
              </label>
              <div class="col-sm-5">
                <textarea rows="5" data-ng-model="friend.message" name="message" class="form-control"></textarea>
              </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <!--form field-->
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-4 "> 
                <button data-ng-click="invitefriend()" class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
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
