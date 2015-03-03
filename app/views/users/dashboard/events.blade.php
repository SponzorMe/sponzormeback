<!--Template asociado a los eventos-->
  <script type="text/ng-template" id="events.html">
    <div class="row">
      <div class="col-lg-4">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.addevent')}}
            <div class="clearfix"></div>
          </div>
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
                <div class="dropdown">
                    <a class="dropdown-toggle my-toggle-select" id="dLabel1"  role="button" data-toggle="dropdown" data-target="#" href="">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" id="starts" class="form-control" data-ng-model="newevent.starts">                        
                        </div>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <datetimepicker data-ng-model="newevent.starts" data-datetimepicker-config="{ dropdownSelector: '.my-toggle-select' }"></datetimepicker>
                    </ul>
                </div>                
              </div>
            </div>
            <div class="form-group" id="ends">
              <label for="label" class="col-sm-4 control-label">
                {{trans('dashboard.neweventends')}}
              </label>
              <div class="col-sm-7">
                <div class="dropdown">
                    <a class="dropdown-toggle my-toggle-select" id="dLabel2"  role="button" data-toggle="dropdown" data-target="#" href="">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" id="ends" class="form-control" data-ng-model="newevent.ends">                        
                        </div>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <datetimepicker data-ng-model="newevent.ends" data-datetimepicker-config="{ dropdownSelector: '.my-toggle-select' }"></datetimepicker>
                    </ul>
                </div>    
                <input type="hidden" data-ng-model="newevent.organizer" name="organizer" ng-init="newevent.organizer = event.organizer"/>
              </div>
            </div>
            <hr/>
            <!--form field-->
            <div class="form-group" id="public">
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
            <!-- Imagen -->
            <hr/>
            <div class="form-group" id="image">
                <div class="col-sm-12 ">
                  <input class="col-sm-6 " id="imageInput" type="file" ng-model="temp.image" nv-file-select uploader="uploader"/><br/>
                <div>                
            </div>
            <div class="clearfix"></div>
            <!-- End Imagen -->
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
            <div class="col-sm-3">
            <button class="btn btn-block btn-warning" ng-click="addsponzor()"> + Add</button>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <!--form field-->
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-3">
                <button data-ng-click="newEvent()" class="btn btn-block btn-primary">{{trans('dashboard.submitbutton')}} <i class="fa fa-play-circle-o"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      <div class="col-lg-8">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-tasks"></i> {{trans('dashboard.events')}}
            <a href="#/events" class="pull-right">{{trans('dashboard.manage')}}</a>
          </div>
          <div class="widget-body large no-padding">
            <div class="table-responsive">
              <table class="table table-striped">
              <thead>
                <th class="text-center">{{trans('dashboard.neweventtitle')}}</th>
                <th class="text-center">{{trans('dashboard.neweventlocation')}}</th>
                <th class="text-center">{{trans('dashboard.neweventstarts')}}</th>
                <th class="text-center">{{trans('dashboard.neweventends')}}</th>
                <th class="text-center">{{trans('dashboard.eventtype')}}</th>
                <th class="text-center">{{trans('dashboard.eventprivacy')}}</th>
                <th class="text-center">{{trans('dashboard.eventImage')}}</th>
                <th class="text-center"> {{trans('dashboard.actionssponzor')}}</th>
              </thead>
                <tbody>
                  <tr data-ng-repeat="e in eventos.list" data-ng-class="{success : event.current === e.id}">
                    <td class="text-center"><% e.title %></td>
                    <td class="text-center" style="width:20%"><% e.location %></td>
                    <td class="text-center"><% e.starts %></td>
                    <td class="text-center"><% e.ends %></td>
                    <td class="text-center"><% e.type %></td>
                    <td class="text-center"><% e.privacy %></td>
                    <td class="text-center"><a href="" ng-click="imageEvent(e.image)"><i class="fa fa-file-image-o"></i></a></td>
                    <td class="text-center">
                      <a href="{{URL::to('event/<% e.id %>')}}" target="_blank"><i class="fa fa-arrows-alt"></i></a> 
                      <a href="" ng-click="editEvent(e.id)"><i class="fa fa-edit"></i></a> 
                      <a href="" ng-click="removeEvent(e.id)"><i class="fa fa-trash-o"></i></a> 
                      <a href="" data-ng-click="event.current = e.id"><i class="fa fa-trophy" ng-show="event.current === e.id"></i></a> 
                      <a href="" data-ng-click="event.current = e.id"><i class="fa fa-trophy text-danger" ng-show="event.current != e.id"></i></a>
                      <a href="" ng-click="codeWidget(e.id)"><i class="fa fa-rocket"></i></i></a>  
                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br/>
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-trophy"></i> {{trans('dashboard.peak')}} <% peaks %>
            <div class="clearfix"></div>
          </div>
          <div class="widget-body medium no-padding">
            <div class="table-responsive">              
              <table class="table table-striped table-center"  ng-controller="peaksController">
                <thead>
                  <tr>
                    <th class="text-center">{{trans('dashboard.kind')}}</th>
                    <th class="text-center">{{trans('dashboard.quantity')}}</th>
                    <th class="text-center">${{trans('dashboard.usd')}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-show="loadingpeaks"><td colspan="3"><rd-loading ng-show="loadingpeaks"></rd-loading></td></tr>                  
                  <tr ng-show="!loadingpeaks" data-ng-repeat="p in peaks">
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
      </div>
  </script>
  <script type="text/ng-template" id="generalMessage.html">
  <div class="text-center">  
    <h3 data-ng-show="message == 'errorImage' ">{{trans('dashboard.errorAddingImage')}}</h3>
    <h3 data-ng-show="message == 'errorInFields' ">{{trans('dashboard.errorInNewEventFields')}}:<%text%></h3>
    <h3 data-ng-show="message == 'removeEvent' ">{{trans('dashboard.deleteEvent')}}</h3>
    <h3 data-ng-show="message == 'removeTodo' ">{{trans('dashboard.removeTodo')}}</h3>
    <h3 data-ng-show="message == 'errorInFieldsTask' ">{{trans('dashboard.errorInFieldsTask')}}</h3>
    <h3 data-ng-show="message == 'taskCreated' ">{{trans('dashboard.taskCreated')}}</h3>
  </div>
  <div class="ngdialog-buttons text-center">
    <button class="btn btn-danger" ng-click="closeThisDialog()"><i class="fa fa-times"></i> {{trans('dashboard.close')}}</button>
  </div>
</script>
<script type="text/ng-template" id="generalImage.html">
  <div class="text-center">
    <img src="{{asset('images/events/<% currentImage %>')}}" width="100%" />
  </div>
  <div class="ngdialog-buttons text-center">
    <button class="btn btn-danger" ng-click="closeThisDialog()"><i class="fa fa-times"></i> {{trans('dashboard.close')}}</button>
  </div>
</script>
<script type="text/ng-template" id="codeWidget.html">
  <div class="text-center">
  <h3>{{trans('dashboard.pasteSponzorsForm')}}</h3>
  <pre><xmp><object data="{{URL::to('form/event/<% eventId %>')}}" width="600" height="400">     <embed wmode="transparent" src="{{URL::to('form/event/<% eventId %>')}}" width="600" height="400" /> Error: Embedded data could not be displayed. </object></xmp></pre>    
  </div>
  <div class="ngdialog-buttons text-center">
    <button class="btn btn-danger" ng-click="closeThisDialog()"><i class="fa fa-times"></i> {{trans('dashboard.close')}}</button>
  </div>
</script>
<script type="text/ng-template" id="loading.html">
  <div class="text-center">
    <rd-loading></rd-loading>
    </div>
</script>