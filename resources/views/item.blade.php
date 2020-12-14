@extends("layout")

@section("content")


<div ng-controller="itemctrl" id="angelem">


    <div class="container-fluid">


        <div class="card">
            <div class="card-header" ng-init="getfromad('{{ app('request')->input('fromad') }}')">
                الحرفيين

            </div>


            <!-- end modal medium -->

            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#mediumModal">اضافة
                            حرفي</button>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>


                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>صورة</th>
                                        <th>تعديل | حذف</th>
                                        <th>اسم الحرفي</th>
                                        <th>القسم</th>
                                        <th>رقم الهاتف</th>
                                        <th>التقييم</th>
                                        <th>رقم الهوية</th>






                                    </tr>
                                </thead>
                                <tbody>


                                    <tr ng-repeat="da in items">

                                        <td>
                                            <img src="@{{da.img}}">
                                        </td>

                                        <td>
                                            <button class="btn btn-info" ng-click="edit(da)"><i class="fa fa-edit">
                                                </i></button>
                                            <button class="btn btn-danger" ng-click="delete(da.id,da)"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>

                                        <td>@{{da.name}}</td>
                                        <td>@{{da.title}}</td>
                                        <td>@{{da.phone}}</td>
                                        <td>@{{da.rate}}</td>
                                        <td>@{{da.cardid}}</td>



                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </div>
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">اضافة حرفي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>القسم الرئيسي</label>
                                <select name="select" id="select2" class="form-control" ng-model="parent"
                                    ng-change="getsubcat(parent)">



                                    <option ng-repeat="da in parentcats" value="@{{da.id}}">
                                        @{{da.title}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6" ng-repeat="fruit in subcatlist">
                            <input type='checkbox' ng-checked="checkedFruits.indexOf(fruit.id) != -1"
                                ng-click="toggleCheck(fruit.id)">
                            <label>@{{fruit.title}}</label>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الحرفي</label>
                                <input type="text" class="form-control" ng-model="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الايميل</label>
                            <input type="text" class="form-control" ng-model="email">
                        </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" class="form-control" ng-model="phone">
                            </div>
                        </div>
                        <div class="col-md-6" ng-show="isedited==true">
                            <div class="form-group">
                                <label>الباسورد</label>
                                <input type="text" class="form-control" ng-model="password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الهوية</label>
                                <input type="text" class="form-control" ng-model="cardid">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <img ng-repeat="da in images" src="@{{da}}" width="200px" style="margin: 5px;">
                                <label for="file-upload" class="btn btn-info btn-block">اختيار صورة</label>
                            </div>
                        </div>
                        <input id="file-upload" type="file" name="file[]"
                            onchange="angular.element(this).scope().uploadphoto(this.files)" />

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="clr()">الغاء</button>
                    <button type="button" class="btn btn-primary" ng-click="save()">حفظ</button>
                </div>
            </div>
        </div>
    </div>






    @endsection

    @section("script")

    <script src="angular/itemctrl.js?addadwithus"></script>



    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 36.3935834, lng: 43.1815793 },
                zoom: 14
            });



            var marker;

            google.maps.event.addListener(map, 'click', function (event) {
                placeMarker(event.latLng);
            });


            function placeMarker(location) {

                if (marker == null) {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
                else {
                    marker.setPosition(location);
                }
            }


            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });


            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }



                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }


                    // Create a marker for each place.


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });



            google.maps.event.addListener(map, "click", function (e) {

                //lat and lng is available in e object
                var latLng = e.latLng;

                console.log(latLng.lat())

                angular.element(document.getElementById('angelem')).scope().latgo(latLng.lat(), latLng.lng());

            });

        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbjievsPTdcjqBTQLn3TV97nUjf2xGrWo&libraries=places&callback=initMap"
        async defer></script>
    @endsection