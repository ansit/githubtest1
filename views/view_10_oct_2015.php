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
 <script src="<?php echo base_url();?>media/assets/js/jquery-1.10.2.js"></script>
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
  <!-- date picker -->  
  <link rel="stylesheet" href="<?php echo base_url(); ?>media/assets/css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">
  <script src="<?php echo base_url();?>media/assets/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>media/assets/css/style.css">
  <script>
  $(function() {
	
	$("#Dat_Commenced").datepicker({
      dateFormat: "yy-mm-dd" //<----here
    });
	$("#enddate").datepicker({
      dateFormat: "yy-mm-dd" //<----here
    });      
  });
  
  
  
  </script>
 <script>
function goBack() {
    window.history.back();
}
</script>    
 <!-- date picker -->     
    

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
					<a href="<?php echo base_url(); ?>case_management/view/<?php echo $caseItem[0]->CaseID?>">View Case</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->

    <div id="content" class="animated fadeIn">
        <div class="row">
      	      <form class="form-horizontal" method="post">
					<div class="panel-body form-horizontal">
						<div class="col-md-12">
						 	
						  <div class="col-md-6">
						 <div class="form-group">
						  <?php
						  //var_dump($firstep1);
						  ?>
						  <?php foreach($manager_list as $list): ?>
							  <label class="col-lg-5 control-label" for="inputStandard">Assigned Manager :</label>
							  <div class="col-lg-7">
								 <label class="col-lg-5 control-label" for="inputStandard"><?php echo $list->FirstName; ?></label>
							  </div>
							</div>
						 <?php endforeach;?>
						</div>
						
						<div class="col-md-6">
						 <div class="form-group">
						
							  <label class="col-lg-5 control-label" for="inputStandard"> Party Name :</label>
							  <div class="col-lg-7">
								 <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->FirstParty?>&nbsp;|&nbsp;<?php echo $caseItem[0]->SecondParty?></label>
							  </div>
							</div>
						</div>
						
						</div>
					 <div class="col-md-12">
						<div class="col-md-6">
						 <div class="form-group">
						
							  <label class="col-lg-5 control-label" for="inputStandard">  Date Commenced :</label>
							  <div class="col-lg-7">
								 <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->DateCommenced?></label>
							  </div>
							</div>
						</div>
						
						<div class="col-md-6">
						 <div class="form-group">
						
							  <label class="col-lg-5 control-label" for="inputStandard"> Amount in Dispute :</label>
							  <div class="col-lg-7">
								 <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->AmountInDispute?></label>
							  </div>
							</div>
						</div>
					 </div>
						</div>
						<div class="col-md-12">
						 <h3>  View Report </h3>
					  <div class="panel panel-body form-horizontal">
						<table class="table  table-bordered">
							<tr>
								<thead>
									<tr>
										<th> Case #<?php echo $caseItem[0]->CaseID;?></th>
										<th> Manager Actions </th>
										<th> Manager Comments </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='colorrow<?php echo isset($firstep1->status);?>'> <a href="<?php echo base_url().'manager_dashboard/viewcasedetails/'.$caseItem[0]->CaseID.'/1/1';?>"><span class="tablelink"><strong>Step 1:</strong> User #1 Input information (click here to see what the user has input)</span></a></td>
										<td> <?php if(isset($firstep1) && ($firstep1->is_reviewed == 1)){
										  echo "Reviewed";
										  }else{
											 echo "Not Reviewed";
										  }
										?>  </td>
										<td><div class="managercomtd"><?php 
										foreach($firparcom as $row):
										echo $row->comment."</br>";
										endforeach;
									   ?> </div></td>
									</tr>
									<tr>
										<td class='colorrow<?php echo isset($secstep1->status);?>'><a href="<?php echo base_url().'manager_dashboard/viewcasedetails/'.$caseItem[0]->CaseID.'/2/1'?>"><span class="tablelink"><strong>Step 1:</strong> User #2 Input information (click here to see what the user has input)</span></a></td>
										<td><?php if(isset($secstep1) && ($secstep1->is_reviewed == 1)){
										  echo "Reviewed";
										  }else{
											 echo "Not Reviewed";
										  }?></td>
										<td><div class="managercomtd"><?php
										foreach($secparcom as $row):
										echo $row->comment."</br>";
										endforeach;
									   ?></div></td>
									</tr>
									<tr>
										<td class='colorrow<?php echo isset($firstep2->status);?>'><a href="<?php echo base_url().'manager_dashboard/viewcasedetails/'.$caseItem[0]->CaseID.'/1/2'?>"><span class="tablelink"><strong>Step 2:</strong> User #1 Responsive Module (click here to see what the user has input)</span></a></td>
										<td><?php if(isset($firstep2) && ($firstep2->is_reviewed == 1)){
										  echo "Reviewed";
										  }else{
											 echo "Not Reviewed";
										  }
										?>   </td>
										<td><div class="managercomtd"><?php 
										foreach($firparcom as $row):
										echo $row->comment."</br>";
										endforeach;
									   ?> </div></td>
									</tr>
									<tr>
										<td class='colorrow<?php echo isset($secstep2->status);?>'><a href="<?php echo base_url().'manager_dashboard/viewcasedetails/'.$caseItem[0]->CaseID.'/2/2'?>"><span class="tablelink"><strong>Step 2:</strong> User #2 Responsive Module (click here to see what the user has input)</span></a></td>
										<td><?php if(isset($secstep2)&& ($secstep2->is_reviewed == 1)){
										  echo "Reviewed";
										  }else{
											 echo "Not Reviewed";
										  }
										?>   </td>
										<td><div class="managercomtd"><?php
										foreach($secparcom as $row):
										echo $row->comment."</br>";
										endforeach;
									   ?></div></td>
									</tr>
								</tbody>
						</table>
					  </div>
						</div>	
						
					
				<!---############### button start here chose button as your requirement ######################------>
				<div class="col-md-12" align="center">
            	<a href="<?php echo base_url(); ?>case_management"><button class="btn active btn-system" type="button"> <i class="fa fa-refresh"></i>  Back </button></a>
					<!--<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>case_management'"> 
					<i class="fa fa-warning"></i> Cancel </button>-->
				</div>	
					
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>      