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
    
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>   
 <script language="javascript">
/* 
$(document).ready(function(){   
    $(".btn_delete").click(function(e){
		
		 if (confirm("Are you sure you want to delete?"))
		  {
			var st_id = $(this).attr('id');
			var arr_st_id = st_id.split("_") ;
			var user_id = arr_st_id[1] ;
			e.preventDefault();
			data = { userid : user_id};
			$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>manager/delete_manager",
			type: 'POST',
            data: data, 
            success:function(data)
            {
			   if(data == 1)
			   {
				   $('#row_'+user_id).hide();
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
     */
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
					<a href="user"><?php echo $heading; ?></a>
				</li>
			</ol>
		</div>
		<div class="topbar-right"></div>
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
     <div id="content" class="animated fadeIn">
        <div class="row">
			<form class="form-horizontal" role="form">

                <div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-body pn">
                        
                        <?php if($this->session->flashdata('msg')){ ?> 
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php } ?>   
                        
                         
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="system">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Areas of expertise</th>
                                            <th>Average Time (In Days)</th>
                                            <th>Success Rate</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                        <?php for($i=0;$i<count($manager_list);$i++) { ?>
                                     
                                    
                                        <tr id="row_<?php echo $manager_list[$i]->UserID?>">
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $manager_list[$i]->FirstName ?></td>
                                            <td><?php echo $manager_list[$i]->Email?></td>
                                            <td><?php echo $manager_list[$i]->PhoneNumber?></td>
                                            <td><?php echo $manager_list[$i]->areasofexpertise?></td>
                                            <td><?php echo $manager_list[$i]->avg_time?></td>
                                            <td><?php $arr = $manager_list[$i]->success_rate; echo $arr->success_rate." %";//print_r($arr); ?></td>
                                            <td>
						<!--<a class="btn btn-success btn-xs purple" href="<?php echo base_url(); ?>manager/editManager/<?php echo $manager_list[$i]->UserID?>">
							<i class="fa fa-pencil"></i> Edit</a>-->
						<a class="btn btn-success btn-xs blue" href="<?php echo base_url(); ?>case_management/manager_assigned_case/<?php echo $manager_list[$i]->UserID?>">
							<i class="fa fa-pencil"></i> Assigned Cases</a>
										
					<!--
						<a class="btn btn-danger btn-xs btn_delete" id="manager_<?php //echo $manager_list[$i]->UserID?>" title="Delete" href="javascript:void(0);" >
						<i class="fa fa-trash-o"></i>Delete</a>
					-->
											</td>
                                        </tr>
                                        
                                      <?php } ?>   
                                        
                                        
                                    </thead>
                                    <tbody>
                                    
                                    
                                     <?php /*for($i=0;$i<count($user_list);$i++) { ?>
                                     
                                    
                                        <tr>
                                            <td>4</td>
                                            <td><?php echo $user_list[$i]->FirstName ?></td>
                                            <td><?php echo $user_list[$i]->Email?></td>
                                            <td><?php echo $user_list[$i]->PhoneNumber?></td>
                                            <td><?php echo $user_list[$i]->Position?></td>
                                            <td style="width:250px;">
						<a class="btn btn-success btn-xs purple" href="<?php echo base_url(); ?>user/editUser/<?php echo $user_list[$i]->UserID?>">
													<i class="fa fa-pencil"></i> Edit
												</a>
												
												<a class="btn btn-success btn-xs" href="">
													<i class="fa fa-eye"></i> View
												</a>
												
												<a class="btn btn-success btn-xs" href="">
													<i class="fa fa-print"></i> Print
												</a>
												
												<a class="btn btn-danger btn-xs" href="">
													<i class="fa fa-trash-o"></i> Delete
												</a>
											</td>
                                        </tr>
                                        
                                      <?php } */?>   
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-md-12 -->

			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
