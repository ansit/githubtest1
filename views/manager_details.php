<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Manager Details</title>
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
					<a href="<?php echo base_url(); ?>manager/manager_details/<?php echo $case_id; ?>">Manager Details</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->
    <div id="content" class="animated fadeIn">
        <div class="row">
			<!---<a href="<?php echo base_url(); ?>manager" style="color:black"><div class="col-sm-4 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> Managers </h1>
						<h1 class="text-system"><?php echo $no_of_manager?></h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons-user_add"></i>
						<b>Managers List</b>
						</span>
					</div>
				</div>
			</div></a>---->
				<?php /*print_r($no_of_users); exit;*/  ?>
			<a href="<?php echo base_url();?>user/manager_user_list/<?php echo $managerid; ?>" style="color:black"><div class="col-sm-6 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> Users </h1>
						<h1 class="text-system"> <?php echo (2*$no_of_users) ?> </h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons-user_add"></i>
						<b>User List</b>
						</span>
					</div>
				</div>
			</div></a>
			
			<a href="<?php echo base_url().'manager/assign_cases/'.$managerid?>" style="color:black"><div class="col-sm-6 col-xl-3">
				<div class="panel panel-tile text-center br-a br-grey">
					<div class="panel-body btn-dark">
						<h1 class="fs30 mt5 mbn"> Cases </h1>
						<h1 class="text-system"> <?php echo $no_of_cases_assign?> </h1>
					</div>
					<div class="panel-footer br-t p12">
						<span class="fs11">
						<i class="glyphicons glyphicons glyphicons-book_open"></i>
						<b> Cases </b>
						</span>
					</div>
				</div>
			</div></a>	
			
			<form class="form-horizontal" action="" method="post">
                    <div class="col-md-12">
                        <div class="panel">
                            <h2 style="padding:18px; 10px; 10px; 10px;"> Assign Cases </h2>
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                        <div class="row">
                                            <div class="col-md-12"> 
												<div class="panel" id="spy4">
													<div class="panel-body pn">
													 
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-hover">
																<thead>
																	<tr class="system">
                                                                        <th> # </th>
																		<th> User Name </th>
																		<th> Case Type </th>
																		<th> FIrst Party </th>
																		<th> Secound Party </th>
                                                                        <th> Date Commenced </th>
                                                                		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																
																 <!--<?php// foreach($active_case_list as $list): ?>-->
																 <?php for($i=0;$i<count($active_case_list);$i++) {  ?>
																 
																
																	<tr>
																		<td> <?php echo $i+1; ?></td>
																		<td><?php echo $active_case_list[$i]->FirstName ?></td>
																		<td><?php echo $active_case_list[$i]->CaseType ?></td>
																		<td><?php echo $active_case_list[$i]->FirstParty?></td>
																		<td><?php echo $active_case_list[$i]->SecondParty?></td>
																		<td><?php echo $active_case_list[$i]->DateCommenced?></td>
																		<td style="width:250px;">
																		<a onclick="return confirm('Are you sure to Reject?');" class="btn btn-warning btn-xs purple" href="<?php echo base_url();?>manager_dashboard/delete/<?php echo $active_case_list[$i]->CaseID?>">
																		<i class="fa fa-times-circle"></i> Reject </a>
																		
																		<a  class="btn btn-success btn-xs purple" href="<?php echo base_url();?>manager_dashboard/view_case/<?php echo $active_case_list[$i]->CaseID?>">
																		<i class="fa fa-eye"></i> View </a>
																		</td>
																	</tr>
																	
																 <?php }?>   
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div><!-- end col-md-12 -->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

			</form>   
			    
        </div>
	</div>
            <!-- End: Content -->  
</section>
        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
