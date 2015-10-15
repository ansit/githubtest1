<!DOCTYPE html>
<html>

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

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">
	
    <script src="<?php echo base_url();?>media/assets/js/jquery-1.10.2.js"></script>
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
					<a href="javascript:location.reload()">Case Page</a>
				</li>
			</ol>
		</div>
		<!--<div class="topbar-right">    
			<a href="<?php echo base_url(); ?>cases/addcase"><button  class="btn btn-success btn-sm light fw600 ml10 pull-right" type="button"><i class="fa fa-plus"></i>
            Add New</button></a>
		</div>-->
	   
	</header>
    <?php if($this->session->flashdata('msg')){ ?> 
    <!--########################## Message for update add edit delete ##################### ----------->
		<div class="col-md-12"> 
			<div class="alert alert-success dark alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-check pr10"></i>
				 <?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
    <?php } ?>           
	<!--############### Main Body of Form start start , good alignment view notepad++  editer ####### ----------->

    <!-- Begin: Content --> 
    <div id="content">
        <div class="row">
			<div class="col-md-12">
			
				<div class="panel-body form-horizontal">
	
					<div class="form-group">
						<label class="col-lg-2 control-label" style="text-align:left;"> Party Names </label>
						<label class="col-lg-10 control-label" style="text-align:left;">
							<b> <?php echo $caseItem[0]->FirstParty ?>&nbsp; | &nbsp;<?php echo $caseItem[0]->SecondParty ?></b>
						</label>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label" style="text-align:left;"> Case Commenced </label>
						<label class="col-lg-10 control-label" style="text-align:left;">
							<b> <?php echo $caseItem[0]->DateCommenced?> </b>
						</label>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label" style="text-align:left;"> Amount in Controversy </label>
						<label class="col-lg-10 control-label" style="text-align:left;">
							<b> <?php echo $caseItem[0]->AmountInDispute?> </b>
						</label>
					</div>
					
<!--					<div class="form-group">
						<label class="col-lg-2 control-label"> Target Mediation Date </label>
						<label class="col-lg-10 control-label" style="text-align:left;">
							<b> 2015-06-22 </b>
						</label>
					</div>-->
					
				</div>
			</div>
			
			<?php
			if($casestepstat !== 0){
			 foreach($casestepstat as $row):
			 $colstatus[] = $row->status;
			 if($row->status == 2){
			   $stat_text[] = "In- progress";
			 }elseif($row->status == 3){
			   $stat_text[] = "Complete";
			 }else{
			   $stat_text[] = "Not Complete";
			 }
			 endforeach;
			}
			?>
				<div class="col-md-12">
					<h3> View Report  </h3>
					<div class="panel panel-body form-horizontal">
						<table id="reprttable" class="table table-bordered">
								<thead>
									<tr>
										<th> Steps </th>
										<th> Actions </th>
										<th> Deadlines </th>
									</tr>	
								</thead>
								
								<tbody>
									<tr>
										<td class='colorrow<?php echo isset($colstatus[0])?$colstatus[0]:1?>'> <a href="<?php echo base_url().'user_dashboard/casepartydetail/'.$caseItem[0]->CaseID?>">Step 1 (check input details)</a> </td>
										<td> <?php echo isset($stat_text[0])?$stat_text[0]:"Not Complete"?> </td>
										<td> 2015-12-22 </td>
									</tr>
									
									<tr>
			   <td class='colorrow<?php echo isset($colstatus[1])?$colstatus[1]:1?>'> <a href="<?php echo base_url().'user_dashboard/responseuser/'.$caseItem[0]->CaseID?>">Step 2(Respond to questions)</a> </td>
										<td> <?php echo isset($stat_text[1])?$stat_text[1]:"Not Complete"?> </td>
										<td> <?php /*print_r($caseItem);*/ ?>2015-12-24 </td>
									</tr>
									
<!--									<tr>
										<td class='colorrow<?php //echo isset($colstatus[2])?$colstatus[2]:1?>'> Step 3 </td>
										<td> <?php //echo isset($stat_text[2])?$stat_text[2]:"Not Complete"?></td>
										<td> 2015-12-28 </td>
									</tr>
-->								
								</tbody>
							
					   
						</table>
					</div>
				</div>
			      
        </div>
	</div>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
