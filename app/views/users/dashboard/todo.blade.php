<!--Template asociado a hacer todos sobre eventos-->
<script type="text/ng-template" id="todo.html">
    <div class="row">
      <div class="col-lg-12">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.todo')}}
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal" role="form" data-ng-controller="todoController">
          <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.todoEvent')}}
              </label>
              <div class="col-sm-5">
             	<select ng-model="todo.event" ng-options="event.title for event in events"  ng-change="updatePeak()">
      				<option value="">-- {{trans("dashboard.chooseEvent")}} --</option>
    			</select>
              </div>
            </div>    
            <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.todoPeak')}}
              </label>
              <div class="col-sm-5">
                <select ng-model="todo.peak" ng-options="peak as peak.kind +' - $' + peak.usd + ' USD' for peak in peaks" ng-change="updateTodos()" >
      				<option value="">-- {{trans("dashboard.choosepeak")}} --</option>
    			</select>
              </div>
            </div>
          <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.todoTitle')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="todo.title" name="title" class="form-control" />
              </div>
            </div>            
            <!--form field-->
            <div class="form-group" id="description">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.todoDescription')}}
              </label>
              <div class="col-sm-5">
                <textarea rows="5" data-ng-model="todo.description" name="message" class="form-control"></textarea>
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
      <!-- A partir de aca se muestran las notas de acuerdo al peak y al sponzor seleccionado -->
      <div class="row" data-ng-controller="todoController">
      <div class="col-lg-12">
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
                <th>{{trans('dashboard.todoActions')}}</th>
              </thead>
              <tbody>
                <tr data-ng-repeat="t in todo.list ">
                  <td><% t.title %></td>
                  <td><% t.description %></td>
                  <td>
                    <span class="text-success">
                  		<a href="" ng-click="removeTodo(t.id)">
                        <i class="fa fa-trash-o"></i>
                      </a>
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