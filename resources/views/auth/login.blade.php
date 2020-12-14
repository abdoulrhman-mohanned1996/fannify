
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>تسجيل دخول</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="لوحة تحكم تطبيق فني فاي">
    <meta name="author" content="Genius Solutions">
	<meta charset="UTF-8" />


	<!-- Meta tag Keywords -->

    <link href="dashboardfiles/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="dashboardfiles/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="dashboardfiles/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="dashboardfiles/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="dashboardfiles/css/theme.css" rel="stylesheet" media="all">
	<!-- //web-fonts -->
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                               
                            </a>
                        </div>
                        <div class="login-form">
                             <form method="POST" action="{{ route('login') }}">
							  @csrf
                                <div class="form-group">
                                    <label>الأسم المستخدم</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="الاسم المستخدم">
                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="كلمة المرور">
                                </div>
                             
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">تسجيل دخول</button>
                                
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="dashboardfiles/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="dashboardfiles/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="dashboardfiles/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="dashboardfiles/vendor/slick/slick.min.js">
    </script>
    <script src="dashboardfiles/vendor/wow/wow.min.js"></script>
    <script src="dashboardfiles/vendor/animsition/animsition.min.js"></script>
    <script src="dashboardfiles/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="dashboardfiles/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="dashboardfiles/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="dashboardfiles/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="dashboardfiles/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="dashboardfiles/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="dashboardfiles/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="dashboardfiles/js/main.js"></script>

</body>

</html>