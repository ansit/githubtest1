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
    <script src="<?php echo base_url();?>media/assets/js/jquery-1.10.2.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script language="javascript" type="application/javascript"> 
  $(document).ready(function(){ 
   $('.case'). click(function(){
	if (confirm("Are you sure you want to delete this case?"))
  	{
        var case_strId = $(this).prop('id');
		var arrcase_id = case_strId.split("_");
		  data = {'case_id' : arrcase_id[1]};
			$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>cases/case_delete",
            type: 'POST',
            data: data, 

            success:function(data)
            {
			   if(data=='1')
			   {
			     $('#row_'+arrcase_id[1]).hide();
			   }
			   else
			   {
				   return false;
			   }
            }
        });
	}
	else
	{
		return false;
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
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="user">Message</a>
				</li>
			</ol>
		</div>
		
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
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
     <div id="content" class="animated fadeIn">
        <div class="row">
			<form class="form-horizontal" role="form">
                    <div class="col-md-12">
                        <div class="panel">
                           
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                    <div id="tab2_1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12">
												<div class="panel" id="spy4">
													<div class="panel-body pn">
													 
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-hover">
																<thead>
																	<tr class="system">
                                                                        <th> # </th>
																		<th> Manager </th>
																		<th> Date </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<td> 1 </td>
																	<td> Manager 1</td>
																	<td> 2015-01-29</td>
																	<td> 
																	<a class="btn btn-success btn-xs purple" href="">
																	<i class="fa fa-pencil"></i> Edit
																	</a>
																	</td>
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
													 
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-hover">
																<thead>
																	<tr class="system">
                                                                        <th> # </th>
																		<th> Case Title </th>
																		<th> First Party</th>
																		<th> Second Party</th>
                                                                        <th> Date Commenced </th>
																		<th> End Date </th>
                                                                		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																
																 <?php for($i=0;$i<count($active_case_list);$i++) { ?>
																		<tr id="row_<?php echo $active_case_list[$i]->CaseID?>">
																		<td><?php echo $i+1; ?></td>
		<td><a href="<?php echo base_url();?>cases/viewcase/<?php echo $active_case_list[$i]->CaseID?>"><?php echo $active_case_list[$i]->CaseTitle ?></a></td>
																		<td><?php echo $active_case_list[$i]->FirstParty?></td>
																		<td><?php echo $active_case_list[$i]->SecondParty;?></td>
                                                                          <td><?php echo $active_case_list[$i]->DateCommenced?></td>
																		<td><?php echo $active_case_list[$i]->EndDate?></td>
                                                                      
			      			                                           <td style="width:250px;">
							<a class="btn btn-success btn-xs purple" href="<?php echo base_url();?>cases/editcase/<?php echo $active_case_list[$i]->CaseID?>">
																				<i class="fa fa-pencil"></i> Edit
																			</a>
																			
			  			    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>cases/viewcase/<?php echo $active_case_list[$i]->CaseID?>">
																				<i class="fa fa-eye"></i> View
								  											</a>
																		
				          <a class="btn btn-danger btn-xs case" id="caseId_<?php echo $active_case_list[$i]->CaseID?>" href="javascript:void(0)">
																				<i class="fa fa-trash-o"></i> Delete
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
                                    <div id="tab2_3" class="tab-pane">
                                        <div class="row">
                                            
                                            <div class="col-md-12">
												<div class="panel" id="spy4">
													<div class="panel-body pn">
													
													 
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-hover">
																<thead>
																	<tr class="system">
                                                                        <th> # </th>
																		<th> Case Title </th>
																		<th> First Party</th>
																		<th> Second Party</th>
                                                                        <th> Date Commenced </th>
																		<th> End Date </th>
                                                                		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																
																
																 <?php for($i=0;$i<count($close_case_list);$i++) { ?>
																		<tr id="row_<?php echo $close_case_list[$i]->CaseID?>">
																		<td><?php echo $i+1; ?></td>
		<td><a href="<?php echo base_url();?>cases/viewcase/<?php echo $close_case_list[$i]->CaseID?>"><?php echo $close_case_list[$i]->CaseTitle ?></a></td>
																		<td><?php echo $close_case_list[$i]->FirstParty?></td>
																		<td><?php echo $close_case_list[$i]->SecondParty;?></td>
                                                                         <td><?php echo $close_case_list[$i]->DateCommenced?></td>
																		<td><?php echo $close_case_list[$i]->EndDate?></td>
                                                                       
			      			                                           <td style="width:250px;">
							<a class="btn btn-success btn-xs purple" href="<?php echo base_url();?>cases/editcase/<?php echo $close_case_list[$i]->CaseID?>">
																				<i class="fa fa-pencil"></i> Edit
																			</a>
																			
			  			    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>cases/viewcase/<?php echo $close_case_list[$i]->CaseID?>">
																				<i class="fa fa-eye"></i> View
								  											</a>
																		
				          <a class="btn btn-danger btn-xs case" id="caseId_<?php echo $close_case_list[$i]->CaseID?>" href="javascript:void(0)">
																				<i class="fa fa-trash-o"></i> Delete
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
        
        
