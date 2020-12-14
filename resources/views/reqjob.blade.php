@extends("layout")

@section("content")


<div ng-controller =  "reqjobctrl">


<div class="container-fluid" >
    

    <div class="card">
        <div class="card-header">
           بحاجة الى وظيفة 
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
                                    <th>اسم المعلن</th>
                                    <th>العنوان الوظيفي</th>
                                    <th>رقم الهاتف</th>
                                    <th>عنوان </th>
                                    <th>معلومات</th>
                                   
                                
                                </tr>
                            </thead>
                            <tbody>


                                <tr ng-repeat = "da in jobs">

                                    <td>
                                        <button class="btn btn-info" ng-click = "edit(da)"><i class="fa fa-edit"> </i></button>
                                        <button class="btn btn-danger" ng-click = "delete(da.id)"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <td>@{{da.createby}}</td>
                                    <td>@{{da.jobtitle}}</td>
                                    <td>@{{da.phone}}</td>
                                    <td>@{{da.jobaddress}}</td>
                                    <td>@{{da.jobdesc}}</td>

                                  
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
                <h5 class="modal-title" id="mediumModalLabel">اضافة وظيفة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                    <div class="row">

                        
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >الاسم</label>
                                <input type="text" class="form-control" ng-model= "createby">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >العنوان الوظيفي</label>
                                <input type="text" class="form-control" ng-model= "jobtitle">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >رقم الهاتف</label>
                                <input type="text" class="form-control" ng-model= "phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >عنوان</label>
                                <textarea type="text" class="form-control" ng-model= "jobaddress"> </textarea> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >معلومات عن الشخص</label>
                                <textarea type="text" class="form-control" ng-model= "jobdesc"> </textarea> 
                            </div>
                        </div>

                       
                      




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

<script src="public/angular/reqjobctrl.js"></script>
@endsection

