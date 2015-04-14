var customizationApp = angular.module('customizationApp', ['mainController', 'customizationService'], 
	function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	});