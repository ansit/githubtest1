<!DOCTYPE html>
<html>
<?php error_reporting(0); ?>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Case management</title>
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
	
	    <!-- casestyle CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">

   <!--lightbox-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/lightbox.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	
	
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
   /*.commentsection{background:#bddce8;}*/
   .glyphicon-remove-sign{
	  visibility: hidden;
   }
   .comrow:hover > .glyphicon-remove-sign{
	  background:#bddce8;
	  visibility: visible;
   }
</style>

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
					<a href="javascript:window.history.back();">Case Page</a>
				</li>
			</ol>
		</div>
		<!--<div class="topbar-right">    
			<a href="<?php echo base_url(); ?>cases/addcase"><button  class="btn btn-success btn-sm light fw600 ml10 pull-right" type="button"><i class="fa fa-plus"></i>
            Add New</button></a>
		</div>-->
	   
	</header>
	
 
	<!--############### Main Body of Form start start , good alignment view notepad++  editer ####### ----------->

    <!-- Begin: Content --> 
    <div id="content">
        <div class="row">
		 <?php //print_r($caseItem);?>
		 <!--details section start here-->
		 <div class="col-md-12"><h2>Details</h2></div>
			<div class="col-md-12">
			
				<div class="panel-body form-horizontal">
		 			<div class="form-group">
						<label> Case Type</label>
							<?php echo $caseItem[0]->CaseTitle ?>
					</div>			
		 			<div class="form-group">
						<label> Case Type</label>
							<?php echo $caseItem[0]->CaseType ?>
					</div>				  

					<div class="form-group">
						<label> Amount in Controversy </label>
						
							$<?php echo number_format($caseItem[0]->AmountInDispute,2)?> 
						
					</div>
					<div class="form-group">
						<label> Case Commenced </label>
						<?php echo $caseItem[0]->DateCommenced;?>
					</div>
					
		 			<div class="form-group">
						<label>Party Names </label>
							<?php echo $caseItem[0]->partyname; ?>
					</div>		
		 			<div class="form-group">
						<label>Party Address </label>
							<?php echo $caseItem[0]->address; ?>
					</div>
		 			<div class="form-group">
						<label>Party Phone Number</label>
							<?php echo $caseItem[0]->phone;?>
					</div>
		 			<div class="form-group">
						<label>Party Email</label>
							<?php echo $caseItem[0]->email;?>
					</div>
		 			<div class="form-group">
						<label>Party Firm Name</label>
							<?php echo $caseItem[0]->firmname;?>
					</div>
					
		 			<div class="form-group">
						<label>First Party Attorney Name </label>
							<?php echo $caseItem[0]->attname;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Email</label>
							<?php echo $caseItem[0]->attemail;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Address </label>
							<?php echo $caseItem[0]->attaddress;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Phone </label>
							<?php echo $caseItem[0]->attphone;?>
					</div>					
					
				</div>
			</div>
	
			   <!--details section closed here-->
			   
			 <div class="backbutton">
	<a href="javascript:window.history.back()" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back to View Report</a></div>  

		 
		</div>
	

         <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
  

 <?php echo $common_footer ?>       
        
        
