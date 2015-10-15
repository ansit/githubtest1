<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title> Case Management </title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/skin/default_skin/css/theme.css">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">
   <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
    function showimagepreview(input) {
    if (input.files && input.files[0]) {
    var filerdr = new FileReader();
    filerdr.onload = function(e) {
    $('#imgprvw').attr('src', e.target.result);
    }
    filerdr.readAsDataURL(input.files[0]);
    }
    }
    </script>
 
	
</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>
       <?php echo $right_panel;?>
     
       
    <!-- Start: Content-Wrapper -->


    <!-- Start: Content-Wrapper -->
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>admin_profile">Administrator Profile</a>
				</li>
			</ol>
                     
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->
	
  <?php if($this->session->flashdata('msg')){ ?> 
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php } ?>  
     <?php if(validation_errors()){?>
                 
                        <div class="alert alert-danger alert-dismissable"><?php echo validation_errors() ?></div>
                    
                        <?php } ?>                   
      <div id="content" class="animated fadeIn">
        <div class="row">
            <?php echo form_open_multipart('admin_profile/update_profile/'.$list[0]->UserID);?>
            
                <!---- <div class="col-md-12"> 
					<div class="alert alert-success dark alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-check pr10"></i>
						<strong>Use !</strong> For
						<a href="#" class="alert-link">Success</a>
					</div>
					
				</div> ---->
			
                <div class="col-md-12"> 
					<div class="col-md-4">
						<div class="fileupload fileupload-new admin-form" data-provides="fileupload">
							<div class="fileupload-preview thumbnail mb20">
	<img  alt="holder" id="imgprvw" src="<?php echo base_url(); ?>media/profile_img/admin/<?php echo $list[0]->ProfilePic;?>">
                			</div>
							<div class="row">
								
								<div class="col-xs-5">
									<span class="button btn-system btn-file btn-block">
										<span class="fileupload-new">Upload</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" id="profile_img" name="profile_img"  onChange="showimagepreview(this)">
                <input type="hidden" name="old_profile_img" id="old_profile_img"  value="<?php echo $list[0]->ProfilePic;?>">
									</span>
								</div>
							</div>
						</div> 
					</div>
				  <strong class="file-message"></strong>
				</div>
				
                <div class="col-md-6 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                               
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">First Name :</label>
								<div class="col-lg-8">
								<input  name="FirstName" value="<?php echo $list[0]->FirstName;?>"  class="form-control FirstName" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Last Name :</label>
								<div class="col-lg-8">
								<input  name="LastName" value="<?php echo $list[0]->LastName;?>"  class="form-control LastName" type="text" placeholder="Type Here...">
								</div>
								</div>
                                 
                               <!-- <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Position :</label>
								<div class="col-lg-8">
								<label class="field select prepend-icon">
										<select  name="Position" onChange="changefrm(this.value)">
										<option value=""> Select Position </option>
						<option value="individual"<?php if($list[0]->Position=='individual') {?> selected="selected" <?php }?>> Individual </option>
                        <option value="company"<?php if($list[0]->Position=='company') {?> selected="selected" <?php }?>> Company </option>
                        <option value="law_firm"<?php if($list[0]->Position=='law_firm') {?> selected="selected" <?php }?>> Law firm </option>
									</select>
                                        
                                      
									<i class="arrow double"></i> 
									</label>
								</div>
								</div>-->
                                
                               <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Address :</label>
								<div class="col-lg-8">
								<textarea name="Address" class="form-control Address"> <?php echo $list[0]->Address;?> </textarea>
								</div>
								</div>  
                                
                               	<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">City :</label>
								<div class="col-lg-8">
							    <input  name="City" value="<?php echo $list[0]->City;?>"class="form-control City" type="text">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">State :</label>
								<div class="col-lg-8">
							    <input id="state" name="State" value="<?php echo $list[0]->State;?>" class="form-control State" type="text">
								</div>
								</div>   
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Zip :</label>
								<div class="col-lg-8">
							    <input id="zip" name="Zip" maxlength="5" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" value="<?php echo $list[0]->Zip;?>" class="form-control Zip" type="text">
								</div>
								</div>  
                                
                                    
                                  
                            </div>
                        </div>
                    </div>
                </div> <!--close col-sm-6-->
				
				<div class="col-md-6 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
							
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Email :</label>
								<div class="col-lg-8">
								<input id="email_id" name="Email" value="<?php echo $list[0]->Email;?>" class="form-control Email" type="text">
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Password :</label>
								<div class="col-lg-8">
								<input name="Password" value="<?php echo $list[0]->Password;?>" class="form-control Password" type="password" >
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" >Phone Number :</label>
								<div class="col-lg-7 input-group"> <span class="input-group-addon" id="basic-addon1">+1</span>
								<input id="phone" name="PhoneNumber" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="10" value="<?php echo $list[0]->PhoneNumber;?>" class="form-control PhoneNumber" type="text">
								</div>
								</div>
							
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Firm Size :</label>
								<div class="col-lg-8">
									<input id="phone" name="Firm_CompanySize" value="<?php echo $list[0]->Firm_CompanySize;?>" class="form-control Firm_CompanySize" type="text">
								</div>
								</div>
								
								<!--<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">How Did You Hear AboutUs  :</label>
								<div class="col-lg-8">
								<textarea name="HowDidYouHearAboutUs" class="form-control"> <?php echo $list[0]->HowDidYouHearAboutUs;?> </textarea>
								</div>
								</div>-->
								
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Country :</label>
								<div class="col-lg-8">
							    <input name="Country" value="<?php echo $list[0]->Country;?>" class="form-control Country" type="text">
								</div>
								</div> 
								
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12" align="center">
                    <input type="hidden" value="<?php echo $list[0]->Email;?>" name="email_id"> 
					<button class="btn btn-primary update_admin_profile" type="submit" name="administrator_update"> 
					<i class="fa fa-refresh"></i>Update </button>
				
					<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>admin_dashboard'"> 
					<i class="fa fa-warning"></i> Cancel </button>
				</div>	
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>



        <!-- End: Content-Wrapper -->
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
     
			<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
			<script src="<?php echo base_url(); ?>media/alertify/profile.js"></script> 
    
    
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
    </script> <!-- End: Content-Wrapper -->   
 <?php echo $common_footer ?>       
        
        
