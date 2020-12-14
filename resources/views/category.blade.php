@extends("layout")

@section("content")


<div ng-controller =  "catctrl">


<div class="container-fluid" >
    

    <div class="card">
        <div class="card-header">
            الخانات (الأقسام)
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
                                    <th></th>
                                    <th>الأسم</th>
                                    <th></th>
                                
                                </tr>
                            </thead>
                            <tbody>


                                <tr ng-repeat = "da in parentcats">

                                   <td> 
                                    
                                    <a  style = "box-shadow: 13px 6px 16px 0px #000000a3;" ng-if="(getsub(da.id)).length>0"
                                        data-toggle="collapse" href="#collapseExample@{{$index}}"
                                        role="button" aria-expanded="false"
                                        aria-controls="collapseExample@{{$index}}">

                                        <img width="70px" style="border-radius: 50px;" src="@{{da.image}}" > 
                                         
                                        
                                    </a>

                                    <img ng-if="(getsub(da.id)).length==0"  width="70px" style="border-radius: 50px;" src="@{{da.image}}" > 

                                    <div class="collapse" id="collapseExample@{{$index}}">
                                        <div style="margin-top: 10px;">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>فئة فرعية</th>
                                                        <th></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="sub in getsub(da.id)">
                                                        <td>@{{sub.title}}</td>
                                                        <td> 
                                                            <button class="btn btn-primary"
                                                                ng-click="edit(sub)"> <i
                                                                    class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-primary"
                                                            ng-click="delete(sub.id)"> <i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                
                                </td>
                                   <td>@{{da.title}}</td>
                                   <td>
                                       <button class="btn btn-info" ng-click = "edit(da)"><i class="fa fa-edit"> </i></button>
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
                <h5 class="modal-title" id="mediumModalLabel">اضافة قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                    <div class="row">

                        
                        <div class="col-md-12" ng-init = "service_id='0'">
                            <div class="form-group">
                                <label>القسم الأب</label>
                                <select name="select" id="select2" class="form-control" ng-model = "service_id">

                                    <option value="0">
                                        قسم اساسي
                                    </option>

                                    <option ng-repeat = "da in parentcats" value="@{{da.id}}">
                                        @{{da.title}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >اسم القسم</label>
                                <input type="text" class="form-control" ng-model= "name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >سعر الخدمة</label>
                                <input type="text" class="form-control" ng-model= "price">
                            </div>
                        </div>

                        <style>
                            input[type="file"] {
                                display: none;
                            }
                        </style>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >الايقونة</label>
                                <img src="@{{url}}" width="70px" style="border-radius: 50px;">
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

<script src="angular/categoryctrl.js?48"></script>
@endsection

