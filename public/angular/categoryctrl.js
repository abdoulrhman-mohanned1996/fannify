app.controller('catctrl', function($scope,$http,$rootScope){
    
    
    $scope.getcategories = function(){
    $http({
  method: 'GET',
  url: 'api/getsubservices'
}).then(function successCallback(response) {
  
    $scope.cats = response.data.data

   $scope.parentcats = $scope.cats.filter((item)=>item.service_id === "0");
  }, function errorCallback(response) {
   
  });
}
    
    
$scope.getcategories()
    
    

    
    $scope.clr = function(){
    $scope.name = ""
    $scope.service_id ="0"
    $scope.url=""
    $scope.catid = ""
}



$scope.uploadphoto = function (files) {
  // offer photo
  var fd = new FormData();
  console.log(files)
  $scope.progress = true
  for (var i = 0; i < files.length; i++) {
      fd.append("file[]", files[i]);
  }


  var apiUrl = 'api/uploadimage'

  $http.post(apiUrl, fd, {
      withCredentials: true,
      headers: { 'Content-Type': undefined },
      transformRequest: angular.identity
  }).then(function successCallback(response) {

      var parsed = angular.fromJson(response.data.data);

      $scope.imgurl = parsed[0]
      $scope.url = parsed[0]


  }, function errorCallback(response) {
      swal({
          title: "خطأ",
          text: "لم يتم رفع الصورة  ",
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "موافق"
      })
  }, function (progress) {
      console.log('uploading: ' + Math.floor(progress) + '%');
  });

}

// for save button 
$scope.save = function(){
    
    var url = "api/subservice"
    
    if($scope.catid){
        url = "api/subservice/"+$scope.catid
    }
    
    $http({
  method: 'post',
  url: url,
  data: { 
      
      title: $scope.name ,
      image:$scope.url,
      price:$scope.price,
      service_id : $scope.service_id



  }
}).then(function successCallback(response) {
    
    $("#mediumModal").modal("hide");
    $scope.clr()
    $scope.getcategories()
    
  }, function errorCallback(response) {
    
  });
}




$scope.edit = function(data){
    $("#mediumModal").modal("show");

    $scope.name = data.title
    $scope.url=data.image
    $scope.catid = data.id
    $scope.service_id = data.service_id
    $scope.price = data.price

    
}



$scope.getsub = function(id){
        console.log(id)
        return $scope.cats.filter((item)=>item.service_id == id)
    }


//for delete api 
$scope.delete = function(id){
    $http({
  method: 'delete',
  url: 'api/subservicee/'+id
}).then(function successCallback(response) {
   
    
    $scope.getcategories()
    
  }, function errorCallback(response) {
    
  });
}









    
    
})