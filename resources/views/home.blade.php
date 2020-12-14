@extends("layout")

@section("content")

<div class="container-fluid" ng-controller = "homectrl">
    
      <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">لوحة تحكم تطبيق دليل الموصل</h2>
                                    <a href = "items" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>اضافة خانة</a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-table"></i>
                                            </div>
                                            <div class="text">
                                                <h2>@{{cats}}</h2>
                                                <span>عدد الخانات</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>@{{jobs}}</h2>
                                                <span>الوظائف المتاحة</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
							
							   <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>@{{req}}</h2>
                                                <span>بحاجة الى وظيفة</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-list"></i>
                                            </div>
                                            <div class="text">
                                                <h2>@{{items}}</h2>
                                                <span>عدد الفعاليات</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                        
                          <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">طلبات اعلن معنا في انتظار الموافقة </h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>اسم المعلن</th>
                                                <th>اسم الفعالية</th>
                                                <th>رقم الهاتف</th>
                                                <th>عنوان </th>
                                                <th>وصف</th>
                                                <th>صور</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat = "da in adwithus">
                                                <th>
                                                    <a href="items?fromad=@{{da.id}}" class="btn btn-info"> نشر </a>
                                                    <button ng-click = "deletead(da.id)" class="btn btn-danger"> رفض </a>
                                                </th>
                                                <td>@{{da.addby}}</td>
                                                <td>@{{da.name}}</td>
                                                <td>@{{da.phone}}</td>
                                                <td>@{{da.address}}</td>
                                                <td>@{{da.details}}</td>
                                                
                                                <td><img width = "90px" ng-repeat = "x in parsejson(da.images)" src="@{{x}}"></td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							
							<div class="col-lg-6">
                                <h2 class="title-1 m-b-25">وظائف متاحة قيد النشر</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>نشر ؟</th>
                                                <th>التاريخ</th>
                                                <th>اسم المعلن</th>
                                                <th>العنوان الوظيفي</th>
                                                <th>رقم الهاتف</th>
                                                <th>عنوان </th>
                                                <th>وصف</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat = "da in joblist">
											   <td>
													<button class = "btn btn-primary" ng-click = "postjob(da.id,'yes')">موافق </button>
													<button class = "btn btn-danger" ng-click = "postjob(da.id,'no')">لا </button>
												</td>
                                                <td>@{{da.created_at}}</td>
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
							
								<div class="col-lg-6">
                                <h2 class="title-1 m-b-25">بحاجة الى وظائف (قيد النشر)</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
											   <th>نشر ؟ </th>
                                                <th>التاريخ</th>
                                                <th>الاسم</th>
                                                <th>العنوان الوظيفي</th>
                                                <th>رقم الهاتف</th>
                                                <th>عنوان </th>
                                                <th>معلومات</th>
                                             
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat = "da in reqlist">
                                                <td>
                                                     <button class = "btn btn-primary" ng-click = "postreq(da.id,'yes')">موافق </button>
													<button class = "btn btn-danger" ng-click = "postreq(da.id,'no')">لا </button>
                                                 </td>
                                                 <td>@{{da.created_at}}</td>
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

@endsection


@section("script")

<script src = "public/angular/homectrl.js?5324"></script>

@endsection
