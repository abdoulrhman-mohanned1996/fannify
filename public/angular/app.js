var app =angular.module('dalelms', [])


app.directive('loading',   ['$http' ,function ($http)
    {
        return {
            restrict: 'A',
            link: function (scope, elm, attrs)
            {
                scope.isLoading = function () {
                    if($http.pendingRequests.length >0){
                          console.log($http.pendingRequests[0].url)
                    }
                  
                    return $http.pendingRequests.length > 0 && $http.pendingRequests[0].url !="api/pendingjobs";
                };

                scope.$watch(scope.isLoading, function (v)
                {
                    console.log(v)
                    if(v){

                         elm.css('display', 'block');
                    }else{
                        elm.css('display', 'none');
                    }
                });
            }
        };

    }]);