angular.module('customizationService', [])
	.factory('Customization', function($http) {

		return {
			// get all the categories
			getCategories : function() {				
				global = $http.get('api/categories');
				return global;
			},			
			getInterests : function() {
				global = $http.get('api/interests');
				return global;
			},
			getInterestsByCategories : function(id) {
				global = $http.get('api/interests/categories/'+id);
				return global;
			},
			saveInterests : function(interests,id) {
				a={'interests': interests};
				return $http({
					method: 'POST',
					url: 'api/save/interests/'+id,
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(a)
				});
			},			
			saveUser : function(commentData,id) {
				return $http({
					method: 'POST',
					url: 'api/update/'+id,
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},
			getEvents : function() {
				global = $http.get('http://localhost/sponzorme/public/api/v1/events');
				return global;
			},
			getSponzors : function() {
				global = $http.get('http://localhost/sponzorme/public/api/v1/sponzors');
				return global;
			},
			getPeaks : function(idEvent) {
				global = $http.get('http://localhost/sponzorme/public/api/v1/peaks/'+idEvent);
				return global;
			},				
		}

	});