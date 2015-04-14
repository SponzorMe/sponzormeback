<!--Template asociado al dashboard principal-->
  <script type="text/ng-template" id="dashboard.html">
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
            <input type="text" value="" id="search" data-ng-model="search1" ng-keyup="$event.keyCode == 13 && searchEvents()" />
            <button data-ng-click="searchEvents()" class="btn btn-info">Search</button>
          </div>
          <div class="widget-body large no-padding" style="height:500px"><!--fronend arregla-->
            <rd-loading ng-show="searchloading==1"></rd-loading>
            <div ng-if="searchloading==0" data-ng-repeat="s in search.list" class="col-lg-5 col-lg-offset-1 evento" style="height:200px"><!--fronend arregla-->
              <div class="pull-left"><img class="organizer-image img-square" src="{{asset('images/events/<% s.eventimage %>')}}" alt="User"></div>
              <div class="info-event">
                <div class=""><h1><a href="{{URL::to('event/<% s.event %>')}}" target="_blank"><% s.title %></a></h1></div>
                <div class=""><% s.eventlocation %></div>
                <div class=""><% s.email %></div>
                <div class=""><a class="btn btn-success" href="" data-ng-click="openDialog($index)"><i class="fa fa-money"></i> Sponzor</a>
              </div>        
            </div>
          </div>
        </div>
      </div>
    </div>
  </script>
  <script type="text/ng-template" id="loading.html">
  <div class="text-center">
    <rd-loading></rd-loading>
    </div>
</script>