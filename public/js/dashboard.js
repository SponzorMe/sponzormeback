(function(){
angular.module('Dashboard', ['ui.bootstrap', 'ui.router','ngCookies','ngDialog', 'ngAutocomplete', 'customizationService','angularFileUpload','ui.bootstrap.datetimepicker', 'ngSanitize'], 
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
            templateUrl: 'sponzors.html'
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
        .state('eventbrite', {
            url: '/eventbrite',
            templateUrl: 'eventbrite.html'
        })
        .state('todo', {
            url: '/todo',
            templateUrl: 'todo.html'
        })
        
}]);
/**
 * Master Controller
 */
angular.module('Dashboard').controller('MasterCtrl', ['$scope', '$cookieStore', 'Customization', MasterCtrl]);

function MasterCtrl($scope, $cookieStore, Customization) {    
    //--Start Global Variables--//
    $scope.event                = {"current": false, "organizer": "1234", "sponzor":"12334", "message":"" };
    $scope.localizationOptions  = null;
    $scope.eventos              = {"list": false};
    $scope.eventbriteevents     = {"list": false};
    $scope.meetupevents         = {"list": false};
    $scope.meetupgroups         = {"list": false, "current":false};
    $scope.search               = {"list": false,"current":false };
    $scope.sponzors             = {"list": false, "current":false };
    $scope.categorias           = {"list": false };
    $scope.result2              = '';
    $scope.details2             = '';
    $scope.result3              = '';
    $scope.details3             = '';
    $scope.newevent             = {};
    $scope.a                    = false;
    $scope.alerts               = [];
    $scope.alertsnot            = [];
    $scope.sponzors             = [];
    $scope.account              = {};
    $scope.friend               = {};
    $scope.rss                  = [];
    $scope.files                = [];
    $scope.users                = {};
    $scope.loadingpeaks         = true;
    $scope.temp                 = {'image':""};
    $scope.todo                 = {'list':"",'title':"",'description':"",'event':"",'peak':"",'eventId':"",'listSponzor':"",'currentRelPeak':0,'currentEvent':""};
    //--End GLobal Variables--//
    $scope.accountheader = {};
    $scope.accountheader.image = "";

    $scope.viewitem = false;

    var mobileView = 992;

    $scope.getWidth = function() {
        return window.innerWidth;
    };

    $scope.$watch($scope.getWidth, function(newValue, oldValue) {
        if (newValue >= mobileView) {
            if (angular.isDefined($cookieStore.get('toggle'))) {
                $scope.toggle = ! $cookieStore.get('toggle') ? false : true;
            } else {
                $scope.toggle = true;
            }
        } else {
            $scope.toggle = false;
        }

    });

    $scope.toggleSidebar = function() {
        $scope.toggle = !$scope.toggle;
        $cookieStore.put('toggle', $scope.toggle);
    };

    window.onresize = function() {
        $scope.$apply();
    };

    $scope.viewUserInfoheader = function(){
        
        $scope.accountheader.loadingEventbrite=false;
        Customization.getUserInfo($scope.event.organizer).success(function(adata){
            $scope.accountheader.description=adata.User[0].description;
            var urlimage = $scope.pathheader();
            if(adata.User[0].image != ""){
                $scope.accountheader.image=urlimage+'/images/users/'+adata.User[0].image;
            }else{
                $scope.accountheader.image=urlimage+'/images/photo.png';
            }
            $scope.accountheader.name=adata.User[0].name;
            $scope.accountheader.age=adata.User[0].age;
            $scope.accountheader.sex=adata.User[0].sex;
            $scope.accountheader.company=adata.User[0].company;
            $scope.accountheader.email=adata.User[0].email;
            $scope.accountheader.location=adata.User[0].location;
            $scope.accountheader.location_reference=adata.User[0].location_reference;
            $scope.accountheader.eventbriteKey=adata.User[0].eventbriteKey;
            $scope.accountheader.meetupRefreshKey=adata.User[0].meetupRefreshKey;
            if(adata.User[0].eventbriteKey!=undefined && adata.User[0].eventbriteKey.trim()!="")
            {
                Customization.getEventbriteEvents(adata.User[0].eventbriteKey).success(function(data){
                     $scope.eventbriteevents.list=data.Events.events;
                     $scope.accountheader.loadingEventbrite=true;
                });
            }        
        $scope.accountheader.loadingGroupsMeetup=false;
       if($scope.accountheader.meetupRefreshKey!=undefined && $scope.accountheader.meetupRefreshKey.trim()!="")
        {
            Customization.getMeetupGroups($scope.accountheader.meetupRefreshKey).success(function(data){
                 $scope.meetupgroups.list=data.Groups.results;
                 $scope.accountheader.meetupRefreshKey=data.refresh_token;
                 $scope.accountheader.loadingGroupsMeetup=true;
            });
        }
        
        });
    }

    $scope.pathheader = function()
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
    /*
    |--------------------------------------------------------------------------
    | Messages and events for pusher notifications
    |--------------------------------------------------------------------------*/
    
    var pusher = new Pusher('d88e93903c0ddc65df8c');
    var eventsChannel = pusher.subscribe('events-channel');
    //Si un patrocinador patrocina un evento del organizador.
    eventsChannel.bind('New-Sponzoring', function(data) {
      if(data.organizerId==$scope.event.organizer){
        $scope.alerts.push({msg: unescape(data.message)});
        $scope.alertsnot.push({msg: unescape(data.message), type: '<i class="fa fa-check-circle-o"></i>', color: 'amarillo'});
      }
    });
    //Cuando un organizador acepta el patrocinio de un patrocinador
    eventsChannel.bind('Sponzoring', function(data) {
      if(data.sponzorId==$scope.event.sponzor)
      {
        $scope.alerts.push({msg: unescape(data.message)});
        $scope.alertsnot.push({msg: unescape(data.message), type: '<i class="fa fa-check-circle"></i>', color: 'verde'});
      }
    });
    //Cuando un sponzor borra el patrocinio de un evento
    eventsChannel.bind('Sponzoring', function(data) {
      if(data.organizerId==$scope.event.organizer)
      {
        $scope.alerts.push({msg: unescape(data.message)});
        $scope.alertsnot.push({msg: unescape(data.message), type: '<i class="fa fa-circle-o"></i>', color: 'red'});
      }
    });



    // for (var i = 0; i < 20; i++) {
    //     var numbertype = Math.floor((Math.random() * (4 - 1)) + 1);
    //     typeobj = ['<i class="fa fa-check-circle-o"></i>', '<i class="fa fa-check-circle"></i>', '<i class="fa fa-circle-o"></i>'];
    //     var namecolor = ['amarillo', 'verde', 'red']
    //     $scope.alertsnot.push({msg: 'You have a new Sponzor for the event <a href="#/sponzors">test</a>', type: typeobj[numbertype-1], color: namecolor[numbertype-1]});
    // };

    $scope.$watch('alertsnot', function () {
        if ($scope.alertsnot.length > 0){
            $scope.viewitem = true;
        }else{
            $scope.viewitem = false;
        }
    }, true);

    

    $scope.closeAlert = function(index, event){
        event.preventDefault();
        event.stopPropagation();
        $scope.status.isopens = true;
        $scope.alertsnot.splice(index, 1);
        //$scope.animateclass = 'animatebox';
    }
    
}
/**
* Indicadores Controller
**/
 angular.module('Dashboard').controller('indicatorsController', ['$scope', '$cookieStore', 'Customization',indicatorsController]);
