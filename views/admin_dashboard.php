<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Dashboard</title>
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

	<!-- casemanager style--> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>
       <?php echo $right_panel;?>
    
    
   
    <!-- Start: Content-Wrapper -->
       <section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>admin_dashboard">Dashboard</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->
    <div id="content" class="animated fadeIn">
        <div class="row">
			<a href="<?php echo base_url(); ?>manager" style="color:black"><div class="col-sm-4 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> Manager </h1>
						<h1 class="text-system"><?php echo $no_of_manager?></h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons-user_add"></i>
						<b>Managers List</b>
						</span>
					</div>
				</div>
			</div></a>
			
			<a href="<?php echo base_url(); ?>user" style="color:black"><div class="col-sm-4 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> User</h1>
						<h1 class="text-system"> <?php echo $no_of_users?> </h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons-user_add"></i>
						<b>User List</b>
						</span>
					</div>
				</div>
			</div></a>
			
			<a href="<?php echo base_url(); ?>case_management" style="color:black"><div class="col-sm-4 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> Case </h1>
						<h1 class="text-system"><?php echo $count_case?></h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons glyphicons-book_open"></i>
						<b> Case </b>
						</span>
					</div>
				</div>
			</div></a>	
			    
        </div>
		<!-- notification start -->
		 <div class="row">
			
        <div class="col-sm-12 noticebox">
      <center> <div class="panel-body btn-dark"><h2>Notification</h2></div></center> 
        <div id="noticediv" class="panel-footer notback br-t p12">
		 
		 <?php
		 foreach($notifications as $notification):
		 echo '<p class="pnotice"><a href="javascript:void(0)" class="noticecom" data-toggle="modal" data-target="#notimodal" data-id="'.$notification->id.'">'.$notification->comment.' on '.$notification->created.'</a></p>';
		 endforeach;
		 ?>
        </div>
        </div>
		
		<div class="col-sm-2">&nbsp;</div>
        </div>
		 
		 <!--Notification ends-->
	</div>
            <!-- End: Content -->  
</section>
        <!-- End: Content-Wrapper -->
<script>
   $(document).ready(function(){
	  setInterval(function(){ checknewnotification(1);}, 3000);
   })
</script>

 <?php echo $common_footer ?>       
        
        
