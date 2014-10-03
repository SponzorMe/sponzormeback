angular.module('customizationService', [])
	.factory('Customization', function($http) {

		return {
			// get all the categories
			getCategories : function() {				
				global = $http.get('api/categories');
				return global;
			},
			getCategories1 : function() {				
				global = $http.get('http://localhost/sponzorme/public/api/categories');
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
			getEventsByOrganizer : function(organizer) {
				global = $http.get('http://localhost/sponzorme/public/api/v1/events/by/'+organizer);
				return global;
			},
			getEventsBySponzors : function(sponzor,status) {
				global = $http.get('http://localhost/sponzorme/public/api/v1/events/by/sponzor/'+sponzor+"/"+status);
				return global;
			},
			searchEvents : function(text) {
				global = $http.get('http://localhost/sponzorme/public/api/v1/events/parameter/'+text);
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
			saveEvent : function(eventData) {
				return $http({
					method: 'POST',
					url: 'http://localhost/sponzorme/public/api/v1/create/event',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(eventData)
				});
			},
			setSponzorPeak : function(data) {
				return $http({
					method: 'POST',
					url: 'http://localhost/sponzorme/public/api/v1/sponzor/event',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(data)
				});
			},
			removeEvent : function(idEvent){
				global = $http.get('http://localhost/sponzorme/public/api/v1/remove/event/'+idEvent);
				return global;
			},
			getSponzorsByOrganizer : function(idOrganizer){
				global = $http.get('http://localhost/sponzorme/public/api/v1/sponzors/by/'+idOrganizer);
				return global;
			},
			updateRelSponzorPeak : function(idRelSponzorPeak,newState){
				global = $http.get('http://localhost/sponzorme/public/api/v1/update/relsponzorpeak/'+idRelSponzorPeak+'/'+newState);
				return global;
			},
			removeRelSponzorPeak : function(idRelSponzorPeak){
				global = $http.get('http://localhost/sponzorme/public/api/v1/remove/relsponzorpeak/'+idRelSponzorPeak);
				return global;
			},
			getUserInfo : function(idOrganizer)	{
				Data={"userId":idOrganizer};
				console.log(Data);
				return $http({
					method: 'POST',
					url: 'http://localhost/sponzorme/public/api/v1/user/SebasGameMaster',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(Data)
				});
			},
			editAccount : function(data){
				
				return $http({
					method: 'POST',
					url: 'http://localhost/sponzorme/public/api/v1/edit/user/SebasGameMaster',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(data)
				});
			}
		}

	});