function indicatorsController($scope,$Cookie,Customization){
    Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.eventos.size = adata.Events.length;
        $scope.eventos.list = adata.Events;
        $scope.event.current = adata.Events[0].id;
    });
    Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.sponzors.size = adata.Sponzors.length;
        var balance=0;
        for(i=0;i<adata.Sponzors.length;i++)
        {            
            if(adata.Sponzors[i].eventstate==1)
            {
                balance=balance+adata.Sponzors[i].usd;                
            }
        }
        $scope.sponzors.balance = balance;
    });
    Customization.countAllUsers().success(function(adata) 
    {
        $scope.users.size=adata.size+1000;
    });
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
 angular.module('Dashboard').controller('eventsController', ['$scope', '$filter','$cookieStore', 'Customization','ngDialog', 'FileUploader', eventsController]);
function eventsController($scope,$filter,$Cookie,Customization,ngDialog,FileUploader){
    if(window.location.hash=="#/events")
    {
       Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
        {
            $scope.eventos.list = adata.Events;
            $scope.event.current = adata.Events[0].id;
        }); 
    }
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
        ngDialog.open({ template: 'loading.html', controller: 'eventsController', scope: $scope });//Mostramos el Loading
        Customization.removeEvent(index)
        .success(function(data){
            $scope.alerts.push({msg: data.message});
            Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
            {
                $scope.eventos.list = adata.Events;
                $scope.event.current = adata.Events[0].id;
            });
            ngDialog.close();//Cerraos el loading
            $scope.message="removeEvent";
            ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope });
        })
        .error(function(data) {
            console.log(data);
        });
    }

    $scope.imageEvent = function(eventId)
    {
        $scope.currentImage=eventId;
        ngDialog.open({ template: 'generalImage.html', controller: 'eventsController', scope: $scope });
    }
    $scope.seeEvent = function(e)
    {
        $scope.seeEventData=e;
        ngDialog.open({ template: 'seeEvent.html', controller: 'eventsController', scope: $scope });
    }
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
    $scope.codeWidget = function (eventId)
    {
        $scope.eventId=eventId;
        ngDialog.open({ template: 'codeWidget.html', controller: 'eventsController', scope: $scope });
    }
    $scope.newEvent = function(){                    
        $scope.newevent.peaks =  $scope.sponzors;
        $scope.newevent.location_reference=$scope.details3.reference;
        if($scope.imageReady)
        {
            ngDialog.open({ template: 'loading.html', controller: 'eventsController', scope: $scope });//Mostramos el Loading
            $scope.newevent.starts=$filter('date')($scope.newevent.starts, "yyyy-MM-dd HH:mm:00");
            $scope.newevent.ends=$filter('date')($scope.newevent.ends, "yyyy-MM-dd HH:mm:00");
            Customization.saveEvent($scope.newevent)
                .success(function(data) {
                    if(data.success)
                    {                        
                        path=$scope.path();
                        uploader.queue[0].url=path+'api/v1/event/upload/image/'+data.evento_id;
                        uploader.uploadAll(); //Subo la imagen
                       
                        $scope.alerts = [{type: 'success', msg: data.message}];
                        Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
                        {
                            $scope.eventos.list = adata.Events;
                            $scope.event.current = adata.Events[0].id;                            
                            $scope.event.message=data.message;                        
                        });                        
                        $(".form-group").removeClass("has-error");
                        $(".form-group").removeClass("has-success");
                        $scope.newevent={"organizer":$scope.event.organizer}; //Limpiamos el evento                           
                        $scope.sponzors = []; //Limpiamos los sponzors
                        $scope.imageReady=false;

                    }
                    else
                    {
                        message = String(data.message);
                        message = message.replace("[","").replace("]","").replace(/,/g," ");
                        $scope.alerts.push({msg: unescape(message)});
                        if(angular.isUndefined($scope.newevent.title)){
                            $("#title").removeClass("has-success");
                            $("#title").addClass("has-error");
                        }                           
                        else
                        {
                            $("#title").removeClass("has-error");
                            $("#title").addClass("has-success");
                        }
                        if(angular.isUndefined($scope.newevent.location)){
                            $("#location").removeClass("has-success");
                            $("#location").addClass("has-error");
                        }
                        else{
                            $("#location").removeClass("has-error");
                            $("#location").addClass("has-success");
                        }
                        if(angular.isUndefined($scope.newevent.description)){
                            $("#description").removeClass("has-success");
                            $("#description").addClass("has-error");
                        }                            
                        else{
                            $("#description").removeClass("has-error");
                            $("#description").addClass("has-success");
                        }
                        if(angular.isUndefined($scope.newevent.starts)){
                            $("#starts").removeClass("has-success");
                            $("#starts").addClass("has-error");
                        }                            
                        else{
                            $("#starts").removeClass("has-error");
                            $("#starts").addClass("has-success");
                        }
                        if(angular.isUndefined($scope.newevent.ends)){
                            $("#ends").removeClass("has-success");
                            $("#ends").addClass("has-error");
                        }                            
                        else{
                            $("#ends").removeClass("has-error");
                            $("#ends").addClass("has-success");
                        }                        
                    }
                    $scope.text=message;
                    ngDialog.close();//Si hubo error cerramos el loading.
                    $scope.message="errorInFields";//Seteamos el mensaje de error
                    ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope }); //Mostramos el mensaje
                })
                .error(function(data) {                    
                    console.log(data);
                });            
        }
        else
        {
            $scope.message="errorImage";
            ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope });
        }
    };
       $scope.imageReady=false;
       $scope.uploader = new FileUploader();
       var uploader = $scope.uploader = new FileUploader();
        uploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
            });
        uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter,  options) {
        console.info('onWhenAddingFileFailed', item, filter, options);
            ngDialog.close();//Cerraos el loading
            $scope.message="errorImage";
            ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope });
        };
        uploader.onAfterAddingFile = function(fileItem) {
            $scope.imageReady=true;
        };
        uploader.onCompleteItem = function(fileItem, response, status, headers) {
            if(response.success)
            {
                $scope.imageReady=true;
                $scope.imagePath=response.path;
                ngDialog.open({ template: 'successevent.html', controller: 'eventsController', scope: $scope });
                uploader.clearQueue();
                document.getElementById("imageInput").value = "";
                $scope.temp.image="";
            }                
        };
}

