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
		 <?php  foreach($active_case_list as $list ) ?>
	
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>assign_cases">Cases</a>
				</li>
			</ol>
		</div>
		
		
	</header>
     	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
     <div id="content" class="animated fadeIn">
        <div class="row">
			<form class="form-horizontal" role="form">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab2_1" data-toggle="tab"> Active Cases </a>
                                    </li>
                                    <li>
                                        <a href="#tab2_2" data-toggle="tab"> Closed Cases </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                    <div id="tab2_1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12">
												<div class="panel" id="spy4">
													<div class="panel-body pn">
													 <?php /*print_r($active_case_list);*/ ?>
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
                                                                		<th style="width:10%;"> Action </th>
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
																		<a class="btn btn-success btn-xs purple" href="<?php echo base_url();?>case_management/editcase/<?php echo $active_case_list[$i]->CaseID?>">
																		<i class="fa fa-pencil"></i> Edit</a>
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
                                    <div id="tab2_2" class="tab-pane">
                                        <div class="row">
											<div class="col-md-12">
												<div class="panel" id="spy4">
													<div class="panel-body pn">
													
													 	<?php /*print_r($close_case_list);*/ ?>
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
                                                                        <th> End Date </th>
                                                                		<th style="width:10%;"> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																
																 <?php for($i=0;$i<count($close_case_list);$i++) {  ?>
																 
																
																	<tr>
																	<td><?php echo $i+1; ?></td>
																		<td><?php echo $close_case_list[$i]->FirstName?></td>		
																		<td><?php echo $close_case_list[$i]->CaseType?></td>		
																		<td><?php echo $close_case_list[$i]->FirstParty?></td>
																		<td><?php echo $close_case_list[$i]->SecondParty;?></td>
                                                                         <td><?php echo $close_case_list[$i]->DateCommenced?></td>
																		<td><?php echo $close_case_list[$i]->EndDate?></td>
                                                                       
			      			                                           <td style="width:250px;">
							<a class="btn btn-success btn-xs purple" href="<?php echo base_url();?>case_management/editcase/<?php echo $close_case_list[$i]->CaseID?>">
																				<i class="fa fa-pencil"></i> Edit
																			</a>
																		</td>
																	</tr>
																	
																  <?php } ?>   
																	
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
                    </div>

			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>




        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
