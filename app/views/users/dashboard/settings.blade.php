<!--Template asociado a los settings-->
<script type="text/ng-template" id="settings.html">
  <div class="row">
    <div class="col-lg-12">
      <div class="widget">
        <div class="widget-header">
          <i class="fa fa-plus"></i>{{trans('dashboard.editaccount')}}
          <div class="clearfix"></div>
        </div>
        <form class="form-horizontal" role="form">
        <!--form field-->
          <div class="form-group" id="name">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountname')}}
            </label>
            <div class="col-sm-5">
              <input  type="text" data-ng-model="account.name" name="name" class="form-control" />
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="email">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountemail')}}
            </label>
            <div class="col-sm-5">
              <input  type="text" data-ng-model="account.email" name="email" class="form-control" />
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="company">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountcompany')}}
            </label>
            <div class="col-sm-5">
              <input  type="text" data-ng-model="account.company" name="company" class="form-control" />
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="age">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountage')}}
            </label>
            <div class="col-sm-5">
              <input  type="number" data-ng-model="account.age" name="age" class="form-control" />
            </div>
          </div>            
          <!--form field-->
          <div class="form-group" id="sex">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountsex')}}
            </label>
            <div class="col-sm-5">
              <select class="form-control" ng-model="account.sex" name="sex" id="sex">     
                <option value="" selected>{{trans('pages.chooseSex')}}</option>
                <option value="0">{{trans('pages.woman')}}</option>
                <option value="1">{{trans('pages.man')}}</option>
              </select> 
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="location">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountlocation')}}
            </label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="#location" ng-model="account.location" ng-autocomplete="results2" details="details2" options="options2" name="location" ng-click="details2.reference=undefined; account.location=undefined;"/>
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="comunitySize">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.comunitySize')}}
            </label>
            <div class="col-sm-5">
              <input  type="number" data-ng-model="account.comunitySize" name="comunity_size" class="form-control" />
            </div>
          </div>
          <!--form field-->
          <div class="form-group" id="description">
            <label for="label" class="col-sm-2 control-label">
              {{trans('dashboard.editaccountdescription')}}
            </label>
            <div class="col-sm-5">
              <textarea rows="5" data-ng-model="account.description" name="description" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">

                <div class="col-sm-12">
                  <label class="col-sm-2 control-label" for="label">Imagen</label>
                  <div class="col-sm-5">
                    <div style="height:120px; wigth:120px;">
                       <img ng-src="<%account.image%>" style="border-radius:50%; height:120px; wigth:120px;"> 
                    </div>
                    <div style="margin:25px;">
                      <input type="file" id="imageInput" nv-file-select uploader="uploader"/>
                    </div>
                  </div>
                <div>               
            </div>
          <div class="clearfix"></div>
          <hr/>
          <!--form field-->
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-4 "> 
              <button data-ng-click="editAccount()" class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-lg-6">
      <div class="widget">
        <div class="widget-header">
          <i class="fa fa-plus"></i>{{trans('dashboard.eventbriteMessage')}}
          <div class="clearfix"></div>
        </div>
        <div class="widget-body medium" ng-if="account.eventbriteKey == ''">
        <p>{{trans('dashboard.eventbriteconnectaccounttest')}}</p>
          <div  class="text-center"><a class="btn btn-success" href='https://www.eventbrite.com/oauth/authorize?response_type=code&client_id={{Config::get("constants.evenbriteClientId")}}'>{{trans('dashboard.eventbriteButton')}}</a>
          </div>
        </div>
        <div class="widget-body large" ng-if="account.eventbriteKey != '' ">
          <h2>{{trans('dashboard.eventbriteEvents')}}</h2>
          <rd-loading ng-hide="account.loadingEventbrite"></rd-loading>
          <div class="table-responsive" ng-show="account.loadingEventbrite">
            <table class="table table-striped" data-ng-controller="eventsController">
              <thead>
                <th>{{trans('dashboard.title')}}</th>
                <th>{{trans('dashboard.location')}}</th>
                <th>{{trans('dashboard.starts')}}</th>
                <th>{{trans('dashboard.import')}}</th>
              </thead>
              <tbody>
                <tr data-ng-repeat="e in eventbriteevents.list">
                  <td><% e.name.text %></td>
                  <td><% e.venue.address.address_1 %>, <% e.venue.address.city %>, <% e.venue.address.region %></td>
                  <td><% e.start.local %></td>
                  <td><span class="text-success"><a class="btn btn-warning" data-ng-click="importFromEventbrite(e)"><i class="fa fa-check"></i>Import</a></span></td>
                </tr>
              </tbody>
            </table>               
            </div>
          <div ng-click="unconnectEventbrite()"  class="text-center">
            <button class="btn btn-primary">{{trans('dashboard.eventbriteButtonUnconnect')}}</button>
          </div>
        </div>
      </div>          
    </div>
    <div class="col-lg-6" ng-show="a">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.configureEventbriteImport')}}
            <div class="clearfix"></div>
          </div>
          <div class="widget-body large">
            <div  ng-include src="'eventbriteImport.html'" ng-controller="eventsController">
          </div>
        </div>
    </div>      
  </div>
  <!--
  /*Comentado hasta tener respuesta de meetup
  <div class="row">
    <div class="col-lg-6">
      <div class="widget">
        <div class="widget-header">
          <i class="fa fa-plus"></i>{{trans('dashboard.meetupMessage')}}
          <div class="clearfix"></div>
        </div>
        <div class="widget-body medium" ng-if="account.meetupRefreshKey == ''">
          <p>{{trans('dashboard.meetupconnectaccounttest')}}</p>
          <div  class="text-center">
          <a class="btn btn-danger" href='https://secure.meetup.com/oauth2/authorize?client_id={{Config::get("constants.meetupClientId")}}&response_type=code&redirect_uri={{Config::get("constants.meetupRedirectUrl")}}'>
          {{trans('dashboard.meetupButton')}}</a>
          </div>
        </div>
        <div class="widget-body medium" ng-if="account.meetupRefreshKey != ''">
          <rd-loading ng-hide="account.loadingGroupsMeetup"></rd-loading>
          <div  class="text-center">
            <select ng-init="meetupgroups.current=false" ng-model="meetupgroups.current" ng-show="account.loadingGroupsMeetup">
              <option value="false" selected="selected">{{trans('dashboard.chooseGroup')}}</option>
              <option ng-repeat="g in meetupgroups.list" value="<%g.group.id%>">
                <%g.group.name%>
              </option>
            </select>
            <div class="table-responsive" ng-show="account.loadingMeetupEvents">
              <table class="table table-striped" data-ng-controller="eventsController">
                <thead>
                  <th>{{trans('dashboard.title')}}</th>
                  <th>{{trans('dashboard.location')}}</th>
                  <th>{{trans('dashboard.starts')}}</th>
                  <th>{{trans('dashboard.import')}}</th>
                </thead>
                <tbody>
                  <tr data-ng-repeat="j in meetupevents.list">
                    <td><% j.name%></td>
                    <td><% j.venue.address_1 %>, <% j.venue.name %>. <% j.venue.city %></td>
                    <td>
                      <% j.dateStarts=(j.time | date:'yyyy-MM-dd') %>
                      <input type="hidden" value="<% j.dateEnds=(j.time+j.duration | date:'yyyy-MM-dd') %>" />
                    </td>
                    <td><span class="text-success">
                    <button class="btn btn-warning" ng-click="importFromMeetup(j)"><i class="fa fa-check"></i>Import</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="clearfix"></div>
            <button ng-click="unconnectMeetup()" class="btn btn-primary">
            {{trans('dashboard.eventbriteButtonUnconnect')}}</button>
          </div>
          </div>
        </div>          
      </div>
    </div>
    */-->
    <div class="col-lg-6" ng-show="b">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.configureMeetupImport')}}
            <div class="clearfix"></div>
          </div>
          <div class="widget-body large">
            <div  ng-include src="'eventbriteImport.html'" ng-controller="eventsController">
          </div>
        </div>
    </div>      
  </div>   
</script>
<script type="text/ng-template" id="successevent.html">
  <div class="text-center">
    <h3><% event.message %></h3>
  </div>
  <div class="ngdialog-buttons text-center">
    <button class="btn btn-danger" ng-click="closeThisDialog()"><i class="fa fa-times"></i> {{trans('dashboard.close')}}</button>
  </div>
</script>
<script type="text/ng-template" id="eventbriteImport.html"> 
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
</script>