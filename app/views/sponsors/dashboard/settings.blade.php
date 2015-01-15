<!--Template asociado a los settings-->
  <script type="text/ng-template" id="settings.html">
    <div class="row alerts-container" data-ng-controller="AlertsCtrl" data-ng-show="alerts.length">
      <div class="col-xs-12">
        <alert data-ng-repeat="alert in alerts" type="<% alert.type %>" close="closeAlert($index)">
        <%alert.msg %></alert>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="widget">
          <div class="widget-header">
            <i class="fa fa-plus"></i>{{trans('dashboard.editaccount')}}
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal" role="form" data-ng-controller="settingsController">
          <!--form field-->
            <div class="form-group" id="name">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountname')}}
              </label>
              <div class="col-sm-5">
                <input  type="text" data-ng-model="account.name" ng-init= name="name" class="form-control" />
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
            <div class="form-group" id="description">
              <label for="label" class="col-sm-2 control-label">
                {{trans('dashboard.editaccountdescription')}}
              </label>
              <div class="col-sm-5">
                <textarea rows="5" data-ng-model="account.description" name="description" class="form-control"></textarea>
              </div>
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
  </script>