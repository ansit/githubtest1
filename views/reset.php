<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>CaseManagement</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">

                <div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login1">
                    <div class="row mb15 table-layout">

                        <div class="col-xs-6 center-block text-center va-m pln">
                            <a href="#" title="Return to Dashboard">
                                <h1 style="color:#FFF">Forget Password </h1>
                            </a>
                        </div>

                        <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                                <a href="<?php echo base_url(); ?>login" class="" title="False Credentials">Back to Login</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-info mv10 heading-border br-n">

                        <!-- end .form-header section -->
						<?php
						$attributes = array('id'=>'contact');
						echo form_open('resetpasss/resetpass');
						?>
                        <!--<form method="post" action="resetpasss?code=<?php //echo $reset_code;?>" id="contact">-->
                            <div class="panel-body bg-white p15 pt25">
                            
                            <?php
                                if(validation_errors()) {?>
                                <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info pr10"></i><?php echo validation_errors(); ?></div>
                               <?php  } ?>
							   <?php
                                if($this->input->get('link')=='invalid') {?>
                                <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info pr10"></i>Activation code is invalid!</div>
                               <?php  } ?>
  		
								<div class="">
                                    <h4>Reset Password</h4>
                                </div>
        
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer p25 pv15">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section mn">
                                            <label for="email" class="field-label text-muted fs18 mb10 hidden">Password Reset</label>
                                            <div class="smart-widget sm-right smr-80">
                                                <label for="email" class="field prepend-icon">
                                                    <input type="password" name="password" id="password" class="gui-input" placeholder="Your password" required>
                                                     <input type="password" name="con_password" id="con_password" class="gui-input" placeholder="Your confirm password" required>
                                                   
                                                   
                                    
												   <?php
												       echo form_hidden('act_code',$act_code);
												       echo form_hidden('email',$email); ?>
                                                    <label for="email" class="field-icon"><i class="fa fa-envelope-o"></i>
                                                    </label>
                                                </label>
                                                <button class="button" type="submit">Submit</button>
                                                
                                            </div>
                                            <!-- end .smart-widget section -->
                                        </div>
                                        <!-- end section -->
                                    </div>

                                </div>

                            </div>
                            
                            
                             
                            <!-- end .form-footer section -->
                        </form>

                    </div>

                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
   <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/demo.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
