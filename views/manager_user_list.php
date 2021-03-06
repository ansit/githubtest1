<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>User</title>
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
			url: "<?php echo base_url(); ?>user/delete_user",
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
					<a href="<?php echo base_url(); ?>user/manager_user_list/<?php echo $managerid; ?>">User</a>
				</li>
			</ol>
		</div>
		<div class="topbar-right">
			<?php 
			$session_data = $this->session->userdata('logged_in');
			if($session_data['User_type'] == 1){?>
			<!--<a href="<?php echo base_url(); ?>user/addUser"><button  class="btn btn-success btn-sm light fw600 ml10 pull-right" type="button"><i class="fa fa-plus"></i>
            Add New</button></a>-->
			<?php }?>
			
		</div>
	   
	</header>
	
	<!-- End: Topbar -->
<?php /*print_r($user_list); exit;*/ ?>
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
											<th>Case Title</th>
                                            <th>Phone</th>
                                            <th>Position</th>
                                            <th style="width:122px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    
                                     <?php $i=1;
									 foreach($user_list as $user_list) {
										
										?>
                                     
                                    
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $user_list['fp'][0]->FirstName ?></td>
                                            <td><?php echo $user_list['fp'][0]->Email;?></td>
											<td><?php echo $user_list['CaseTitle'];?></td>
                                            <td><?php echo $user_list['fp'][0]->PhoneNumber?></td>
                                            <td><?php echo $user_list['fp'][0]->Position?></td>
                                            <td>
						<a class="btn btn-success btn-xs purple" href="<?php echo base_url().'user/editUser/'.$user_list['fp'][0]->UserID.'/'.$managerid?>">
							<i class="fa fa-pencil"></i> Edit</a>
										
											</td>
                                        </tr>
                                        
                                      <?php $i++; } ?>   
                                        
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
        
        
