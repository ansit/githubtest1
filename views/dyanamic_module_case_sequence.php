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

       <?php error_reporting(0); echo $common_header;?>

       <?php echo $right_panel;?>
     <script language="javascript">

$(document).ready(function(){   
    $(".btn_delete").click(function(e){
		
		 if (confirm("Are you sure you want to delete?"))
		  {
			var st_id = $(this).attr('id');
			
			
			var arr_st_id = st_id.split("_") ;
			var CaseSequenceID = arr_st_id[1] ;
			e.preventDefault();
			data = { "CaseSequenceID" : CaseSequenceID};
			//alert(data);
			$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>case_sequence/delete_Module_Case_sequence",	
            data: data, 
            success:function(res)
			{
				//console.log(url);
			   if(res == 1)
			   {
				   $('#row_'+CaseSequenceID).hide();
				   alert("Successfuly Deleted")
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
       
    <!-- Start: Content-Wrapper -->
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="user">Main Case Sequence</a>
				</li>
			</ol>
		</div>
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
     <div id="content" class="animated fadeIn">
        <div class="row">
			<form class="form-horizontal"  method="post" action="">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                
                                <?php if($this->session->flashdata('msg')){ ?> 
									<div class="alert alert-success">
										<a href="#" class="close" data-dismiss="alert">&times;</a>
									<?php echo $this->session->flashdata('msg'); ?>
									</div>
								<?php }  ?> 
                                <?php /*print_r($case_sequence_list);*/ ?>
                                
									<div class="row">
										<div class="col-md-6">
											<div class="admin-form">
												<div class="form-group">
												<label class="col-lg-4 control-label"> Main Case Sequence </label>
												<div class="col-lg-8">
												<input  type="text" name="case_sequence_name" value="<?php echo $list[0]->SequenceName;?>" class="form-control" required >
												</div>
												</div>
											</div>
										</div><!-- end col-md-6 -->
										
										<div class="col-md-6">
											<div class="admin-form">
												<div class="form-group">
												<div class="col-lg-8">
												<?php if($list[0] > 0){?>
												<button class="btn active btn-success" type="submit" name="btn_case_sequence"> 
												<i class="fa fa-save"></i>  Update </button>
												<?php }else{?>
												<button class="btn active btn-success" type="submit" name="btn_case_sequence"> 
												<i class="fa fa-save"></i>  Submit </button>
												<?php }?>
												<button class="btn active btn-warning" type="button"
												onclick="window.location='<?php echo base_url(); ?>case_sequence'"> 
												<i class="fa fa-warning"></i>  Cancel </button>
												</div>
												</div>
											</div>
										</div><!-- end col-md-6 -->
										<div class="col-md-12"> <hr/> </div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-bordered table-striped table-hover">
													<thead>
														<tr class="system">
															<th style="width:20%;"> # </th>
															<th style="width:60%;"> Name </th>
															<th style="width:20%;">Action</th>
														</tr>
                                                         
													</thead>
                                                    <tbody>
                                           <?php for($i=0;$i<count($case_sequence_list);$i++) { ?>
                                     
                                    
                                        <tr id="row_<?php echo $case_sequence_list[$i]->CaseSequenceID?>">
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $case_sequence_list[$i]->SequenceName ?></td>
                                            <td>
											<a class="btn btn-success btn-xs purple" href="<?php echo base_url(); ?>case_sequence/module_case_sequence/<?php echo $case_sequence_list[$i]->CaseSequenceID?>">
											<i class="fa fa-pencil"></i> Edit</a>
										
											<a class="btn btn-danger btn-xs btn_delete" id="user_<?php echo $case_sequence_list[$i]->CaseSequenceID?>" title="Delete" href="javascript:void(0);" >
											<i class="fa fa-trash-o"></i> Delete	</a>
											</td>
                                        </tr>
                                        
                                      <?php } ?>
									  </tbody>
												</table>
											</div>
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
        
        
