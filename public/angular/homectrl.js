app.controller('homectrl', function($scope,$http,$interval){
    
    $scope.items = 0
    $scope.jobs =0
    $scope.req = 0
    $scope.cats  = 0

    $scope.getsummery = function(){
    $http({
  method: 'GET',
  url: 'api/summery'
}).then(function successCallback(response) {
  
    $scope.cats = response.data.cats

    $scope.items = response.data.items
    $scope.jobs = response.data.jobs
    $scope.req = response.data.req


    
  }, function errorCallback(response) {
   
  });
}
 

 $scope.parsejson = function (json) {
        return angular.fromJson(json)
    }



$scope.getpendingjobs = function(){
    $http({
  method: 'GET',
  url: 'api/pendingjobs'
}).then(function successCallback(response) {
  
   
    $scope.joblist = response.data.job
    $scope.reqlist = response.data.req
    $scope.adwithus = response.data.adwithus


    
  }, function errorCallback(response) {
   
  });
}


$scope.postjob = function(id,type){
    
        $http({
  method: 'GET',
  url: 'api/postjob/'+id+'/'+type
}).then(function successCallback(response) {
  
   
    $scope.getpendingjobs()


    
  }, function errorCallback(response) {
   
  });
    
}


$scope.postreq = function(id,type){
    
        $http({
  method: 'GET',
  url: 'api/postreq/'+id+'/'+type
}).then(function successCallback(response) {
  
   
    $scope.getpendingjobs()


    
  }, function errorCallback(response) {
   
  });
    
}


$scope.deletead = function(id){
    
        $http({
  method: 'delete',
  url: 'api/adwithus/'+id
}).then(function successCallback(response) {
  
   
    $scope.getpendingjobs()


    
  }, function errorCallback(response) {
   
  });
    
}


$interval(function(){
    $scope.getpendingjobs()
},3000)

$scope.getpendingjobs()    
$scope.getsummery()
    
    

    

























    
    
})