angular.module('Dashboard').controller('peaksController', ['$scope', '$cookieStore', 'Customization',peaksController]);
function peaksController($scope,$Cookie,Customization){
    $scope.$watch('event.current', function(newvalue, oldvalue){
        $scope.loadingpeaks=true;
        if($scope.event.current)
        {
            //Mostramos el boton de cargar.            
            Customization.getPeaks(newvalue).success(function(adata) 
            {                
                $scope.peaks=adata.Peaks;
                $scope.loadingpeaks=false;           
            });
            
            //Ocultamos el boton de cargar
        }
    });
}
angular.module('Dashboard').controller('sponzorsController', ['$scope', '$cookieStore', 'Customization','ngDialog',sponzorsController]);
function sponzorsController($scope,$Cookie,Customization,ngDialog){

    Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.sponzors.list=adata.Sponzors;
    });
    $scope.updateRelSponzorPeak = function(id,state){
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.updateRelSponzorPeak(id,state).success(function(adata) 
        {            
            $scope.alerts.push({msg: adata.message});
            Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
                ngDialog.close();
            });            
        });
    }
    $scope.removeRelSponzorPeak = function(id){
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.removeRelSponzorPeak(id).success(function(adata){            
            $scope.alerts.push({msg: adata.message});
            Customization.getSponzorsByOrganizer($scope.event.organizer).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
                ngDialog.close();
            });
        });       
    }
    $scope.getTaskSponzorPeak = function (relPeak){
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.getTaskBySponzorRelPeak(relPeak,0).success(function(adata){
           $scope.todo.list=adata.TaskBySponzor;  
           ngDialog.close();
        });
    }
    $scope.removeTaskSponzorPeak = function (idTaskSponzor, relPeak){
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.removeTaskSponzorPeak(idTaskSponzor).success(function(adata){
           $scope.getTaskSponzorPeak(relPeak);
           ngDialog.close();
        });
    }
    $scope.updateStatusTaskSponzorPeak = function (idTaskSponzor, status, relPeak){
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.updateStatusTaskSponzorPeak(idTaskSponzor,status).success(function(adata){
           $scope.getTaskSponzorPeak(relPeak);
           ngDialog.close();
        });
    }
}
angular.module('Dashboard').controller('settingsController', ['$scope', '$cookieStore', 'Customization','FileUploader','ngDialog',settingsController]);
function settingsController($scope,$Cookie,Customization, FileUploader, ngDialog){
    
    var uploader = $scope.uploader = new FileUploader();
    uploader.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });

    uploader.onAfterAddingFile = function(fileItem) {
        //console.info('onAfterAddingFile', fileItem);
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

    var urlimage = $scope.path();
            
    $scope.imageReady=false;

    


    $scope.viewUserInfo = function(){
        $scope.account.loadingEventbrite=false;
        Customization.getUserInfo($scope.event.organizer).success(function(adata){
            $scope.account.description=adata.User[0].description;
            
            if(adata.User[0].image != ""){
                $scope.account.image=urlimage+'/images/users/'+adata.User[0].image;
            }else{
                $scope.account.image=urlimage+'/images/photo.png';
            }
            
            $scope.account.name=adata.User[0].name;
            $scope.account.age=adata.User[0].age;
            $scope.account.sex=adata.User[0].sex;
            $scope.account.company=adata.User[0].company;
            $scope.account.email=adata.User[0].email;
            $scope.account.location=adata.User[0].location;
            $scope.account.location_reference=adata.User[0].location_reference;
            $scope.account.eventbriteKey=adata.User[0].eventbriteKey;
            $scope.account.meetupRefreshKey=adata.User[0].meetupRefreshKey;
            if(adata.User[0].eventbriteKey!=undefined && adata.User[0].eventbriteKey.trim()!="")
            {
                Customization.getEventbriteEvents(adata.User[0].eventbriteKey).success(function(data){
                     $scope.eventbriteevents.list=data.Events.events;
                     $scope.account.loadingEventbrite=true;
                });
            }        
        $scope.account.loadingGroupsMeetup=false;
       if($scope.account.meetupRefreshKey!=undefined && $scope.account.meetupRefreshKey.trim()!="")
        {
            Customization.getMeetupGroups($scope.account.meetupRefreshKey).success(function(data){
                 $scope.meetupgroups.list=data.Groups.results;
                 $scope.account.meetupRefreshKey=data.refresh_token;
                 $scope.account.loadingGroupsMeetup=true;
            });
        }
        
        });
        $scope.options2 = {
          country: '',
          types: '(cities)'
        };
    }
    $scope.$watch('meetupgroups.current', function(newValue, oldValue)
    {
        if($scope.meetupgroups.current)
        {
            $scope.account.loadingMeetupEvents=false;
            Customization.getMeetupEventsByGroup(newValue,$scope.account.meetupRefreshKey)
            .success(function(data)
            {
                $scope.meetupevents.list=data.Events.results;
                $scope.account.meetupRefreshKey=data.refresh_token;
                $scope.account.loadingMeetupEvents=true;
            });
        }            
    });
    $scope.importFromEventbrite = function(e)
    {
        $scope.newevent.description=e.description.text;
        $scope.newevent.title=e.name.text;
        $scope.newevent.ends=e.end.local.split("T")[0];
        $scope.newevent.starts=e.start.local.split("T")[0];
        $scope.newevent.location= e.venue.address.address_1 +", " +e.venue.address.city+", " +e.venue.address.region;
        $scope.a=true;
    }
    $scope.unconnectMeetup = function()
    {
        Customization.unconnectMeetup($scope.event.organizer)
            .success(function(data)
            {
                $scope.viewUserInfo();
            });        
    }
    $scope.unconnectEventbrite = function()
    {
        Customization.unconnectEventbrite($scope.event.organizer)
            .success(function(data)
            {
                $scope.viewUserInfo();
            });        
    }
    $scope.importFromMeetup=function(e)
    {
        $scope.newevent.description=e.description;
        $scope.newevent.title=e.name;
        $scope.newevent.ends=e.dateEnds;
        $scope.newevent.starts=e.dateStarts;
        $scope.newevent.location=e.venue.address_1+", " +e.venue.name+", " +e.venue.city;
        $scope.b=true;
    }
    
    $scope.editAccount = function(){        
        //**Acá se hacen las validaciones de las reglas del formulario
        if(angular.isUndefined($scope.details2.reference) && 
            ($scope.account.location_reference="" || angular.isUndefined($scope.account.location_reference)))
        {
            $("#location").addClass("has-error");
            $scope.account.location="";
        }
        else
        {

            path=$scope.path();
            if(uploader.queue[0] != undefined){
                uploader.queue[0].url=path+'api/v1/user/upload/image/'+$scope.event.organizer;
                uploader.uploadAll(); //Subo la imagen

                uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter,  options) {
                    console.info('onWhenAddingFileFailed', item, filter, options);
                    $scope.message="errorImage";
                    ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope });
                };
                uploader.onAfterAddingFile = function(fileItem) {
                    console.info('onAfterAddingFile', fileItem);
                    $scope.imageReady=true;
                };
                uploader.onCompleteItem = function(fileItem, response, status, headers) {
                    if(response.success)
                    {
                        $scope.imageReady=true;
                        $scope.imagePath=response.path;
                        $scope.account.image = response.path;
                        $scope.accountheader.image = urlimage+'/images/users/'+response.path;
                        $scope.event.message="La imagen se actualizo satisfactoriamente";
                        ngDialog.open({ template: 'successevent.html', controller: 'settingsController', scope: $scope });
                        uploader.clearQueue();
                        document.getElementById("imageInput").value = "";
                    }                
                };
            }


            

            $scope.account.userId=$scope.event.organizer;
            var a= {
                "description":$scope.account.description,
                "image":$scope.account.image,
                "name":$scope.account.name,
                "sex":$scope.account.sex,
                "age":$scope.account.age,
                "location":$scope.account.location,
                "location_reference":$scope.details2.reference,
                "email":$scope.account.email,
                "company":$scope.account.company,
                "comunity_size":$scope.account.comunitSize,
                "userId":$scope.event.organizer
            };
            Customization.editAccount(a).success(function(adata){
                    $scope.alerts.push({msg: adata.message});
                    $scope.viewUserInfo();
            });
        }

        
        

    }
    $scope.viewUserInfo();
}
//Este controlador es solo para el dashboard de los sponzors
angular.module('Dashboard').controller('searchController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',searchController]);
function searchController($scope,$Cookie,$location,Customization,ngDialog){
    
    $scope.openDialog = function(id)
    {
        $scope.search.current=$scope.search.list[id];
        $scope.loading=1;
        ngDialog.open({ template: 'peaksDialog.html', controller: 'searchController', scope: $scope });       
        Customization.getPeaks($scope.search.list[id].event).success(function(adata) 
        {
            $scope.peaks=adata.Peaks;
            $scope.loading=0;
        });
    }
    $scope.sponzor = function(idpeak,user)//Esta es la función que ejecuta el patrocinio cuando se le da en el boton de listo
    {
        ngDialog.close();//Cerramos el dialogo de los peaks
        ngDialog.open({ template: 'loading.html', controller: 'searchController', scope: $scope });//Mostramos el Loading general
        Customization.setSponzorPeak({"peak":idpeak,"user":user})
        .success(function(adata) 
        {
            $location.path("/following");
            ngDialog.close(); //Cerramos el loading general
        });
    }
    $scope.searchEvents = function() //Funcion que se ejecuta en el dashboard de los sponzors, cuando buscan un evento que patrocinar
    {
        if($scope.search1!="")
        {
            $scope.searchloading=1;
            Customization.searchEvents($scope.search1)
            .success(function(adata)
            {
                $scope.search.list = adata.Events;
                $scope.searchloading=0;
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
function followingController($scope,$Cookie,$location,Customization,ngDialog){
    $scope.sponzors.list=[];
    $scope.followloading=1;
    Customization.getEventsBySponzors($scope.sponzors.current,0).success(function(data) 
    {
       $scope.sponzors.list=data.Sponzors;
       $scope.followloading=0;
    }).
    error(function(data) 
    {
        console.log(data);
    });
    $scope.removeRelSponzorPeak = function(id){
        Customization.removeRelSponzorPeak(id).success(function(adata){  
            $scope.alerts.push({msg: adata.message});
            Customization.getEventsBySponzors($scope.sponzors.current).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });       
    }
}

angular.module('Dashboard').controller('sponzoringController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',sponzoringController]);
function sponzoringController($scope,$Cookie,$location,Customization,ngDialog){
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
            $scope.alerts.push({msg: adata.message});
            Customization.getEventsBySponzors($scope.sponzors.current).success(function(adata){
                $scope.sponzors.list=adata.Sponzors;
            });
        });       
    }
    $scope.getTaskSponzorPeak = function(relPeak,event,idPeak){
        Customization.getTaskBySponzorRelPeak(relPeak,0).success(function(adata){
           $scope.todo.list=adata.TaskBySponzor;
        });
        Customization.getTaskBySponzorRelPeak(relPeak,1).success(function(adata){
           $scope.todo.listSponzor=adata.TaskBySponzor;
        });
        $scope.todo.peak=idPeak;
        $scope.todo.currentRelPeak=relPeak;
        $scope.todo.currentEvent=event;        
    }
    $scope.updateStatusTaskSponzorPeak = function (idTaskSponzor, status, relPeak){
        Customization.updateStatusTaskSponzorPeak(idTaskSponzor,status).success(function(adata){
            $scope.getTaskSponzorPeak(relPeak,$scope.todo.currentEvent);
        });
    }
    $scope.createSponzorTask = function (){
        ngDialog.open({ template: 'createSponzorTodo.html', controller: 'sponzoringController', scope: $scope });
    }
    $scope.addTodo = function ()
    {
        Customization.setPeakTodo(
        $scope.todo.title,
        $scope.todo.description,
        $scope.todo.currentEvent,        
        $scope.todo.peak,
        1,
        $scope.todo.currentRelPeak
    ).success(function(adata){

        //Limpiamos los datos
        $scope.todo.title="";
        $scope.todo.description="";
        $scope.getTaskSponzorPeak($scope.todo.currentRelPeak,$scope.todo.currentEvent);
        ngDialog.close();
        }).error(function(data) {
            console.log(data);
        });        
    }
    $scope.removeTaskSponzorPeak = function (idTaskSponzor, relPeak){
        Customization.removeTaskSponzorPeak(idTaskSponzor).success(function(adata){
        $scope.getTaskSponzorPeak(relPeak,$scope.todo.currentEvent); 
        });
    }
}

angular.module('Dashboard').controller('friendController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',friendController]);
function friendController($scope,$Cookie,$location,Customization,ngDialog){
    $scope.invitefriend = function(){
        Customization.inviteFriend($scope.friend.email,$scope.friend.message).success(function(adata){
            $scope.alerts.push({msg: adata.message});
            if(adata.success==true)
            {
                $scope.friend.email="";
                $scope.friend.message="";
            }
        });        
    }
}

