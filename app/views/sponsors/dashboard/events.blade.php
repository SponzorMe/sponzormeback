<script type="text/ng-template" id="following.html">    
      <input type="hidden" ng-model="sponzors.current" ng-init="sponzors.current = {{ Session::get('userId') }}" /> 
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">      
        <div class="widget" >
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.youfollowing')}}
          </div>
          <div class="widget-body medium no-padding" style="height:550px" data-ng-controller="followingController"><!--Arreglar front end-->
            <rd-loading ng-show="followloading==1"></rd-loading>
            <div class="table-responsive" style="height:550px" ng-if="followloading==0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.OrganizerName')}}</th>
                    <th class="text-center">{{trans('dashboard.OrganizerEmail')}}</th>
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
                    <td class="text-center"><%s.eventlocation%></td>
                    <td class="text-center"><%s.event%></td>
                    <td class="text-center"><%s.kind%></td>
                    <td class="text-center" ng-if="s.eventstate == 0"><i class="fa fa-cog fa-spin" ng-class="icon"></i> {{trans('dashboard.eventPendingApprobation')}}</td>
                    <td class="text-center" ng-if="s.eventstate == 1"><i class="fa fa-cog fa-spin" ng-class="icon"></i><i class="fa fa-check">{{trans('dashboard.eventApprobed')}}</td>
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