var Eventos123;
(function(){ 
angular.module('Dashboard', ['ui.bootstrap', 'ui.router', 'ngCookies', 'customizationService'], 
    function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

/**
 * Route configuration for the Dashboard module.
 */
angular.module('Dashboard').config(['$stateProvider', '$urlRouterProvider', 
    function($stateProvider, $urlRouterProvider) {

    // For unmatched routes
    $urlRouterProvider.otherwise('/');

    // Application routes
    $stateProvider
        .state('index', {
            url: '/',
            templateUrl: 'dashboard.html'
        })
        .state('events', {
            url: '/events',
            templateUrl: 'addevent.html'
        })
        .state('sponzors', {
            url: '/sponzors',
            templateUrl: 'sponzors.html'
        })
}]);

/**
 * Master Controller
 */
angular.module('Dashboard').controller('MasterCtrl', ['$scope', '$cookieStore', MasterCtrl]);

function MasterCtrl($scope, $cookieStore, Customization) {
    var mobileView = 992;

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

    window.onresize = function() { $scope.$apply(); };
}

/**
 * Alerts Controller
 */
angular.module('Dashboard').controller('AlertsCtrl', ['$scope', AlertsCtrl]);

function AlertsCtrl($scope) {
    $scope.alerts = [
        { type: 'success', msg: 'Thanks for visiting! Feel free to create pull requests to improve the dashboard!' },
        { type: 'danger', msg: 'Found a bug? Create an issue with as many details as you can.' }
    ];

    $scope.addAlert = function() {
        $scope.alerts.push({msg: 'Another alert!'});
    };

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

}
/**
 * Loading Directive
 * @see http://tobiasahlin.com/spinkit/
 */
angular.module('Dashboard').directive('rdLoading', rdLoading);

function rdLoading () {
    var directive = {
        restrict: 'AE',
        template: '<div class="loading"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>'
    };
    return directive;
};
})();

/**
 * Events Controller 
 */
 angular.module('Dashboard').controller('eventsController', ['$scope', '$cookieStore', 'Customization',eventsController]);
function eventsController($scope,$Cookie,Customization)
{
    console.log($scope);
    Customization.getEvents().success(function(adata) 
    {
            $scope.eventos=adata.Events;
            console.log($scope.eventos);                
    });
}

angular.module('Dashboard').controller('peaksController', ['$scope', '$cookieStore', 'Customization',sponzorsController]);
function sponzorsController($scope,$Cookie,Customization)
{
    Customization.getSponzors().success(function(adata) 
    {
            $scope.sponzors=adata.Sponzors;
            console.log($scope.sponzors);                
    });
}