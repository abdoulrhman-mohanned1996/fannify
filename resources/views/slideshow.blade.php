@extends("layout")

@section("content")


<div ng-controller =  "slideshowctrl">


<div class="container-fluid" >
    

    <div class="card">
        <div class="card-header">
        السلايد شو
        </div>
        
   
        <!-- end modal medium -->

        <div class="card-body">
            <div class="row">
                
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#mediumModal">اضافة</button>
                </div>

               <div class="col-md-12">
                   <hr>
               </div> 


                <div class="col-md-12">
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th>الأسم</th>
                                    <th>التقاصيل</th>
                                    <th>حذف</th>
                                
                                </tr>
                            </thead>
                            <tbody>


                                <tr ng-repeat = "da in slideshow">

                                <td>
                                    <img width="400px"  src="@{{da.img}}">        
                                </td>
                                <td>@{{da.title}}</td>
                                <td>@{{da.subtitle}}</td>
                                   <td>
                                      
                                       <button class="btn btn-danger" ng-click = "delete(da.id)"><i class="fa fa-trash"></i></button>
                                   </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>

    
</div>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">اضافة سلايد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                              
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >اسم الاعلان</label>
                                <input type="text" class="form-control" ng-model= "titel">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >التقاصيل</label>
                                <input type="text" class="form-control" ng-model= "subtitle">
                            </div>
                        </div>
                    <div class="row">

                       
                        

                        <style>
                            input[type="file"] {
                                display: none;
                            }
                        </style>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >الصورة</label>
                                <img src="@{{url}}" width="400px" >
                                <label for="file-upload" class="btn btn-info btn-block">اختيار صورة</label>
                            </div>
                        </div>
                        
                        <input id="file-upload" type="file" name="file[]"
                                            onchange="angular.element(this).scope().uploadphoto(this.files)" />




                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click ="clr()">الغاء</button>
                <button type="button" class="btn btn-primary" ng-click = "save()">حفظ</button>
            </div>
        </div>
    </div>
</div>
    
</div>




@endsection

@section("script")

<script src="angular/slideshowctrl.js?dd"></script>
@endsection