angular.module('Dashboard').controller('rssController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',rssController]);
function rssController($scope,$Cookie,$location,Customization,ngDialog){
    var blogUrl=($("#blogUrl").attr('href'));
    var url=blogUrl+"feeds/posts/default";
    $.ajax({
        url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
        dataType: 'json',
        success: function(data) {
            for(i=0;i<data.responseData.feed.entries.length;i++)
            {
                 $scope.rss[i]={
                    "title":data.responseData.feed.entries[i].title,
                    "link":data.responseData.feed.entries[i].link
                };
            }
        }
    });
} 

angular.module('Dashboard').controller('eventbriteController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',eventbriteController]);
function eventbriteController($scope,$Cookie,$location,Customization,ngDialog){
     Customization.connectEverbrite().success(function(adata){
            }).error(function(data) {
                console.log(data);
            });
} 

angular.module('Dashboard').controller('todoController', ['$scope', '$cookieStore','$location', 'Customization','ngDialog',todoController]);
function todoController($scope,$Cookie,$location,Customization,ngDialog){
    $scope.addTodo = function ()
    {
        ngDialog.open({ template: 'loading.html', controller: 'sponzorsController', scope: $scope });//Mostramos el Loading
        Customization.setPeakTodo(
        $scope.todo.title,
        $scope.todo.description,
        $scope.todo.event.id,        
        $scope.todo.peak.id,
        0
    ).success(function(adata){
        //Limpiamos los datos
        if(adata.success){
            $scope.todo.title="";
            $scope.todo.description="";
            $scope.updateTodos();
            ngDialog.close();
            $scope.message="taskCreated";//Seteamos el mensaje de error
            ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope }); //Mostramos el mensaje
        }
        else{
            ngDialog.close();
            $scope.message="errorInFieldsTask";//Seteamos el mensaje de error
            ngDialog.open({ template: 'generalMessage.html', controller: 'eventsController', scope: $scope }); //Mostramos el mensaje
                
        }
               
        }).error(function(data) {
            console.log(data);
        });
    }
    $scope.updatePeak = function ()
    {
       Customization.getPeaks($scope.todo.event.id).success(function(adata) 
        {
            $scope.peaks=adata.Peaks;        
        });
    }
    $scope.updateTodos = function ()
    {
       Customization.getPeakTodo($scope.todo.peak.id).success(function(adata) 
        {
            $scope.todo.list=adata.Todos;        
        });
    }
    $scope.removeTodo = function(todoId)
    {         
        Customization.removeTodo(todoId).success(function(adata) 
        {
            //Si se borro exitosamente el todo entonces mostramos el template.
            $scope.message="removeTodo";
            ngDialog.open({ template: 'generalMessage.html', controller: 'todoController', scope: $scope });
            $scope.updateTodos();
        });
    }
    Customization.getEventsByOrganizer($scope.event.organizer).success(function(adata) 
    {
        $scope.events=adata.Events;
    });
}   


})();