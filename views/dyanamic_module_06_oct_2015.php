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
   
    <?php /*error_reporting(0);*/?>
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form class="form-horizontal" method="post" action="">

<!---========== Add test ==========================------------------------------------------->
				<div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span> <?php
								if(isset($Case_Sequence_ID)){
								 echo "Edit";
								 }else{echo "Add";}?> Module
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
										<select name="main_case_sequence" required class="form-control" id="case_sequence_name">
										   <option value="">-- Select --</option>
										   <?php if(isset($case_sequence_all[0])){
											foreach($case_sequence_list as $case_sequence_list){ 
												echo "<option value='";
												echo ($case_sequence_list->CaseSequenceID == $case_sequence_all[0]->Main_case_sequence_ID)?$case_sequence_list->CaseSequenceID."' selected":$case_sequence_list->CaseSequenceID."'";
												echo ">".$case_sequence_list->SequenceName."</option>";
											 }
										   }else{
											 foreach($case_sequence_list as $case_sequence_list){
												echo "<option value='".$case_sequence_list->CaseSequenceID."'>".$case_sequence_list->SequenceName."</option>";
											 }
										   }
										   
											 ?>
										   
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									</div>
							
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Input Module :</label>
									<div class="col-lg-8">
									<input  required class="form-control" type="text" name="input_module" value="<?php echo isset($case_sequence_all[0]->input_module)?$case_sequence_all[0]->input_module:'';?>">
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> User role  :</label>
									<div class="col-lg-8">
										<?php
										if(isset($case_sequence_all[0]->side_authority)){
										$data = explode('@',$case_sequence_all[0]->side_authority);
										}
										?>
										<select name="side_authority[]" class="form-control" id="role_name" multiple="multiple" required>
										<option value="1" <?php echo isset($data[0])?'selected':'';?>>  Side 1 </option>
										<option value="2"<?php echo isset($data[1])?'selected':'';?>>  Side 2 </option>
									  
										</select>
									</div>
									</div>
								</div>	
							</div>
							<div class="col-md-12"> <hr/> </div>
							
							<?php
							//print_r($get_all_question);
							if(isset($get_all_question)){ 
							$length = $get_all_question;
							for($r=0;$r<count($length);$r++){
							  
							  ?>
							<div class="col-md-6">
								<div class="admin-form">
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question : </label>
									<div class="col-lg-8">
									<textarea class="gui-textarea" name="question[]" id="form-field-8"><?php echo isset($get_all_question[$r]->Question)?$get_all_question[$r]->Question:''; ?></textarea>
									<input id="form-field-6" type="hidden" name="IDQuest[]" value="<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>"  >
									<input id="form-field-6" type="hidden" name="iDAlternativa[]" value="<?php echo isset($get_all_question[$r]->iDAlternativa)?$get_all_question[$r]->iDAlternativa:''?>">
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Response type  :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select class="t_a"  name="t_a[]"  required>
											<option> </option>
											<?php if(isset($get_all_question[$r]->t_a)){?>
											<option value="Radio" <?php if($get_all_question[$r]->t_a=="Radio"){ echo "selected"; }?> >Radio Group</option>
											<option value="Checkbox" <?php if($get_all_question[$r]->t_a=="Checkbox"){ echo "selected"; }?>>Check Box</option>
											<option value="Text" <?php if($get_all_question[$r]->t_a=="Text"){ echo "selected"; }?>>Text Box</option>
											<option value="file" <?php if($get_all_question[$r]->t_a=="file"){ echo "selected"; }?>>upload</option>
											<?php }else{?>
											<option value="Radio">Radio Group</option>
											<option value="Checkbox">Check Box</option>
											<option value="Text">Text Box</option>
											<option value="file">upload</option> 
											<?php }?>
										
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									<div class="option_set">
									<?php
									//if($get_all_question[$r]->t_a
									if(isset($get_all_question[$r]->t_a)=="Radio" || isset($get_all_question[$r]->t_a)=="Checkbox"){
									$data=explode("@",$get_all_question[$r]->option_list); ?>
									
									<div class="col-md-12"> <br/>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 1 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php echo isset($data[0])?$data[0]:'';?>" >
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 2 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php echo isset($data[1])?$data[1]:''?>">
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 3 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php echo isset($data[2])?$data[2]:''?>" >
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 4 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php echo isset($data[3])?$data[3]:''?>" >
									</div>
									</div>
									</div>
									<?php  }else if($get_all_question[$r]->t_a=="file"){?>
									<div class="col-md-12"> <br/>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 1 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php echo isset($data[0])?$data[0]:'';?>" >
									</div>
									</div>
									</div>
									
									<?php }?>
									<?php //else{ ?>
									<!--<input id="form-field-6" name="options[]" style="width:120px;" value="0" type="hidden">
									<input id="form-field-6" name="options[]" style="width:120px;" value="0" type="hidden">
									<input id="form-field-6" name="options[]" style="width:120px;" value="0" type="hidden">
									<input id="form-field-6" name="options[]" style="width:120px;" value="0" type="hidden">-->
									<?php //}?>
									
									</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12"> <hr/> </div>
							<?php }}/* else {*/?>
							
							<!--<div class="col-md-6">
								<div class="admin-form">
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question : </label>
									<div class="col-lg-8">
									<textarea class="gui-textarea" name="question[]" id="form-field-8"></textarea>
									<input id="form-field-6" type="hidden" name="IDQuest[]" value="<?=$get_all_question[$r]->IDQuest?>"  >
									<input id="form-field-6" type="hidden" name="iDAlternativa[]" value="<?=$get_all_question[$r]->iDAlternativa?>">
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question Type :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select class="t_a"  name="t_a[]"  required>
											<option> </option>
											<option value="Radio" <? if($get_all_question[$r]->t_a=="Radio"){ echo "selected"; }?> >Radio Group</option>
											<option value="Checkbox" <? if($get_all_question[$r]->t_a=="Checkbox"){ echo "selected"; }?>>Check Box</option>
											<option value="Text" <? if($get_all_question[$r]->t_a=="Text"){ echo "selected"; }?>>Text Box</option>
											<option value="file" <? if($get_all_question[$r]->t_a=="file"){ echo "selected"; }?>>upload</option>
										
										</select>
										<i class="arrow double"></i>
									</label>
									</div>
									<div class="option_set"></div>
									</div>
								</div>
							</div>-->
							
							<?php /*}*/?>
							
							<?php //if(!$case_sequence_all[0]->Case_Sequence_ID > 0){ ?>
							<div class="col-md-12"> <hr/> </div>
							<?php //}?>
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