<!--Template asociado a invitar a un amigo-->
  <script type="text/ng-template" id="friend.html">
<div class="row">
  <div class="col-lg-12">
    <div class="widget">
      <div class="widget-header">
        <i class="fa fa-plus"></i>{{trans('dashboard.invitefriend')}}
        <div class="clearfix"></div>
      </div>
      <form class="form-horizontal" role="form" data-ng-controller="friendController">
      <!--form field-->
        <div class="form-group" id="name">
          <label for="label" class="col-sm-2 control-label">
            {{trans('dashboard.friendemail')}}
          </label>
          <div class="col-sm-5">
            <input  type="email" data-ng-model="friend.email" ng-init= name="email" class="form-control" />
          </div>
        </div>            
        <!--form field-->
        <div class="form-group" id="description">
          <label for="label" class="col-sm-2 control-label">
            {{trans('dashboard.friendmessage')}}
          </label>
          <div class="col-sm-5">
            <textarea rows="5" data-ng-model="friend.message" name="message" class="form-control"></textarea>
          </div>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <!--form field-->
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-4 "> 
            <button data-ng-click="invitefriend()" class="btn btn-info">{{trans('dashboard.submitbutton')}}</button>
          </div>
        </div>
      </form>
    </div>
</div>      
  </script>