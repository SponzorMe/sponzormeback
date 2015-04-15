<!--Template asociado a los sponzors-->
  <script type="text/ng-template" id="sponzors.html">
    <div class="row" data-ng-controller="sponzorsController">
      <div class="col-lg-10 col-lg-offset-1">      
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.sponzors')}}
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped" >
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.name')}}</th>
                    <th class="text-center">{{trans('dashboard.email')}}</th>
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
                    <td class="text-center"><%s.event%></td>
                    <td class="text-center"><%s.kind%></td>
                    <td class="text-center"><div ng-if="s.eventstate == 0">{{trans('dashboard.eventstate0')}}</div><div ng-if="s.eventstate == 1">{{trans('dashboard.eventstate1')}}</div></td>
                    <td class="text-center">
                      <div style="display: inline-block">
                        <div ng-if="s.eventstate == 0"> 
                          <a  href="" ng-click="updateRelSponzorPeak(s.idRelSponzoring,1)"><i class="fa fa-star-o"></i></a>
                        </div>
                        <div ng-if="s.eventstate == 1"> 
                          <a  href="" ng-click="updateRelSponzorPeak(s.idRelSponzoring,0)"><i class="fa fa-star"></i></a>
                        </div>
                      </div>
                      <a  href="" ng-if="s.eventstate == 1" ng-click="getTaskSponzorPeak(s.idRelSponzoring)"><i class="fa fa-tasks"></i></a>
                      <a href="" ng-if="s.eventstate == 0" ng-click="removeRelSponzorPeak(s.idRelSponzoring)"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>

        <!-- A partir de aca se muestran las notas de acuerdo al peak y al sponzor seleccionado -->
      <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.todosList')}}
            <div class="clearfix"></div>
          </div>
        <div class="widget-body medium no-padding">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <th>{{trans('dashboard.todoTitle')}}</th>
                <th>{{trans('dashboard.todoDescription')}}</th>
                <th>{{trans('dashboard.todoStatus')}}</th>
                <th>{{trans('dashboard.todoActions')}}</th>
              </thead>
              <tbody>
                <tr data-ng-repeat="t in todo.list" ng-class="{success: t.status === 1, warning: t.status === 0}">
                  <td><% t.title %></td>
                  <td><% t.description %></td>
                  <td><div ng-if="t.status == 0">{{trans('dashboard.taskNoCompleted')}}</div><div ng-if="t.status == 1">{{trans('dashboard.taskCompleted')}}</div></td>
                  <td>
                    <span class="text-success">
                      <a href="" ng-if="t.status == 0" ng-click="updateStatusTaskSponzorPeak(t.idTS,1,t.sponzor_event_id)">
                      <i class="fa fa-check"></i></a>
                      <a href="" ng-if="t.status == 1" ng-click="updateStatusTaskSponzorPeak(t.idTS,0,t.sponzor_event_id)">
                      <i class="fa fa-times"></i></a>
                      <a href="" ng-click="removeTaskSponzorPeak(t.id,t.sponzor_event_id)">
                      <i class="fa fa-trash-o"></i></a>                      
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

      </div>
  </script>