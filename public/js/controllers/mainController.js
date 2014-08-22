angular.module('mainController', [])

	// inject the Comment service into our controller
	.controller('mainController2', function($scope, $http, Customization) {

		var interestscheked = new Array(); //Array to store the interests
		var userId=$("#userId").val();

		$("#step2").hide();
		$("#step3").hide();
		$("#step4").hide();
		/*Customization.getCategories()
						.success(function(data) {
								$scope.categories = data;
							});	*/
		$scope.toggle = function(id)
		{
			if($.inArray(id,interestscheked)!=-1)
				interestscheked.splice($.inArray(id,interestscheked),1);
			else				
				interestscheked.push(id);
		}

		$scope.showInterests = function(id) {


			//Luego Abrimos la otra categoria
			Customization.getInterestsByCategories(id).success(function(adata) {
					$scope.interests = adata;
					row=(id%4) + (4-(id%4));					
						$("#c"+row).after($("#step3"));
						$("#step3").show();
					});
			//falta arreglar que vuelva y muestre checkeado los botones.
			interestscheked.forEach( function(element){
							$("#interest"+element).prop("checked",true);
						});

			}
		$scope.submitCategoryInfo = function()
		{
			Customization.saveInterests(interestscheked,userId)
				.success(function(data) {						
					$("#step1").hide();	
					$("#step2").hide();
					$("#step3").hide();
					$("#step4").show();	
					console.log(data);
				})
				.error(function(data) {
					console.log(data);
				});
		}
		$scope.submitUserInfo = function() {
			Customization.saveUser($scope.userData,userId)
				.success(function(data) {
					Customization.getCategories()
						.success(function(data) {
								$scope.categories = data;
							});
						Customization.getInterests().success(function(adata) {
								$scope.interests = adata;
							});
						if(data.success)
						{
							$("#step1").hide();	
							$("#step2").show();	
						}
						

				})
				.error(function(data) {
					console.log(data);
				});
		};
	});