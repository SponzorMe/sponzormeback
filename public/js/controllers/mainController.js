angular.module('mainController', ['ngAutocomplete'])

	// inject the Comment service into our controller
	.controller('mainController', function($scope, $http, Customization) {
        $scope._interests = {};
		var interestscheked = new Array(); //Array to store the interests
		var userId=$("#userId").val();
		$scope.options = {
          country: '',
          types: '(cities)'
        };
        $scope.details="";
        $scope.results="";
		$("#step2").hide();
		$("#step3").hide();
		$("#step4").hide();
		$scope.toggle = function(id)
		{
			if($.inArray(id,interestscheked)!=-1){
                $scope._interests[id] = 0;
				interestscheked.splice($.inArray(id,interestscheked),1);
            }else{
                $scope._interests[id] = 1;
				interestscheked.push(id);
            }
		}
		$scope.showInterests = function(id) {
			//Luego Abrimos la otra categoria
			Customization.getInterestsByCategories(id).success(function(adata) {
				$scope.interests = adata;
			});
			$("#step3").show();
			$.each(interestscheked,function( index, value ) {
  				$("#interest"+value).attr("checked",true);
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
				})
				.error(function(data) {
				});
		}
		$scope.submitUserInfo = function() {
			$scope.userData.location_reference=$scope.details.reference;
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
				});
		};
	});