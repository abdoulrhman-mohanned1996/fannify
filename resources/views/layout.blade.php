<!DOCTYPE html>
<html lang="en" ng-app = "dalelms">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="لوحة تحكم تطبيق فني فاي">
    <meta name="author" content="Genius Solutions">
    

    <!-- Title Page-->
    <title>@yield("title","فني فاي")</title>

    <!-- Fontfaces CSS-->
    
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

</head>

<style>
	/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
	</style>
<div class="loading" data-loading="" style="display: none;">Loading…</div>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                       فني فاي
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                     
                        <li class="active has-sub">
                            <a class="js-arrow" href="home">
                                <i class="fas fa-tachometer-alt"></i>لوحة التحكم</a>
                          
                        </li>
                        <li>
                            <a href="category">
                                <i class="fas fa-list"></i>الاقسام</a>
                        </li>
                        <li>
                            <a href="items">
                                <i class="fas fa-table"></i>الحرفيين</a>
                        </li>
                      
                               <li>
                            <a href="slideshow">
                                <i class="fas fa-table"></i>سلايد شو</a>
                        </li>
                       
                       
						
						  
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
               فني فاي
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li class="{{ Request::segment(1) === 'home' ? 'active' :'' }}">
                            <a class="js-arrow" href="home">
                                <i class="fas fa-tachometer-alt"></i>لوحة التحكم</a>
                          
                        </li>
                        <li class="{{ Request::segment(1) === 'category' ? 'active' :'' }}">
                            <a href="category">
                                <i class="fas fa-list"></i>الاقسام</a>
                        </li>
                        <li class="{{ Request::segment(1) === 'items' ? 'active' :'' }}">
                            <a href="items">
                                <i class="fas fa-table"></i>الحرفيين</a>
                        </li>
                      <!-- <li class="{{ Request::segment(1) === 'ads' ? 'active' :'' }}" >
                            <a href="ads">
                                <i class="fas fa-table"></i>طلبات الاعلان</a>
                        </li> -->
                        
                       
                           <li class="{{ Request::segment(1) === 'slideshow' ? 'active' :'' }}">
                            <a href="slideshow">
                                <i class="fas fa-table"></i>سلايد شو</a>
                        </li>
						
						 
                      
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                            <div class="header-button">
                             
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="dashboardfiles/images/icon/avatar-01.jpg" alt="admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="dashboardfiles/images/icon/avatar-01.jpg" alt="admin" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Admin</a>
                                                    </h5>
                                                    <span class="email">Admin@funnyfi.com</span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                  
                                                <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
                
                 <!-- MAIN CONTENT-->
            <div class="main-content">
                
                   @yield("content","فني فاي")
                
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            
            
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
    
    <script src="angular/angular.min.js"></script>
    
    <script src="angular/app.js"></script>
    
    @yield("script")

</body>

</html>
<!-- end document-->