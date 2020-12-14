app.controller('slideshowctrl', function($scope,$http,$rootScope){
    
    
    $scope.getslideshow = function(){
    $http({
  method: 'GET',
  url: 'api/slideshow'
}).then(function successCallback(response) {
  
    $scope.slideshow = response.data.data
    
  }, function errorCallback(response) {
   
  });
}
    
    
$scope.getslideshow()
    

    
    $scope.clr = function(){
    $scope.titel = ""
    $scope.subtitle = ""
    $scope.slideshowid =""
  
    $scope.url=""

    $('.nav-pills a:first').tab('show')
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
    
    var url = "api/slideshow"
    
    if($scope.slideshowid){
        url = "api/slideshow/"+$scope.slideshowid
    }
    
    $http({
  method: 'post',
  url: url,
  data: {
      
    title:$scope.titel,
    subtitle:$scope.subtitle,
      img:$scope.url

  }
}).then(function successCallback(response) {
    
    $('.nav-pills a:last').tab('show')
    $scope.clr()
    $scope.getslideshow()
    
  }, function errorCallback(response) {
    
  });
}




$scope.edit = function(data){
    $scope.name = data.name

    $scope.url=data.url
    $scope.slideshowid = data.id

    $('.nav-pills a:last').tab('show')
}






//for delete api 
$scope.delete = function(id){
    $http({
  method: 'delete',
  url: 'api/slideshow/'+id
}).then(function successCallback(response) {
   
    
    $scope.getslideshow()
    
  }, function errorCallback(response) {
    
  });
}









    
    
})