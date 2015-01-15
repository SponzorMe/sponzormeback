(function(){
angular.module('EventPage', ['ui.bootstrap', 'ui.router','ngCookies','ngDialog', 'ngAutocomplete', 'customizationService','angularFileUpload'], 
    function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

/**
 * Route configuration for the Dashboard module.
 */
angular.module('EventPage').config(['$stateProvider', '$urlRouterProvider', 
    function($stateProvider, $urlRouterProvider) {

    // For unmatched routes
    $urlRouterProvider.otherwise('/');

    // Application routes
    $stateProvider
        .state('index', {
            url: '/',
            templateUrl: 'event.html'
        })
        
}]);

/**
 * Master Controller
 */
angular.module('EventPage').controller('EventCtrl', ['$scope', '$cookieStore','Customization',EventCtrl]);

function EventCtrl($scope, $cookieStore, Customization) {
	console.log(Customization);
    var mobileView = 992;
    //--Start Global Variables--//
 
    //--End GLobal Variables--//

    $scope.getWidth = function() { return window.innerWidth; };

    $scope.$watch($scope.getWidth, function(newValue, oldValue)
    {
        if(newValue >= mobileView)
        {
            if(angular.isDefined($cookieStore.get('toggle')))
            {
                if($cookieStore.get('toggle') == false)
                {
                    $scope.toggle = false;
                }            
                else
                {
                    $scope.toggle = true;
                }
            }
            else 
            {
                $scope.toggle = true;
            }
        }
        else
        {
            $scope.toggle = false;
        }
    });

    $scope.toggleSidebar = function() 
    {
        $scope.toggle = ! $scope.toggle;

        $cookieStore.put('toggle', $scope.toggle);
    };

    $scope.path = function()
    {
        var newURL = window.location.host + "/" + window.location.pathname;
        var pathArray = newURL.split( '/' );
        var newPathname = "";
        for (i = 0; i < pathArray.length-2; i++) {
            if(pathArray[i]!="")
                newPathname += pathArray[i]+"/";
        }       
        newPathname=window.location.protocol + "//"+ newPathname;
        var path = newPathname;
        return path;
    }

    window.onresize = function() { $scope.$apply(); };

    $scope.sponzor = function(idpeak,user)
    {
        Customization.setSponzorPeak({"peak":idpeak,"user":user})
        .success(function(adata) 
        {
        	path=$scope.path();
        	setTimeout(function(){
        		window.location = path+'sponsors/dashboard#/following';
        	}, 100)
            
        });
    }
}
})();