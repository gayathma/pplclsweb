<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="hash" content="<?php echo csrf_token(); ?>">
	<title>People Clues</title>

	
   <link rel="stylesheet" href="<?php echo asset('plugins/morris/morris.css') ?>">
   <!-- App css -->
   <link href="<?php echo asset('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/core.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/components.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/icons.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/pages.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/menu.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/responsive.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/rappid.min.css') ?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset('css/orgchart.css') ?>" rel="stylesheet" type="text/css" />
   <!--Chartist Chart CSS -->
   <link rel="stylesheet" href="<?php echo asset('plugins/chartist/dist/chartist.min.css') ?>">
   
   <!-- jQuery  -->
   <script src="<?php echo asset('js/jquery.min.js') ?>"></script>
   <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo asset('js/modernizr.min.js') ?>"></script>
   <!--Morris Chart-->
   <script src="<?php echo asset('plugins/morris/morris.min.js') ?>"></script>
   <script src="<?php echo asset('plugins/raphael/raphael-min.js') ?>"></script>

   <script src="<?php echo asset('plugins/chartist/dist/chartist.min.js') ?>"></script>
   <script src="<?php echo asset('plugins/chartist/dist/chartist-plugin-tooltip.min.js') ?>"></script>

   <!-- Flot chart js -->
   <script src="<?php echo asset('plugins/flot-chart/jquery.flot.js') ?>"></script>
   <script src="<?php echo asset('plugins/flot-chart/jquery.flot.pie.js') ?>"></script>


</head>
<body class="fixed-left">
	<!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <img src="\images\logo_sidebar.png" width="250px">
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Page title -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                    class="form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="/images/users/admin.png" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#">Welcome Admin</a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="#" >
                                    <i class="zmdi zmdi-settings"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-custom">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Navigation</li>

                            <li id="dash_main_menu">
                                <a href="/dash" class="waves-effect" id="dash_sub_menu"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" id="dynamics_main_menu"><i class="zmdi zmdi-chart"></i><span> Dynamics </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li id="analytic_sub_menu"><a href="/dash/analytical-designer" >Analytical Designer</a></li>
                                    <li  id="predict_sub_menu"><a href="/dash/team-structure">Predictive Analytics</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    	<?php echo $content; ?>
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 © People Clues.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
        var resizefunc = [];
        </script>


        <script src="<?php echo asset('js/detect.js') ?>"></script>
        <script src="<?php echo asset('js/fastclick.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.slimscroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.blockUI.js') ?>"></script>
        <script src="<?php echo asset('js/waves.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.nicescroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.scrollTo.min.js') ?>"></script>

        <!-- KNOB JS -->
    <!--[if IE]>
    <script type="text/javascript" src="<?php echo asset('plugins/jquery-knob/excanvas.js') ?>"></script>
    <![endif]-->
    <script src="<?php echo asset('plugins/jquery-knob/jquery.knob.js') ?>"></script>

    <!-- Counter Up  -->
    <script src="<?php echo asset('plugins/waypoints/lib/jquery.waypoints.js') ?>"></script>
    <script src="<?php echo asset('plugins/counterup/jquery.counterup.min.js') ?>"></script>

    <!-- Dashboard init -->
    <script src="<?php echo asset('pages/jquery.dashboard.js') ?>"></script>

    <!-- Org Chart JS -->
    <script src="<?php echo asset('js/lodash.min.js') ?>"></script>
    <script src="<?php echo asset('js/backbone-min.js') ?>"></script>
    <script src="<?php echo asset('js/rappid.min.js') ?>"></script>
    <script src="<?php echo asset('js/orgchart.js') ?>"></script>
    <script src="<?php echo asset('js/orgchart_apparel.js') ?>"></script>

    <!-- App js -->
    <script src="<?php echo asset('js/jquery.core.js') ?>"></script>
    <script src="<?php echo asset('js/jquery.app.js') ?>"></script>

</body>
</html>