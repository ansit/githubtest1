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
					<a href="#">User Profile</a>
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
    
    <div id="content" class="animated fadeIn">
        <div class="row">
            <?php echo form_open_multipart('user_profile/update_profile/'.$list[0]->UserID);?>
            
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
									<input type="file" name="profile_img" id="profile_img" onChange="showimagepreview(this)">
                <input type="hidden" name="old_profile_img" id="old_profile_img" value="<?php echo $list[0]->ProfilePic;?>">
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
                <div class="col-md-6">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                               
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">First Name :</label>
								<div class="col-lg-8">
								<input  name="FirstName" value="<?php echo $list[0]->FirstName;?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Last Name :</label>
								<div class="col-lg-8">
								<input  name="LastName" value="<?php echo $list[0]->LastName;?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Position :</label>
								<div class="col-lg-8">
								<input  name="Position" value="<?php echo $list[0]->Position;?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                               <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Address :</label>
								<div class="col-lg-8">
								<textarea name="Address" class="form-control"> <?php echo $list[0]->Address;?> </textarea>
								</div>
								</div>  
                                
                               	<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">City :</label>
								<div class="col-lg-8">
							    <input  name="City" value="<?php echo $list[0]->City;?>" class="form-control" type="text">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">State :</label>
								<div class="col-lg-8">
							    <input id="state" name="State" value="<?php echo $list[0]->State;?>" class="form-control" type="text">
								</div>
								</div>   
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Zip :</label>
								<div class="col-lg-8">
							    <input id="zip" name="Zip" value="<?php echo $list[0]->Zip;?>" class="form-control" type="text">
								</div>
								</div>  
                                
                                    
                                  
                            </div>
                        </div>
                    </div>
                </div> <!--close col-sm-6-->
				
				<div class="col-md-6">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
							
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Email :</label>
								<div class="col-lg-8">
								<input id="email_id" name="Email" value="<?php echo $list[0]->Email;?>" class="form-control" type="text">
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Password :</label>
								<div class="col-lg-8">
								<input name="Password" value="<?php echo $list[0]->Password;?>" class="form-control" type="password" >
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Phone Number :</label>
								<div class="col-lg-8">
								<input id="phone" name="PhoneNumber" value="<?php echo $list[0]->PhoneNumber;?>" class="form-control" type="text">
								</div>
								</div>
							
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Firm Size :</label>
								<div class="col-lg-8">
									<input id="phone" name="Firm_CompanySize" value="<?php echo $list[0]->Firm_CompanySize;?>" class="form-control" type="text">
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">How Did You Hear AboutUs  :</label>
								<div class="col-lg-8">
								<textarea name="HowDidYouHearAboutUs" class="form-control"> <?php echo $list[0]->HowDidYouHearAboutUs;?> </textarea>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Country :</label>
								<div class="col-lg-8">
							    <input name="Country" value="<?php echo $list[0]->Country;?>" class="form-control" type="text">
								</div>
								</div> 
								
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12" align="center">
					<button class="btn active btn-primary" type="submit" name="administrator_update"> 
					<i class="fa fa-refresh"></i>Update </button>
					<button class="btn active btn-system " type="reset"> <i class="fa fa-refresh"></i>  Reset </button>
					<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>admin_dashboard'"> 
					<i class="fa fa-warning"></i> Cancel </button>
				</div>	
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>



        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
