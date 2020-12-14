app.controller('jobctrl', function($scope,$http,$interval){
    




$scope.getjobs = function(){
    $http({
  method: 'GET',
  url: 'api/jobsdashboard'
}).then(function successCallback(response) {
  
   
    $scope.jobs = response.data.data



    
  }, function errorCallback(response) {
   
  });
}

$scope.getjobs()



$scope.delete = function(id){
    
        $http({
  method: 'delete',
  url: 'api/jobs/'+id
}).then(function successCallback(response) {
  
   
    $scope.getjobs()


    
  }, function errorCallback(response) {
   
  });
    
}



    
   $scope.clr = function(){
       $scope.createby  = ""
       $scope.jobtitle = ""
       $scope.phone = ""
       $scope.jobaddress = ""
       $scope.jobdesc = ""
       $scope.jobid = ""

   }
   
   $scope.edit =  function(data){
    $("#mediumModal").modal("show");
    $scope.createby = data.createby
    $scope.jobtitle = data.jobtitle
    $scope.phone = data.phone
    $scope.jobaddress = data.jobaddress
    $scope.jobdesc = data.jobdesc
    $scope.jobid = data.id

   }


$scope.save = function () {

    var url = "api/jobs"

    if ($scope.jobid) {
        url = "api/jobs/" + $scope.jobid
    }

    $http({
        method: 'post',
        url: url,
        data: {

            createby: $scope.createby,
            jobtitle: $scope.jobtitle,
            phone: $scope.phone,
            jobaddress: $scope.jobaddress,
            jobdesc: $scope.jobdesc,
            posted :1
          


        }
    }).then(function successCallback(response) {
        
        $("#mediumModal").modal("hide");
        $scope.clr()
        $scope.getjobs()
        

    }, function errorCallback(response) {

    });
}

    
    
})