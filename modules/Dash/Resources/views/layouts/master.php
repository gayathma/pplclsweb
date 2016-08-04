<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="BI Tool to select the best team for a given project.">
        <meta name="author" content="People Clues">

        <link rel="shortcut icon" href="/images/favicon.ico">

        <title>People Clues</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo asset('plugins/morris/morris.css') ?>">
        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="<?php echo asset('plugins/jquery.steps/demo/css/jquery.steps.css') ?>" />
         <!-- multiselect css-->
        <link href="<?php echo asset('plugins/multiselect/css/multi-select.css') ?>"  rel="stylesheet" type="text/css" />
        <!-- select2 css-->
        <link href="<?php echo asset('plugins/select2/select2.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap-select css-->
        <link href="<?php echo asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet" />
         <!-- Daterangepicker -->
        <link href="<?php echo asset('plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

        <!-- Custom box css -->
        <link href="<?php echo asset('plugins/custombox/dist/custombox.min.css') ?>" rel="stylesheet">

        <!-- Sweet Alert -->
        <link href="<?php echo asset('plugins/sweetalert/dist/sweetalert.css') ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo asset('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/core.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/components.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/icons.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/pages.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/menu.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo asset('css/responsive.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo asset('js/modernizr.min.js')?>"></script>
         <!-- jQuery  -->
        <script src="<?php echo asset('js/jquery.min.js') ?>"></script>
        <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
            <!--Form Validation-->
        <script src="<?php echo asset('plugins/bootstrapvalidator/dist/js/bootstrapValidator.js') ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/jquery-validation/dist/jquery.validate.min.js') ?>"></script>

        <script src="<?php echo asset('plugins/highcharts/highcharts.js') ?>"></script>
        <script src="<?php echo asset('plugins/highcharts/exporting.js') ?>"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="/dash" class="logo"><img src="/images/logo.png" alt="logo"></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">
                        <?php 
                            $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
                            \App::setLocale($lang);
                        ?>
                        <ul class="nav navbar-nav navbar-right pull-right">
                                <li>
                                    <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                         <input type="text" placeholder="<?php echo  Lang::get('custom.search');?>..." class="form-control">
                                         <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </li>
                                
                                  <?php 
                                  if($lang == 'en'):?>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('si')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >සිංහල</span>
                                      </a>
                                    </li>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('ta')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >தமிழ்</span>
                                      </a>
                                    </li>
                                  <?php elseif($lang == 'si'):?>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('en')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >English</span>
                                      </a>
                                    </li>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('ta')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >தமிழ்</span>
                                      </a>
                                    </li>
                                  <?php elseif($lang == 'ta'):?>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('en')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >English</span>
                                      </a>
                                    </li>
                                    <li class="dropdown hidden-xs">
                                      <a onclick="languageTranslate('si')" href="javascript;" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                          <span >සිංහල</span>
                                      </a>
                                    </li>
                                  <?php endif;?>
                                

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="/images/admin.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/dash/general-setting/edit"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                        <li><a href="/auth/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu" id="dash_menu">

                            <a href="/dash"><i class="md md-dashboard"></i><?php echo  Lang::get('custom.dashboard');?></a>

                        </li>

                        <li class="has-submenu" id="team_builder_menu">
                            <a href="/dash/team-builder"><i class="md md-account-circle"></i><?php echo  Lang::get('custom.team_builder');?></a>
                        </li>

                        <li class="has-submenu" id="projects_menu">
                            <a href="/dash/projects"><i class="md md-folder-special"></i><?php echo  Lang::get('custom.projects');?></a>
                        </li>
                        
                        <li class="has-submenu" id="human_resources_menu">
                            <a href="/dash/human-resources"><i class="md md-group"></i><?php echo  Lang::get('custom.hr');?></a>
                        </li>

                        <li class="has-submenu" id="analytics_menu">
                            <a href="#"><i class="md  md-insert-chart"></i><?php echo  Lang::get('custom.analytics');?></a>
                            <ul class="submenu">
                                <li id="analytical_designer_menu"><a href="/dash/analytics/analytical-designer"><?php echo  Lang::get('custom.analytical_designer');?></a></li>
                                <li id="predictive_analytics_menu"><a href="#"> <?php echo  Lang::get('custom.predictive_analytics');?></a></li>
                            </ul>
                        </li>

                        <li class="has-submenu" id="settings_menu">
                            <a href="#"><i class="md md-settings"></i><?php echo  Lang::get('custom.settings');?></a>
                            <ul class="submenu">
                                <li id="general_setting_menu"><a href="/dash/general-setting/edit"> <?php echo  Lang::get('custom.general_settings');?></a></li>
                                <li id="roles_menu"><a href="/dash/roles"> <?php echo  Lang::get('custom.roles');?></a></li>
                                <li id="technology_menu"><a href="/dash/technologies"> <?php echo  Lang::get('custom.technologies');?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- End navigation menu        -->
                </div>
            </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Content -->
                  <?php echo $content; ?>
                <!-- End Page-Content -->

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                2016 © People Clues.
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
        </div>



       
        <script src="<?php echo asset('js/detect.js') ?>"></script>
        <script src="<?php echo asset('js/fastclick.js') ?>"></script>

        <script src="<?php echo asset('js/jquery.slimscroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.blockUI.js') ?>"></script>
        <script src="<?php echo asset('js/waves.js') ?>"></script>
        <script src="<?php echo asset('js/wow.min.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.nicescroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.scrollTo.min.js') ?>"></script>

        <script src="<?php echo asset('plugins/peity/jquery.peity.min.js') ?>"></script>

        <!-- jQuery  -->
        <script src="<?php echo asset('plugins/waypoints/lib/jquery.waypoints.js') ?>"></script>
        <script src="<?php echo asset('plugins/counterup/jquery.counterup.min.js') ?>"></script>

        <script src="<?php echo asset('plugins/morris/morris.min.js') ?>"></script>
        <script src="<?php echo asset('plugins/raphael/raphael-min.js') ?>"></script>

        <script src="<?php echo asset('plugins/jquery-knob/jquery.knob.js') ?>"></script>

        <script src="<?php echo asset('pages/jquery.dashboard.js') ?>"></script>

        <script src="<?php echo asset('js/jquery.form.js') ?>"></script>

        <!-- Modal-Effect -->
        <script src="<?php echo asset('plugins/custombox/dist/custombox.min.js') ?>"></script>
        <script src="<?php echo asset('plugins/custombox/dist/legacy.min.js') ?>"></script>

        <!-- Notifyjs -->
        <script src="<?php echo asset('plugins/notifyjs/dist/notify.min.js') ?>"></script>
        <script src="<?php echo asset('plugins/notifications/notify-metro.js') ?>"></script>

        <!-- Sweet-Alert  -->
        <script src="<?php echo asset('plugins/sweetalert/dist/sweetalert.min.js') ?>"></script>

        <script src="<?php echo asset('js/jquery.core.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.app.js') ?>"></script>

          <!-- multiselect  -->
        <script type="text/javascript" src="<?php echo asset('plugins/multiselect/js/jquery.multi-select.js') ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/jquery-quicksearch/jquery.quicksearch.js') ?>"></script>
        <!-- select2  -->
        <script src="<?php echo asset('plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap-select  -->
        <script src="<?php echo asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') ?>" type="text/javascript"></script>

        <!-- moment -->
        <script src="<?php echo asset('plugins/moment/moment.js') ?>"></script>

        <!-- daterangepicker -->
        <script src="<?php echo asset('plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

        <!--Form Wizard-->
        <script src="<?php echo asset('plugins/jquery.steps/build/jquery.steps.min.js') ?>" type="text/javascript"></script>

        <!--wizard initialization-->
        <script  type="text/javascript">
            !function($) {
                "use strict";

                var FormWizard = function() {};

                FormWizard.prototype.createBasic = function($form_container) {
                    $form_container.children("div").steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "slideLeft"
                    });
                    return $form_container;
                },
                //creates form with validation
                FormWizard.prototype.createValidatorForm = function($form_container) {
                    $form_container.validate({
                        errorPlacement: function errorPlacement(error, element) {
                            element.after(error);
                        }
                    });
                    $form_container.children("div").steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        labels: {
                            finish: "<?php echo  Lang::get('custom.finish');?>",
                            next: "<?php echo  Lang::get('custom.next');?>",
                            previous: "<?php echo  Lang::get('custom.previous');?>"
                        },
                        onStepChanging: function (event, currentIndex, newIndex) {
                            $form_container.validate().settings.ignore = ":disabled,:hidden";

                            if(currentIndex === 1){
                                if($().length){
                                    return false;
                                }else{
                                    return true;
                                }
                            }

                            return $form_container.valid();
                        },
                        onStepChanged: function (event, currentIndex, priorIndex)
                        {
                            if (priorIndex === 0)
                            {
                                $.ajax({
                                    url: '/dash/team-builder/phases',
                                    type: 'get',
                                    data: {
                                        project_id : $('#project').val()
                                    },
                                    success: function (response) {
                                        $('.step_two').html(response);                   
                                    }
                                });
                            }
                        },
                        onFinishing: function (event, currentIndex) {
                            $form_container.validate().settings.ignore = ":disabled";
                            return $form_container.valid();
                        },
                        onFinished: function (event, currentIndex) {
                            var button = $('#team_builder_form').find('a[href="#finish"]');
                            button.attr("href", '#finish-disabled');
                            button.parent().addClass("disabled");

                            var pre = $('#team_builder_form').find('a[href="#previous"]');
                            pre.attr("href", '#previous-disabled');
                            pre.parent().addClass("disabled");

                            $('#loader').show();
                            var form = $('#team_builder_form');
                            $(form).submit();
                        }
                    });

                    return $form_container;
                },
                //creates vertical form
                FormWizard.prototype.createVertical = function($form_container) {
                    $form_container.steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "fade",
                        stepsOrientation: "vertical"
                    });
                    return $form_container;
                },
                FormWizard.prototype.init = function() {
                    //initialzing various forms

                    //form with validation
                    this.createValidatorForm($("#team_builder_form"));

                },
                //init
                $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.FormWizard.init()
                $.ajax({
                    url: '/dash/team-builder/algorithm-accuracy',
                    type: 'get',
                    data: {
                        project_id : $('#project').val()
                    },
                    success: function (response) {
                        $('.step_four').html(response);                   
                    }
                });
            }(window.jQuery);
        </script>

        <script src="<?php echo asset('js/app.js') ?>"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $(".knob").knob();
            });

            function languageTranslate(lang){
              $.ajax({
                url: '/dash/general-setting/translate',
                type: 'get',
                data: {
                  lang : lang
                },
                success: function (response) {
                  location.reload();  
                }
              });
            }
        </script>


    </body>
</html>