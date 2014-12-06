<!--Template asociado a los eventos-->
  <script type="text/ng-template" id="events.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
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
                <input  type="text" data-ng-model="newevent.location" ng-autocomplete="results3" details="details3" options="options3" placeholder="{{trans('dashboard.neweventlocationdescription')}}" name="location" class="form-control" />
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
      <div class="col-lg-8">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.events')}}
            <a href="#/events" class="pull-right">{{trans('dashboard.manage')}}</a>
          </div>

          <div class="widget-body medium no-padding">
            <div class="table-responsive">
              <table class="table table-striped">
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
  </script>