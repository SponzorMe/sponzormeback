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
            templateUrl: 'events.html',
            controller: 'eventsController'
        })
}]);

/**
 * Master Controller
 */
angular.module('Dashboard').controller('MasterCtrl', ['$scope', '$cookieStore', MasterCtrl]);

function MasterCtrl($scope, $cookieStore, Customization) {
    var mobileView = 992;
      $scope.event  = {"current": false, "organizer": "1234" };
      $scope.eventos  = {"list": false };
      $scope.categorias  = {"list": false };
      $scope.alerts = [
        { type: 'success', msg: '1' },
        { type: 'danger', msg: '2' }
    ];
    $scope.sponzors = [];

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

/**
 * Events Controller 
 */
 
 angular.module('Dashboard').controller('eventsController', ['$scope', '$cookieStore', 'Customization',eventsController]);
function eventsController($scope,$Cookie,Customization)
{
    Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.eventos.list = adata.Events;
        $scope.event.current = adata.Events[0].id;
    });
    Customization.getCategories1().success(function(adata) 
    {
        $scope.categorias.list = adata;
    });    
    $scope.addsponzor = function () {
        $scope.sponzors.push({ 
            kind: "Gold Sponzor",
            usd: 100,
            quantity: 1
        });
    }
    $scope.removeSponzor = function(){
        $scope.sponzors.splice(index, 1);
    }
    $scope.newEvent = function(){        
        Customization.saveEvent($scope.newevent)
            .success(function(data) {
                if(data.success)
                {
                    $scope.alerts = [{type: 'success', msg: data.message}];
                    Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
                    {
                        $scope.eventos.list = adata.Events;
                        $scope.event.current = adata.Events[0].id;
                        $scope.newevent="";
                    });
                    $(".form-group").removeClass("has-error");
                    $(".form-group").removeClass("has-success");
                }
                else
                {
                    message = String(data.message);
                    message = message.replace("[","").replace("]","").replace(/,/g," ");
                    $scope.alerts = [{type: 'danger', msg: message}];
                    if(angular.isUndefined($scope.newevent.title))
                        $("#title").addClass("has-error");
                    else
                    {
                        $("#title").removeClass("has-error");
                        $("#title").addClass("has-success");
                    }
                    if(angular.isUndefined($scope.newevent.location))
                        $("#location").addClass("has-error");
                    else
                    {
                        $("#location").removeClass("has-error");
                        $("#location").addClass("has-success");
                    }
                    if(angular.isUndefined($scope.newevent.description))
                        $("#description").addClass("has-error");
                    else
                    {
                        $("#description").removeClass("has-error");
                        $("#description").addClass("has-success");
                    }
                    if(angular.isUndefined($scope.newevent.starts))
                        $("#starts").addClass("has-error");
                    else
                    {
                        $("#starts").removeClass("has-error");
                        $("#starts").addClass("has-success");
                    }
                    if(angular.isUndefined($scope.newevent.ends))
                        $("#ends").addClass("has-error");
                    else
                    {
                        $("#ends").removeClass("has-error");
                        $("#ends").addClass("has-success");
                    }
                }
            })
            .error(function(data) {
                console.log(data);
            });
        };
}

angular.module('Dashboard').controller('peaksController', ['$scope', '$cookieStore', 'Customization',peaksController]);
function peaksController($scope,$Cookie,Customization)
{
    $scope.$watch('event.current', function(newvalue, oldvalue){ 
        if($scope.event.current)
        {
            Customization.getPeaks(newvalue).success(function(adata) 
            {
                $scope.peaks=adata.Peaks;           
            });
        }
    });
}

})();