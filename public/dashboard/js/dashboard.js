(function(){
angular.module('Dashboard', ['ui.bootstrap', 'ui.router', 'ngCookies','ngDialog', 'customizationService'], 
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
        .state('sponzors', {
            url: '/sponzors',
            templateUrl: 'sponzors.html',
            controller: 'sponzorsController'
        })
        .state('settings', {
            url: '/settings',
            templateUrl: 'settings.html',
            controller: 'settingsController'
        })
        .state('sponzoring', {
            url: '/sponzoring',
            templateUrl: 'sponzoring.html'
        })
        .state('following', {
            url: '/following',
            templateUrl: 'following.html'
        })
        .state('friend', {
            url: '/friend',
            templateUrl: 'friend.html'
        })
}]);

/**
 * Master Controller
 */
angular.module('Dashboard').controller('MasterCtrl', ['$scope', '$cookieStore', MasterCtrl]);

function MasterCtrl($scope, $cookieStore, Customization) {
    var mobileView = 992;
    $scope.event        = {"current": false, "organizer": "1234", "sponzor":"12334" };
    $scope.eventos      = {"list": false };
    $scope.search       = {"list": false,"current":false };
    $scope.sponzors     = {"list": false, "current":false };
    $scope.categorias   = {"list": false };
    $scope.a            = false;
    $scope.alerts       = [];
    $scope.sponzors     = [];
    $scope.account      = {};
    $scope.friend      = {};

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
 
 angular.module('Dashboard').controller('eventsController', ['$scope', '$cookieStore', 'Customization','ngDialog',eventsController]);
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
            kind: "",
            usd: 0,
            quantity: 1
        });
    }
    $scope.removeSponzor = function(index){
        $scope.sponzors.splice(index, 1);
    }
    $scope.removeEvent = function(index){
        Customization.removeEvent(index)
        .success(function(data){
            $scope.alerts.push({msg: data.message});
            Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
            {
                $scope.eventos.list = adata.Events;
                $scope.event.current = adata.Events[0].id;                
            });
        })
        .error(function(data) {
            console.log(data);
        });
    }
    $scope.newEvent = function(){
        $scope.newevent.peaks =  $scope.sponzors;
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
                        $scope.sponzors = [];
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
angular.module('Dashboard').controller('sponzorsController', ['$scope', '$cookieStore', 'Customization',sponzorsController]);
function sponzorsController($scope,$Cookie,Customization)
{

    Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.sponzors.list=adata.Sponzors;   
        console.log(adata);   
    });
    $scope.updateRelSponzorPeak = function(id,state){
        Customization.updateRelSponzorPeak(id,state).success(function(adata) 
        {
            $scope.alerts.push({msg: adata.message});
            Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });        
    }
    $scope.removeRelSponzorPeak = function(id){
        Customization.removeRelSponzorPeak(id).success(function(adata){
            console.log(adata);   
            $scope.alerts.push({msg: adata.message});
            Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });       
    }
}
angular.module('Dashboard').controller('settingsController', ['$scope', '$cookieStore', 'Customization',settingsController]);
function settingsController($scope,$Cookie,Customization)
{
    $scope.viewUserInfo = function(){
        Customization.getUserInfo($scope.event.organizer).success(function(adata){
            $scope.account.description=adata.User[0].description;
            $scope.account.name=adata.User[0].name;
            $scope.account.age=adata.User[0].age;
            $scope.account.sex=adata.User[0].sex;
            $scope.account.company=adata.User[0].company;
            $scope.account.email=adata.User[0].email;
        });
    }
    $scope.editAccount = function(){
        $scope.account.userId=$scope.event.organizer;
        var a= {
            "description":$scope.account.description,
            "name":$scope.account.name,
            "sex":$scope.account.sex,
            "age":$scope.account.age,
            "country":$scope.account.country,
            "city":$scope.account.city,
            "state":$scope.account.state,
            "email":$scope.account.email,
            "company":$scope.account.company,
            "userId":$scope.event.organizer
        };
        Customization.editAccount(a).success(function(adata){
            $scope.alerts.push({msg: adata.message});
            $scope.viewUserInfo();
        });
    }
    $scope.viewUserInfo();
}

angular.module('Dashboard').controller('searchController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',searchController]);
function searchController($scope,$Cookie,$location,Customization,ngDialog)
{
    
     $scope.openDialog = function(id)
    {
        $scope.search.current=$scope.search.list[id];
        ngDialog.open({ template: 'peaksDialog.html', controller: 'searchController', scope: $scope });       
        Customization.getPeaks($scope.search.list[id].event).success(function(adata) 
        {
            $scope.peaks=adata.Peaks;   
            console.log($scope.search.current);  
        });
    }
     $scope.sponzor = function(idpeak,user)
    {
        ngDialog.close();
        Customization.setSponzorPeak({"peak":idpeak,"user":user})
        .success(function(adata) 
        {
            console.log(adata); 
            $location.path("/following");

        });
    }
    $scope.searchEvents = function()
    {
        if($scope.search1!="")
        {
            Customization.searchEvents($scope.search1)
            .success(function(adata)
            {
                console.log(adata);
                $scope.search.list = adata.Events;
            })
            .error(function(data) 
            {
                console.log(data);
            });
        }
        else
        {
            $("#search").addClass("has-error");
        }
    }
}

angular.module('Dashboard').controller('followingController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',followingController]);
function followingController($scope,$Cookie,$location,Customization,ngDialog)
{
    $scope.sponzors.list=[];
    Customization.getEventsBySponzors($scope.sponzors.current,0).success(function(data) 
    {
       $scope.sponzors.list=data.Sponzors;
    }).
    error(function(data) 
    {
        console.log(data);
    });
    $scope.removeRelSponzorPeak = function(id){
        Customization.removeRelSponzorPeak(id).success(function(adata){
            console.log(adata);   
            $scope.alerts.push({msg: adata.message});
            Customization.getEventsBySponzors($scope.sponzors.current).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });       
    }
}

angular.module('Dashboard').controller('sponzoringController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',sponzoringController]);
function sponzoringController($scope,$Cookie,$location,Customization,ngDialog)
{
    $scope.sponzors.list=[];
    Customization.getEventsBySponzors($scope.sponzors.current,1).success(function(data) 
    {
       $scope.sponzors.list=data.Sponzors;
    }).
    error(function(data) 
    {
        console.log(data);
    });
    $scope.removeRelSponzorPeak = function(id){
        Customization.removeRelSponzorPeak(id).success(function(adata){
            console.log(adata);   
            $scope.alerts.push({msg: adata.message});
            Customization.getEventsBySponzors($scope.sponzors.current).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });       
    }
}

angular.module('Dashboard').controller('friendController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',friendController]);
function friendController($scope,$Cookie,$location,Customization,ngDialog)
{
    $scope.invitefriend = function(){
        Customization.inviteFriend($scope.friend.email,$scope.friend.message).success(function(adata){
            console.log(adata);   
            $scope.alerts.push({msg: adata.message});
            console.log(adata);
            if(adata.success==true)
            {
                $scope.friend.email="";
                $scope.friend.message="";
            }
        });        
    }
}

})();