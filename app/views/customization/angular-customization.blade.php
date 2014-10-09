@if(Session::get('email')!="" || Session::get('email')!=NULL)
<div class="container" ng-app="customizationApp" ng-controller="mainController">
<!--Step 1, the user choose the age, sex, and location --> 
<div class="col-md-7 col-md-offset-2 step1" id="step1">
	<form ng-submit="submitUserInfo()">		
	<h1>{{trans('pages.aboutyou')}}</h1>
	<div class="form-inline">
		<div class="form-group">
			<label for="age">{{trans('pages.ageiam')}} </label> <input type="number" class="form-control" min="18" max="120" name="age" ng-model="userData.age" id="age" value="43" required/></div> <div class="form-group"><label for="sex"> {{trans('pages.old')}}</label>
		<select class="form-control" ng-model="userData.sex" name="sex" id="sex">			
			<option value="" selected>{{trans('pages.chooseSex')}}</option>
			<option value="0">{{trans('pages.woman')}}</option>
			<option value="1">{{trans('pages.man')}}</option>
		</select> </div> <label for="country"> {{trans('pages.livein')}}</label>
		</div>
		<input type="hidden" id="userId" value="{{ Session::get('userId') }}" required/>
		<div class="form-inline">
			<div class="form-group">
				<label>{{trans('pages.country')}}</label> <br/> 
				<select class="form-control" ng-model="userData.country" name="country" id="country" required></select>
			</div>
			<div class="form-group">
				<label>{{trans('pages.state')}}</label><br/> 
				<select class="form-control" ng-model="userData.state" name="state" id="state" required></select>
			</div>
		</div>
		<div class="form-inline">
			<div class="form-group">
				<label>{{trans('pages.city')}}</label> <br/> 
				<select class="form-control" ng-model="userData.city" name="city" id="city" required></select>
			</div>
		</div>
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-danger btn-lg">{{trans('pages.next')}}</button>
		</div>		
	</form>
	</div>
	<!--Step 2, the user choose the categories and the interests --> 
	<div class="col-md-8 col-md-offset-2 step1" id="step2">
		<form ng-submit="submitCategoryInfo()">
			<h1>{{trans('pages.areyouinterested')}}</h1>
			<div class="row contenedor-intereses">
				<div id="c<% category.id %>" class="col-md-3 category" ng-hide="loading" ng-repeat="category in categories">
						<a href="#" ng-click="showInterests(category.id)">
							<% category.title %>						
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
				</div>
			</div>
			<div class="col-md-12" id="step3">
				<div class="row contenedor-categorias">
					
					<div class="interest col-md-4" ng-repeat="interest in interests">
						<label>
							<input type="checkbox" id="interest<% interest.idinterests %>" data-ng-model='_interests[interest.idinterests]' name="interest[]" value="<% interest.idinterests %>" data-ng-click="toggle(interest.idinterests)" data-ng-true-value="1" data-ng-false-value="0" /> 
	    					<% interest.name %>
  						</label>
					</div>
				</div>
			</div>			
			<div class="form-group">
				<button type="submit" class="btn btn-danger btn-lg">{{trans('pages.next')}}</button>
			</div>
		</form>
	</div>
	<div class="col-md-8 col-md-offset-2 step1" id="step4">
		<h1>{{trans('pages.almostdone')}}</h1>
		<p>{{trans('pages.weresendingandemail')}} {{ Session::get('email') }} {{trans('pages.toactivateyouraccount')}}.</p>
	</div>
</div>
</div>
@else
	<p>{{trans('pages.forbidden')}}</p>
@endif