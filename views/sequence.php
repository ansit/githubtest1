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
			//alert(st_id);
			
			var arr_st_id = st_id.split("_") ;
			var Assign_ID = arr_st_id[1] ;
			e.preventDefault();
			data = { "Assign_ID" : Assign_ID};
			$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>assign_cases_sequence/deletesequence",
			type: 'POST',
            data: data, 
            success:function(res)
			{
				//console.log(data);
			   if(res == 1)
			   {
				   $('#row'+Assign_ID).hide();
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
					<a href="assign_cases_sequence">Assign Case Sequence</a>
				</li>
			</ol>
		</div>
		<div class="topbar-right">    
			<a href="<?php echo base_url(); ?>assign_cases_sequence/Sequence_add"><button  class="btn btn-success btn-sm light fw600 ml10 pull-right" type="button"><i class="fa fa-plus"></i>
            Add New</button></a>
		</div>
	   
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
                                            <th>Case</th>
                                            <th>Case Sequence</th>
                                            
                                            <th style="width:130px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php  $i=1;?> 
                                     <?php    foreach($case as $cases){  /*print_r($case); exit;*/ ?>
                                     
                                    
                                        <tr id="row<?php echo $cases->Assign_ID?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $cases->CaseType; ?></td>
                                            <td><?php echo $cases->SequenceName?></td>
                                           
                                            <td style="width:130px;">
						<a class="btn btn-success btn-xs purple" href="<?php echo base_url(); ?>assign_cases_sequence/Edit_sequence/<?php echo $cases->Assign_ID ?>">
							<i class="fa fa-pencil"></i> Edit</a>
							
							<a class="btn btn-danger btn-xs btn_delete" id="caseassign_<?php echo $cases->Assign_ID ?>" title="Delete" href="javascript:void(0);" >
													<i class="fa fa-trash-o"></i> Delete	</a>
							<!--<a class="btn btn-danger btn-xs purple"  class='btn_delete'  href="<?php echo base_url(); ?>assign_cases_sequence/deletesequence/<?php echo $cases->Assign_ID?>" onclick="return confirm('Are you sure want to Delete ?')" >
							<i class="fa fa-pencil"></i>Delete</a>	-->		
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
        
        
