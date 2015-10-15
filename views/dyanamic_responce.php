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
	
    <!-- Casestyle CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">

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
					<a href="#">Response Module</a>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			

<!---========== Add test ==========================------------------------------------------->
				<div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span> Response Module
							</span>
                        </div>
                        <div class="panel-body pn">
							<div class="col-md-12"> &nbsp; </div>
							<div>
								<div class="admin-form">
									<div class="form-group">
									   
									<label class="col-lg-2 control-label" for="inputStandard"> Main case Sequence :</label>
									<div class="col-lg-4">
										<label class="field select">
									<select id="main_case_sequence" name="main_case_sequence" required class="form-control">
										   <option value="" selected disabled>-- Select --</option>
										   <?php if(isset($case_sequence_list[0]->CaseSequenceID))
											for($i=0;$i<count($case_sequence_list);$i++) { ?>
											//$case_sequence_list[$i]->CaseSequenceID == $case_sequence_all[0]->Main_case_sequence_ID
											<?php echo "<option value='".$case_sequence_list[$i]->CaseSequenceID."'>".$case_sequence_list[$i]->SequenceName."</option>";
											 } ?>    
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									   <div class="col-lg-12"><br></div>
									</div>
									<div class="form-group">
									<label class="col-lg-2 control-label" for="inputStandard"> Input  Module :</label>
									<div class="col-lg-4">
										<label class="field select">
										<!--<select name="input_module" required class="form-control model" id="model" onchange="showUser(this.value)">-->
										<select id="inputmod" name="input_module" required class="form-control model">
										<option value="">-- Select --</option>
											   
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									<div class="col-lg-12"><br></div>
									</div>

								</div>	
								<div class="col-lg-12"><br></div>
							</div>

							
						</div><!-- end col-md-12 -->	
					</div>
				</div>
        </div>
	</div>
            <!-- End: Content -->  
</section>




        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
