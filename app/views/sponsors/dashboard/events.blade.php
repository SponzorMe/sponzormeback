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