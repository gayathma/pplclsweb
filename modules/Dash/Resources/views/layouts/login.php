<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BI Tool to select the best team for a given project.">
    <meta name="author" content="People Clues">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>People Clues</title>

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

    </head>
    <body>

        <div class="animationload">
            <div class="loader"></div>
        </div>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
                <div class="panel-heading"> 
                    <h3 class="text-center"> Sign In to <strong class="text-custom">People Clues</strong> </h3>
                </div> 


                <div class="panel-body">
                    <form class="form-horizontal m-t-20" role="form" method="POST" action="/auth/login" id="loginform">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text"  placeholder="Email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password"  placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox" name="remember">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form> 

                </div>   
            </div>                              
            <div class="row">
            	<div class="col-sm-12 text-center">
            		<p>Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>

                </div>
            </div>
            
        </div>
        
        

        
        <script>
        var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo asset('js/jquery.min.js') ?>"></script>
        <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo asset('js/detect.js') ?>"></script>
        <script src="<?php echo asset('js/fastclick.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.slimscroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.blockUI.js') ?>"></script>
        <script src="<?php echo asset('js/waves.js') ?>"></script>
        <script src="<?php echo asset('js/wow.min.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.nicescroll.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.scrollTo.min.js') ?>"></script>

        <script src="<?php echo asset('js/jquery.form.js') ?>"></script>

         <!--Form Validation-->
        <script src="<?php echo asset('plugins/bootstrapvalidator/dist/js/bootstrapValidator.js') ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
        <!-- select2  -->
        <script src="<?php echo asset('plugins/select2/select2.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap-select  -->
        <script src="<?php echo asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') ?>" type="text/javascript"></script>
        <!-- moment -->
        <script src="<?php echo asset('plugins/moment/moment.js') ?>"></script>
        <!-- daterangepicker -->
        <script src="<?php echo asset('plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

        <script src="<?php echo asset('js/jquery.core.js') ?>"></script>
        <script src="<?php echo asset('js/jquery.app.js') ?>"></script>

        <script src="<?php echo asset('js/app.js') ?>"></script>

        <script type="text/javascript">
        $(function(){
            $('#loginform').validate({
                rules:{
                    email:{
                        required:true
                    },
                    password:{
                        required:true
                    }
                },
                submitHandler: function(form){
                    $(form).ajaxSubmit({
                        dataType:  'json',
                        beforeSubmit:bw.lockform(form),
                        success: function(response){
                            if(!response.success){
                                bw.unlockform(form)
                            }                   
                        }
                    });
                }
            });
        }); 
        </script>

    </body>
    </html>