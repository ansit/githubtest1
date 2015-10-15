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
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    

                    <div class="panel panel-info mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                          
                           <div class="section row mn">
								<label><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h3></label>
                                <!--<div class="col-sm-4">
                                    <a  class="button btn-social facebook span-left mr5 btn-block">
                                        <span><i class="fa fa-group"></i>
                                        </span>Login</a>
                                </div>-->
                                
                            </div>
                        </div>
							<?php if(validation_errors()) {?>
                           
                             <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo validation_errors(); ?>
                                </div> 
                          <?php }?>  
                          
                         <?php if($this->session->flashdata('msg')){ ?> 
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php } ?>  
                        
                         <?php  if($this->input->get('change')=='success') {?>  
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       Password change successfully please login!
                        </div>
                        <?php } ?> 
                        
                              
                        <!-- end .form-header section -->
                        <?php
                        $attributes = array('class' => 'logform', 'id' => 'contact','name' => 'frm_login');
                        echo form_open('login', $attributes); ?>
                                <div class="panel-body bg-light p30">
                                
                              
                                
                                
                                
                                <div class="row">
                                    <div class="col-sm-7 pr30">

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Email id </label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="email" name="email" id="email" class="gui-input" value="<?php echo set_value('email'); ?>" placeholder="Enter email">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="user_password" id="user_password" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
			
                                        <!-- end section -->

                                    </div>
                                    
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" name="logsub" class="button btn-primary pull-left">Login</button>
                                <label class="switch block switch-primary pull-right input-align mt10">
                                    <a href='<?php echo base_url(); ?>forgetpassword'> Forgot Password </a> &nbsp; &nbsp; &nbsp;  | &nbsp; &nbsp; &nbsp; 
									<a href='<?php echo base_url(); ?>register'> New Registration </a>
                                </label>
                            </div>
                            <!-- end .form-footer section -->
                       <?php form_close()?>
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
