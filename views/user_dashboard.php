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
					<a href="<?php echo base_url();?>user_dashboard">Dashboard</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->
  
     <!-- Begin: Content -->
    <div id="content" class="animated fadeIn">
        <div class="row">
          <h3 style="padding-left:20px;" >Active Case</h2>
		          <div class="col-md-12">
                    <div class="panel" id="spy4">
                    
                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="system">
                                            <th> #</th>
                                            <th> Case Type</th>
                                            <th> Parties</th>
                                            <th> First Party Phone</th>
                                           <!-- <th> Category of dispute</th>-->
                                            <th> View Case Page</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    
                                     <?php for($i=0;$i<count($active_case_list);$i++) { ?>
										<tr id="row_<?php echo $active_case_list[$i]->CaseID?>">
										<td><?php echo $i+1; ?></td>
										<td><?php echo $active_case_list[$i]->CaseType ?></td>
										<td><?php echo $active_case_list[$i]->FirstParty?></td>
										<td><?php echo $active_case_list[$i]->FirstPArtyPhone?></td>
									<!--	<td><?php echo $active_case_list[$i]->CategoryofDispute?></td>-->
										<td>
										<a class="btn btn-success btn-xs" href='<?php echo base_url();?>user_dashboard/active_case/<?php echo $active_case_list[$i]->CaseID?>'>
										<i class="fa fa-eye"></i> View Case Page </a>
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


        <div class="row">
          <h3 style="padding-left:20px;" >Close Case</h3>
		          <div class="col-md-12">
                    <div class="panel" id="spy4">
                    
                        <div class="panel-body pn">
                     
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                       <tr class="system">
                                            <th>#</th>
                                            <th> Case Type</th>
                                            <th> Parties</th>
                                            <th> First Party Phone</th>
                                          <!--  <th> Category of dispute</th>-->
                                            <th> Date Commenced</th>
                                            <th> End Date</th>
                                            <th> View Case Page</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php for($i=0;$i<count($close_case_list);$i++) { ?>
										<tr id="row_<?php echo $close_case_list[$i]->CaseID?>">
										<td><?php echo $i+1; ?></td>
										<td><?php echo $close_case_list[$i]->CaseType ?></td>
										<td><?php echo $close_case_list[$i]->FirstParty?></td>
										<td><?php echo $close_case_list[$i]->FirstPArtyPhone?></td>
									<!--<td><?php echo $close_case_list[$i]->CategoryofDispute ?></td>-->
										<td><?php echo $close_case_list[$i]->DateCommenced?></td>
										<td><?php echo $close_case_list[$i]->EndDate?></td>
                                        
										<td>
										<a class="btn btn-success btn-xs" href='<?php echo base_url();?>user_dashboard/close_case/<?php echo $close_case_list[$i]->CaseID?>'>
										<i class="fa fa-eye"></i> View Case Page </a>
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
		
		<!-- notification start -->
		 <div class="row">
			
        <div class="col-sm-12 noticebox">
        <div class="panel-body success-panel"><center><h3>Notifications</h3></center></div>
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
                  
            
            
</section>
        <!-- End: Content-Wrapper -->
 <script>
   $(document).ready(function(){
	  setInterval(function(){ checknewnotification(3);}, 3000);
   })
</script>         
 <?php echo $common_footer ?>       
        
        
