<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?php echo $title?></title>
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
					<a href="#"><?php echo $heading?></a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->
    <?php //print_r($user_data) ?>
     <?php if($user_data!=''){ 
		$FirstName = $user_data[0]->FirstName;
		$LastName = $user_data[0]->LastName;
		$Position = $user_data[0]->Position;
		$Address = $user_data[0]->Address;
		$City = $user_data[0]->City;
		$State = $user_data[0]->State;
		$Zip = $user_data[0]->Zip;
		$Country = $user_data[0]->Country;
		$Email = $user_data[0]->Email;
		$Password = $user_data[0]->Password;
		$PhoneNumber = $user_data[0]->PhoneNumber;
		$Firm_CompanySize = $user_data[0]->Firm_CompanySize;
		$HowDidYouHearAboutUs = $user_data[0]->HowDidYouHearAboutUs;
		$ProfilePic = $user_data[0]->ProfilePic;
    ?>
	 <?php } else { 
	    $FirstName = '';
		$LastName = '';
		$Position = '';
		$Address = '';
		$City = '';
		$State = '';
		$Zip = '';
		$Country = '';
		$Email = '';
		$Password = '';
		$PhoneNumber = '';
		$Firm_CompanySize = '';
		$HowDidYouHearAboutUs = '';
		$ProfilePic ='';
	 
	 ?>
      <?php } ?>
    
    
    <div id="content" class="animated fadeIn">
        <div class="row">
            <?php if($user_data!=''){ ?>
             <?php echo form_open_multipart('user/add_edit_user/'.$user_data[0]->UserID);?>
			 <?php } else { ?>
           <?php echo form_open_multipart('user/add_edit_user');?>
             <?php } ?>
             
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
	<img data-src="holder.js/100%x140" alt="holder" id="imgprvw" src="<?php echo base_url(); ?>/media/profile_img/user/<?php echo $ProfilePic ?>">
							</div>
							<div class="row">
								
								<div class="col-xs-5">
									<span class="button btn-system btn-file btn-block">
										<span class="fileupload-new">Upload</span>
									<span class="fileupload-exists">Change</span>
									<input type="file" name="profile_img" id="profile_img" onChange="showimagepreview(this)">
                                    <input type="hidden" name="old_profile_img" id="old_profile_img" value="<?php echo $ProfilePic ?>">
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
								<input id="first_name" name="first_name" value="<?php echo $FirstName ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Last Name :</label>
								<div class="col-lg-8">
								<input id="last_name" name="last_name" value="<?php echo $LastName ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Position :</label>
								<div class="col-lg-8">
								<input id="position" name="position" value="<?php echo $Position ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                               <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Address :</label>
								<div class="col-lg-8">
								<textarea name="address" id="address" class="form-control"  placeholder="Type Here..."><?php echo $Address ?></textarea>
								</div>
								</div>  
                                
                               	<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">City :</label>
								<div class="col-lg-8">
							    <input id="city" name="city" value="<?php echo $City ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">State :</label>
								<div class="col-lg-8">
							    <input id="state" name="state" value="<?php echo $State ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>   
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Zip :</label>
								<div class="col-lg-8">
							    <input id="zip" name="zip" value="<?php echo $Zip ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>  
                                
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Country :</label>
								<div class="col-lg-8">
							    <input id="country" name="country" value="<?php echo $Country ?>" class="form-control" type="text" placeholder="Type Here...">
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
								<input id="email_id" name="email_id" value="<?php echo $Email ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Password :</label>
								<div class="col-lg-8">
								<input id="password" name="password" value="<?php echo $Password ?>" class="form-control" type="password" placeholder="Type Here...">
								</div>
								</div>
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Phone Number :</label>
								<div class="col-lg-8">
								<input id="phone" name="phone" value="<?php echo $PhoneNumber ?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
							
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Firm Size :</label>
								<div class="col-lg-8">
								<label class="field select">
									<select id="firm_size" name="firm_size">
										
										<option value="1" <?php if($Firm_CompanySize==1){ ?>selected <?php }?>>1</option>
										<option value="2" <?php if($Firm_CompanySize==2){ ?>selected <?php }?>>2</option>
										<option value="3" <?php if($Firm_CompanySize==3){ ?>selected <?php }?>>3</option>
										<option value="4" <?php if($Firm_CompanySize==4){ ?>selected <?php }?>>4</option>
									</select>
									<i class="arrow double"></i>
								</label>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">How Did You Hear AboutUs  :</label>
								<div class="col-lg-8">
								<textarea name="aboutus" id="aboutus" class="form-control"  placeholder="Type Here..."><?php echo $HowDidYouHearAboutUs ?></textarea>
								</div>
								</div>
								
								
								
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12" align="center">
                 <?php if($user_data!=''){ ?>
					<button class="btn active btn-primary" type="submit"> <i class="fa fa-refresh"></i>Udate </button>
                 <?php } else { ?>
                 <button class="btn active btn-success" type="submit"> <i class="fa fa-save"></i>  Submit </button>
                  <?php } ?>
					<!--<button class="btn active btn-system " type="submit"> <i class="fa fa-refresh"></i>  Reset </button>-->
					<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>user'"> 
					<i class="fa fa-warning"></i> Cancel </button>
				</div>	
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>



        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
