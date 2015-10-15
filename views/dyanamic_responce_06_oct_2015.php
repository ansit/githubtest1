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
					<a href="<?php echo base_url(); ?>case_sequence/response">Response Module</a>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form class="form-horizontal" method="post" action="">

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
							<div class="col-md-6">
								<div class="admin-form">
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Main case Sequence :</label>
									<div class="col-lg-8">
										<label class="field select">
									<select name="main_case_sequence" required class="form-control" onchange="find_main(this.value)">
										   <option value="">-- Select --</option>
										   <?php if(isset($case_sequence_list[0]->CaseSequenceID))
											for($i=0;$i<count($case_sequence_list);$i++) { ?>
											//$case_sequence_list[$i]->CaseSequenceID == $case_sequence_all[0]->Main_case_sequence_ID
											<?php echo "<option value='".$case_sequence_list[$i]->CaseSequenceID."'>".$case_sequence_list[$i]->SequenceName."</option>";
											 } ?>    
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									</div>
									<!--- drop down here ---->
									<?php if(isset($main_case_sequence)){?>
									<div id="model"></div>
									<?php }else {?>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Input  Module :</label>
									<div class="col-lg-8">
										<label class="field select">
										<select name="input_module" required class="form-control model" id="model" onchange="showUser(this.value)">
										<option value="">-- Select --</option>
											   
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									</div>
									<?php }?>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> User role :</label>
									<div class="col-lg-8">
										<?php
										if(isset($case_sequence_all[0]->side_authority)){
										$data = explode('@',$case_sequence_all[0]->side_authority);
										}?>
										<select name="side_authority[]" required class="form-control" id="role_name" multiple="multiple">
										<option value="1" <?php isset($data[0])?"selected":""?>>  Side 1 </option>
										<option value="2" <?php isset($data[1])?"selected":"" ?>>  Side 2 </option>
									  
										</select>
									</div>
									</div>
									
								</div>	
								
							</div>
							
							<div class="col-md-12"> <hr/> </div>
							<!-- view question all ---->
							<div class="col-md-12" id="txtHint"></div>
							<!-- view question all ---->
							<div class="col-md-12"> <hr/> </div>
							
							<div class="col-md-6">
								<div class="admin-form">
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question : </label>
									<div class="col-lg-8">
									<textarea class="gui-textarea" name="question[]" id="form-field-8"></textarea>
									<input id="form-field-6" type="hidden" name="IDQuest[]" value="<?php //echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>"  >
									<input id="form-field-6" type="hidden" name="iDAlternativa[]" value="<?php //echo isset($get_all_question[$r]->iDAlternativa)?$get_all_question[$r]->iDAlternativa:'';?>">
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Response type :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select class="t_a"  name="t_a[]"  required>
											<option> </option>
											<option value="Radio" <?php //echo ($test_quest[$r]->t_a=="Radio")?"selected":"";?> >Radio Group</option>
											<option value="Checkbox" <?php //echo ($test_quest[$r]->t_a=="Checkbox")?"selected":""; ?>>Check Box</option>
											<option value="Text" <?php //echo ($test_quest[$r]->t_a=="Text")?"selected":""; ?>>Text Box</option>
											<option value="upload" <?php //echo ($test_quest[$r]->t_a=="Text")?"selected":""; ?>>upload</option>
										
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
								<button class="btn active btn-success" type="submit" name="responce">
								<i class="fa fa-save"></i>  Submit </button>
								
								<button class="btn active btn-warning " type="button" onclick="goBack()">
							  <i class="fa fa-warning"></i> Cancel </button>
								
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
        
      <script>
function goBack() {
    window.history.back();
}
</script>     
