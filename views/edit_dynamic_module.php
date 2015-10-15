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
					<a href="user">Module</a>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
    <?php error_reporting(0);?>
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form class="form-horizontal" method="post" action="">

<!---========== Add test ==========================------------------------------------------->
				<div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span> Add Test
							</span>
                        </div>
                        <div class="panel-body pn">
							<div class="col-md-12"> &nbsp; </div>
							<div class="col-md-6">
								<div class="admin-form">
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Main case Sequence :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select name="main_case_sequence" class="form-control" id="case_sequence_name">
										   <option value="">-- Select --</option>
											 <?php for($i=0;$i<count($case_sequence_list);$i++) { ?>
											<option value="<?php echo $case_sequence_list[$i]->CaseSequenceID?>"<?php if($CaseSequenceID == $case_sequence_list[$i]->CaseSequenceID){?> selected <?php }?>><?php echo $case_sequence_list[$i]->SequenceName?></option>
											
											  <?php } ?>   
										</select>
										<i class="arrow double"></i></label>
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Input only Module :</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="input_module" value="<?=$test_info[0]->Descfricao ?>">
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Role Name :</label>
									<div class="col-lg-8">
										<select name="side_authority[]" class="form-control" id="role_name" multiple="multiple">
										<option value="1" <?php if(in_array('2',$VisibleArr)){?> selected <?php } ?>>  Side 1 </option>
										<option value="2" <?php if(in_array('3',$VisibleArr)){?> selected <?php } ?>>  Side 2 </option>
									  
										</select>
									</div>
									</div>
								</div>	
							</div>
							<div class="col-md-12"> <hr/> </div>
							<div class="col-md-6">
								<div class="admin-form">
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question : </label>
									<div class="col-lg-8">
									<textarea class="gui-textarea" name="question[]" id="form-field-8"><?=trim($test_quest[$r]->Question)?></textarea>
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question Type :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select class="t_a"  name="t_a[]"  required>
											<option> </option>
											<option value="Radio" <? if($test_quest[$r]->t_a=="Radio"){ echo "selected"; }?> >Radio Group</option>
											<option value="Checkbox" <? if($test_quest[$r]->t_a=="Checkbox"){ echo "selected"; }?>>Check Box</option>
											<option value="Text" <? if($test_quest[$r]->t_a=="Text"){ echo "selected"; }?>>Text Box</option>
											<option value="upload" <? if($test_quest[$r]->t_a=="Text"){ echo "selected"; }?>>upload</option>
										
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									<div class="option_set"></div>
									</div>
									
									
								</div>
							</div>

							<div class="col-md-12"> <hr/> </div>
						
							<!------  Add more question here ----->
							<div class="addnewquestion">
	
	
							</div>	
							
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard"> &nbsp; </label>
								<div class="col-lg-8">
								<button class="btn active btn-success" type="submit" name="test">
								<i class="fa fa-save"></i>  Submit </button>
								
								<a href="<?php echo base_url();?>case_sequence/module_list" class="btn active btn-warning">
								<i class="fa fa-warning"></i>
								Cancel
								</a>
								
								<button class="btn active btn-success new_question" type="button"> 
								<i class="fa fa-plus"></i>  Add More </button>
								
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
        
        
