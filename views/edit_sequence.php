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
   <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
    $('#role_name').multiselect();
	
    });
    </script>

</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main --> 
    <div id="main">
       <?php echo $common_header;?>

       <?php echo $right_panel; ?>
     
       
    <!-- Start: Content-Wrapper -->
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
				  <?php  foreach($list as $liste); ?>
					<a href="<?php echo base_url(); ?>assign_cases_sequence/Edit_sequence/<?php echo $liste->Assign_ID;  ?>"> cases sequence Edit</a>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form class="form-horizontal" method="post" action="">
				<div class="col-md-12">
					<?php if($this->session->flashdata('msg')){ ?> 
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
						<?php echo $this->session->flashdata('msg'); ?>
						</div>
					<?php } ?> 
				</div>	
<!---========== Add test ==========================------------------------------------------->
				<div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span> Assign cases sequence
							</span>
                        </div>
                        <div class="panel-body pn">
							<div class="col-md-12"> &nbsp; </div>
							<div class="col-md-6">
							  	<?php  foreach($list as $liste); ?>
								
								<div class="admin-form">
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> case :</label>
									<div class="col-lg-8">
										<label class="field select">
									<select name="CaseID" class="form-control">
											
											<?php for($i=0;$i<count($case);$i++) { ?>
<option value="<?php echo $case[$i]->CaseID?>"<?php if($case[$i]->CaseID==$liste->CaseID){ ?> selected <?php } ?>><?php echo $case[$i]->CaseType?></option>
											<?php } ?>    
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									</div>
									<!--- drop down here ---->
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Case Sequence  :</label>
									<div class="col-lg-8">
										<label class="field select">
										<select name="Case_Sequence_ID" class="form-control">
										
											<?php for($r=0;$r<count($case_sequence); $r++){?>  
											<option value="<?php echo $case_sequence[$r]->CaseSequenceID;?>"<?php if($case_sequence[$r]->CaseSequenceID==$liste->CaseSequenceID) { ?> selected <?php } ?> >
											
											<?php echo $case_sequence[$r]->SequenceName; ?>
											</option>
											<?php }?>
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									</div>
								</div>	
								
							</div>
							
							<div class="col-md-12"> <hr/> </div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard"> &nbsp; </label>
								<div class="col-lg-8">
								<button class="btn active btn-success" type="submit" name="submit">
								<i class="fa fa-save"></i>  Submit </button>
								
								<a href="<?php echo base_url();?>assign_cases_sequence" class="btn active btn-warning">
								<i class="fa fa-warning"></i>
								Cancel
								</a>
								
								
								</div>	
								</div>
							</div>
						</div><!-- end col-md-12 -->	
					</div>
				</div>
			</form>
        </div>
	</div>
            <!-- End: Content -->  
</section>




        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
