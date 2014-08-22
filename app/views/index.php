<!-- app/views/index.php -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customization</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
	<!-- Styles for the customization -->
	<link rel="stylesheet" href="css/customstyles.css"> 
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="customizationApp" ng-controller="mainController2">
<div class="col-md-7 col-md-offset-2 step1" id="step1">
	<form ng-submit="submitUserInfo()">
	<h1>Algo Sobre ti</h1>
	<div class="form-inline">
		<div class="form-group"><label for="age">Tengo </label> <input type="number" class="form-control" min="18" max="120" name="age" ng-model="userData.age" id="age" required/> </div> <div class="form-group"><label for="sex"> Años Soy</label>
		<select class="form-control" ng-model="userData.sex" name="sex" id="sex">			
			<option value="" selected>Choose Your Sex</option>
			<option value="0">Mujer</option>
			<option value="1">Hombre</option>
		</select> </div> <label for="country"> y vivo en</label>
		</div>
		<div class="form-inline">
			<div class="form-group">
				<label>Pais</label> <br/> 
				<select class="form-control" ng-model="userData.country" name="country" id="country" required></select>
			</div>
			<div class="form-group">
				<label>Departamento</label><br/> 
				<select class="form-control" ng-model="userData.state" name="state" id="state" required></select>
			</div>
		</div>
		<div class="form-inline">
			<div class="form-group">
				<label>Ciudad</label> <br/> 
				<select class="form-control" ng-model="userData.city" name="city" id="city" required></select>
			</div>
		</div>
		<!-- SUBMIT BUTTON -->
		<div class="form-group text-right">	
			<button type="submit" class="btn btn-danger btn-lg">Siguiente</button>
		</div>
	</form>
	</div>
	<div class="col-md-8 col-md-offset-2 step1" id="step2">
		<form ng-submit="submitCategoryInfo()">
			<h1>En que estas interesado?</h1>
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
							<input type="checkbox" class="interest" id="interest<% interest.idinterests %>" name="interest[]" value="<% interest.idinterests %>" data-ng-click="toggle(interest.idinterests)"/> 
	    					<% interest.name %>
  						</label>
					</div>
				
				</div>
			</div>			
			<div class="form-group">
				<button type="submit" class="btn btn-danger btn-lg">Siguiente</button>
			</div>
		</form>
		</div>
		<div class="col-md-8 col-md-offset-2 step1" id="step4">
			<h1>¡Ya casi esta!</h1>
			<p>Hemos enviado un email de confirmacion para activar tu cuenta</p>
		</div>
</div>
</body>
</html>