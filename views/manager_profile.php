<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
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
     <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>
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
	<script>

  $(function() {
   //alert("hello");
     $('#file1').change(function (){
       var ext = $(this).val().split('.').pop().toLowerCase();
	   if($.inArray(ext, ['doc','txt','pdf','docx','odt']) == -1) {
		   $('.newfile-message').html("Upload only Document File");
		   return false;
		}else{
		 $('.newfile-message').html("");
		}
     });
  });

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
					<a href="<?php echo base_url(); ?>manager/manager_profile">Manager Profile</a>
				</li>
			</ol>
		</div>
	</header>

    <div id="content" class="animated fadeIn">
        <div class="row">
		
             <form action="" method="post">
				<div class="col-md-12"> 
				<?php if(count($_POST) >1){?>
				<div class="alert alert_auto_hide alert-system alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-check pr10"></i>
				Data Updated
				</div><?php }?>
				</div>
				<!---<div class="col-md-2"> <br/> 
				<div class="fileupload fileupload-new admin-form" data-provides="fileupload">
				<div class="fileupload-preview thumbnail mb15">
				<img alt="100x147" style="height: 147px; width:100%;" id="imgprvw"
				src="">
				</div>
				<span class="button btn-system btn-file btn-block ph5">
				<span class="fileupload-new">Upload File</span>
				<input type="file" name="profile_img" id="profile_img" onChange="showimagepreview(this)">
                <input type="hidden" name="old_profile_img" id="old_profile_img" value="<?php echo $ProfilePic ?>">
				</span>
				</div>
				</div>--->
   
                <div class="col-md-6 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Name:</label>
								<div class="col-lg-8">
								<input  name="FirstName" value="<?php echo $list[0]->FirstName;?>" class="form-control Name" type="text">
								</div>
								</div>
                                 <div class="form-group">
								<label class="col-lg-4 control-label">Address :</label>
								<div class="col-lg-8">
								<textarea  name="Address" class="form-control Address"> <?php echo $list[0]->Address;?></textarea>
								</div>
								</div>
                                <div class="form-group">
								<label class="col-lg-4 control-label">Phone no. :</label>
								<div class="col-lg-8 input-group">
								 <span class="input-group-addon" id="basic-addon1">+1</span>
								<input  name="PhoneNumber" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="10" value="<?php echo $list[0]->PhoneNumber;?>" class="form-control Phone">
								</div>
								</div>
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Email :</label>
								<div class="col-lg-8">
							    <input name="Email" value="<?php echo $list[0]->Email;?>" class="form-control Email" type="text">
								</div>
								</div> 
                            </div><br/> <br/><br/>
                        </div>
                    </div>
                </div>
				<div class="col-md-6 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Biography :</label>
								<div class="col-lg-8">
                                <textarea name="biography" class="form-control Biography"><?php echo $list[0]->biography;?></textarea>
							   </div>
								</div> 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Areas of expertise  :</label>
								<div class="col-lg-8">
							    <input id="state" name="areasofexpertise" value="<?php echo $list[0]->areasofexpertise;?>" class="form-control Areasofexpertise" type="text" >
								</div>
								</div> 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Password :</label>
								<div class="col-lg-8">
							    <input name="Password" value="<?php echo $list[0]->Password;?>" class="form-control Passsword" type="password">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard"> CV/resume  :</label>
								<div class="col-lg-8">
								<div class="section">
								<label class="field prepend-icon append-button file">
								<span class="button btn-primary">Choose File</span>
								<input id="file1" class="gui-file" type="file" onchange="document.getElementById('uploader1').value = this.value;" name="file1">
								<input id="uploader1" class="gui-input" type="text" placeholder="Please Select A File" name="Cv">
                                 <input type="hidden" name="old_cv" id="old_cv" value="">
								  <strong class="newfile-message"></strong>
								<label class="field-icon">
								<i class="fa fa-upload"></i>
								</label>
								</label>
								</div>
								</div>  
								</div> 
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12" align="center">
					<button class="btn active btn-success btnmanager" name="btnmanager" type="submit"> <i class="fa fa-refresh"></i>  Update</button>
               	<!--<button class="btn active btn-system " type="reset"> <i class="fa fa-refresh"></i>  Reset</button>-->
				<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>manager_dashboard/manager_user'"> 
         		<i class="fa fa-warning"></i> Cancel </button>
        	</div>			
			</form>      
        </div>
	</div>     
</section>

 <?php echo $common_footer ?>       
        
	<script src="<?php echo base_url(); ?>media/alertify/lib/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
	<script src="<?php echo base_url(); ?>media/alertify/alertifyjs.js"></script> 