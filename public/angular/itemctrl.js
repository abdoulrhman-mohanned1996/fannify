app.controller('itemctrl', function ($scope, $http, $interval) {


    
    
    
    $scope.getfromad = function (id) {
        if(!id){
            return;
        }
        
        
       $http({
           method: 'GET',
           url: 'api/getfromads/'+id
       }).then(function successCallback(response) {


       var data = response.data.data
       if(!data)
       return
       $("#mediumModal").modal("show");
       $scope.details = data.details
       $scope.hourwork = data.hourwork
       $scope.phone = data.phone
       $scope.whatsapp = data.whatsapp
       $scope.facebook=data.facebook
       $scope.insta = data.insta
       $scope.name = data.name
       $scope.address = data.address
       $scope.images = angular.fromJson(data.images)
          
           
        
       $scope.adid = id;
       


       }, function errorCallback(response) {

       });
   }
   
   
   $scope.latgo = function(lat,lng){
       $scope.lat = lat;
       $scope.lng = lng;
   }

   $scope.delete = function (id,da) {
       console.log(id)
       console.log(da)
       $http({
           method: 'delete',
           url: 'api/saveworkerr/'+id
       }).then(function successCallback(response) {


           $scope.getitems()



       }, function errorCallback(response) {

       });
   }
   
   
    $scope.deleteadaftersave = function (id) {
       $http({
           method: 'delete',
           url: 'api/saveworker/'+id
       }).then(function successCallback(response) {


        $("#mediumModal").modal("hide");
        $scope.clr()
        $scope.getitems()



       }, function errorCallback(response) {

       });
   }



   $scope.getitems = function () {
       $http({
           method: 'GET',
           url: 'api/getherfa'
       }).then(function successCallback(response) {


           $scope.items = response.data.data



       }, function errorCallback(response) {

       });
   }

   $scope.getitems()


   $scope.getcats = function () {
       $http({
           method: 'GET',
           url: 'api/getsubservices'
       }).then(function successCallback(response) {


           $scope.cats = response.data.data
           $scope.parentcats = response.data.data.filter((item) => item.service_id === "0")



       }, function errorCallback(response) {

       });
   }

   $scope.getsubcat = function (id) {
    $scope.checkedFruits = [];
       console.log(id)
       $scope.subcatlist = $scope.cats.filter((item) => item.service_id == id)
     
   }

   $scope.getcats()

   $scope.parsejson = function (json) {
       return angular.fromJson(json)
   }


   $scope.checkedFruits = [];
   $scope.toggleCheck = function (fruit) {
       if ($scope.checkedFruits.indexOf(fruit) === -1) {
           $scope.checkedFruits.push(fruit);
       } else {
           $scope.checkedFruits.splice($scope.checkedFruits.indexOf(fruit), 1);
       }

       console.log($scope.checkedFruits)
   };


   $scope.getcatname = function (id) {


       if ($scope.cats) {
          var f =  $scope.cats.filter((item) => item.id == id)

           if(f.length > 0){
               return f[0].name
           }
       }


   }


   $scope.images = []
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
           console.log(parsed)
           for (let index = 0; index < parsed.length; index++) {
               const element = parsed[index];
               $scope.images.push(element)
           }
         

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

   $scope.clr = function(){
       
    $scope.isedited = false
       
       $scope.title = ""
       $scope.img = ""
       $scope.name = ""
       $scope.phone = ""

       $scope.parent = ""
       $scope.rate = ""
       $scope.parent =""
       $scope.address = ""
       $scope.images = []
       
   }
   
   $scope.edit = function (data) {
       $("#mediumModal").modal("show");
       $scope.title = data.title
       $scope.parent = data.service_id
       $scope.getsubcat($scope.parent)
       $scope.phone = data.phone
       $scope.rate = data.rate
       var arrayofids = data.subservices_id.split(',');
       for (let index = 0; index < arrayofids.length; index++) {
           const element = arrayofids[index];
           

           $scope.toggleCheck(element.id) 
           console.log($scope.checkedFruits)

       }
       $scope.name=data.name
     $scope.cardid = data.cardid,
    $scope.email = data.email,
    

   
 


       $scope.itemid = data.id
       $scope.isedited = true
     
   

   }

   $scope.save = function () {

       var url = "api/saveworker"
var data =  {

    name: $scope.name,
  
    phone: $scope.phone,
    subservices_id:  $scope.checkedFruits.toString(),
    img: $scope.images[0],
    service_id:$scope.parent,
    cardid:$scope.cardid,
    usertype:"worker",
    email: $scope.email,
    
    password:$scope.password,
  


}
       if ($scope.itemid) {
           url = "api/saveworker/" + $scope.itemid
           data = {

            name: $scope.name,
          
            phone: $scope.phone,
            subservices_id:  $scope.checkedFruits.toString(),
            service_id:$scope.parent,
            cardid:$scope.cardid,
            email: $scope.email,
           


        }
       }

       $http({
           method: 'post',
           url: url,
           data: {

               name: $scope.name,
             
               phone: $scope.phone,
               subservices_id:  $scope.checkedFruits.toString(),
               img: $scope.images[0],
               service_id:$scope.parent,
               cardid:$scope.cardid,
               usertype:"worker",
               email: $scope.email,
               
               password:$scope.password,
             


           }
       }).then(function successCallback(response) {
           
           $("#mediumModal").modal("hide");
           $scope.clr()
           $scope.getitems()
       

       }, function errorCallback(response) {

       });
   }


})