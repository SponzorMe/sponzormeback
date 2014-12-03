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