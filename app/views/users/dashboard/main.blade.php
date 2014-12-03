  <!--Template asociado al dashboard principal-->
  <script type="text/ng-template" id="dashboard.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row" data-ng-controller="indicatorsController" ng-model="event.organizer" ng-init="event.organizer = {{ Session::get('userId') }}">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="widget">
          <div class="widget-body">
            <div class="widget-icon green pull-left">
              <i class="fa fa-users"></i>
            </div>
            <div class="widget-content pull-left">
              <div class="title"><%sponzors.size%></div>
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
              <div class="title" ><%eventos.size%></div>
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
              <div class="title">$<%sponzors.balance%></div>
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
              <div class="title"><%users.size%></div>
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
            <a href="#/events" class="pull-right">Manage</a>
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
            <div class="clearfix"></div>
          </div>
          <div class="widget-body" data-ng-controller="rssController">
            <div class="message" data-ng-repeat="r in rss">
              <h1 class="suggh1"><% r.title %></h1>
              <a href="<% r.link %>" target="_blank">{{trans('dashboard.seemore')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Main Content -->
  </script>