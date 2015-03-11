<!--Template asociado a los sponzors-->
<script type="text/ng-template" id="sponzoring.html">
<input type="hidden" ng-model="sponzors.current" ng-init="sponzors.current = {{ Session::get('userId') }}" /> 
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="widget">
        <div class="widget-header">
          <i class="fa fa-tasks"></i> {{trans('dashboard.yousponzring')}}
        </div>
        <div class="widget-body medium no-padding" data-ng-controller="sponzoringController">
          <div class="table-responsive">
            <rd-loading ng-show="sponzoringEventsloading==1"></rd-loading>
            <table class="table table-striped" ng-if="sponzoringEventsloading==0">
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
                  <td class="text-center"><%s.eventlocation%></td>
                  <td class="text-center"><%s.event%></td>
                  <td class="text-center"><%s.kind%></td>
                  <td class="text-center"><div ng-if="s.eventstate == 0">{{trans('dashboard.eventstate0')}}</div><div ng-if="s.eventstate == 1">{{trans('dashboard.eventstate1')}}</div></td>
                  <td class="text-center">
                    <a  href="" ng-if="s.eventstate == 1" ng-click="getTaskSponzorPeakSponzoring(s.idRelSponzoring,s.eventId,s.idpeak)">
                    <i class="fa fa-tasks"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- A partir de aca se muestran las notas de acuerdo al peak y al sponzor seleccionado -->
  <div class="row" data-ng-controller="sponzoringController">
    <div class="col-lg-5 col-lg-offset-1">
      <div class="widget">
        <div class="widget-header">
          <i class="fa fa-plus"></i>{{trans('dashboard.todosList')}}
          <div class="clearfix"></div>
        </div>
      <div class="widget-body medium no-padding">
        <div class="table-responsive">
        <rd-loading ng-show="todo.loadingTask==1"></rd-loading>
          <table class="table table-striped" ng-if="todo.loadingTask==0">
            <thead>
              <th>{{trans('dashboard.todoTitle')}}</th>
              <th>{{trans('dashboard.todoDescription')}}</th>
              <th>{{trans('dashboard.todoStatus')}}</th>
            </thead>
            <tbody>
              <tr data-ng-repeat="t in todo.list" ng-class="{success: t.status === 1, warning: t.status === 0}">
                <td><% t.title %></td>
                <td><% t.description %></td>
                <td><div ng-if="t.status == 0">{{trans('dashboard.eventstate0')}}</div><div ng-if="t.status == 1">{{trans('dashboard.eventstate1')}}</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- A partir de aca se muestran las notas de acuerdo al peak y al sponzor seleccionado -->
    <div class="row" data-ng-controller="sponzoringController">
      <div class="col-lg-5">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.todosListSponzor')}}
            <button ng-if="todo.currentRelPeak != 0" ng-click="createSponzorTask()" class="pull-right btn btn-primary"><i class="fa fa-plus"></i>{{trans('dashboard.addTodosListSponzor')}}</button>
            <div class="clearfix"></div>
          </div>
        <div class="widget-body medium no-padding">
          <div class="table-responsive">
          <rd-loading ng-show="todo.loadingTaskRel==1"></rd-loading>
            <table class="table table-striped" ng-if="todo.loadingTaskRel==0">
              <thead>
                <th>{{trans('dashboard.todoTitle')}}</th>
                <th>{{trans('dashboard.todoDescription')}}</th>
                <th>{{trans('dashboard.todoStatus')}}</th>
                <th>{{trans('dashboard.todoActions')}}</th>
              </thead>
              <tbody>
                <tr data-ng-repeat="t in todo.listSponzor" ng-class="{success: t.status === 1, warning: t.status === 0}">
                  <td><% t.title %></td>
                  <td><% t.description %></td>
                  <td><div ng-if="t.status == 0">{{trans('dashboard.eventstate0')}}</div><div ng-if="t.status == 1">{{trans('dashboard.eventstate1')}}</div></td>
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
</script>
<script type="text/ng-template" id="createSponzorTodo.html">
  <div class="row">
    <div class="col-lg-12">
      <div class="widget">
        <form class="form-horizontal" role="form" data-ng-controller="sponzoringController">
          <div class="form-group" id="name">
            <label for="label" class="col-sm-5 control-label">
              {{trans('dashboard.todoTitle')}}
            </label>
            <div class="col-sm-7">
              <input  type="text" data-ng-model="todo.title" name="title" class="form-control" />
            </div>
          </div>            
          <!--form field-->
          <div class="form-group" id="description">
            <label for="label" class="col-sm-5 control-label">
              {{trans('dashboard.todoDescription')}}
            </label>
            <div class="col-sm-7">
              <textarea rows="7" data-ng-model="todo.description" name="message" class="form-control"></textarea>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <!--form field-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-4 "> 
              <button data-ng-click="addTodo()" class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</script>