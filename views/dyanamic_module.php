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
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/vendor/validate/validetta.min.css">
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
     
         <?php /*print_r($case_sequence_all);*/ 
	  foreach ($case_sequence_all as $list)
	  //echo $list->Case_Sequence_ID;
	  ?>
    <!-- Start: Content-Wrapper -->
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
				  <?php
				  if($list->Case_Sequence_ID) { ?>
					<a href="<?php echo base_url(); ?>case_sequence/module/<?php echo $list->Case_Sequence_ID; ?>"> Edit Module</a>
				  <?php } else {  ?> <a href="<?php echo base_url(); ?>case_sequence/module"> Add Module</a><?php } ?>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
    <?php /*error_reporting(0);*/?>
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form class="form-horizontal" id="frmaddmodule" method="post" action="">

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
										<select name="main_case_sequence"  class="form-control" id="case_sequence_name" data-validetta="required"  >
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
							</br>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Input Module :</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="input_module" value="<?php echo isset($case_sequence_all[0]->input_module)?$case_sequence_all[0]->input_module:'';?>" data-validetta="required">
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
										<select name="side_authority[]" class="form-control" id="role_name" multiple="multiple"  data-validetta="required">
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
									<textarea class="gui-textarea" name="question[]" id="form-field-8" data-validetta="required"><?php echo isset($get_all_question[$r]->Question)?$get_all_question[$r]->Question:''; ?></textarea>
									<input id="form-field-6" type="hidden" name="IDQuest[]" value="<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>"  >
									<input id="form-field-6" type="hidden" name="iDAlternativa[]" value="<?php echo isset($get_all_question[$r]->iDAlternativa)?$get_all_question[$r]->iDAlternativa:''?>">
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Response type  :</label>
									<div class="col-lg-8">
									<label class="field select">
										<select class="t_a"  name="t_a[]"  data-validetta="required">
											<option value="" selected disabled>Select any</option>
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
									if(isset($get_all_question[$r]->t_a)=="Radio" || isset($get_all_question[$r]->t_a)=="Checkbox"){
									$data=explode("@",$get_all_question[$r]->option_list); ?>
									
									<div class="col-md-12"> <br/>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 1 . </label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>][]" value="<?php echo isset($data[0])?$data[0]:'';?>" >
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 2 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>][]" value="<?php echo isset($data[1])?$data[1]:''?>">
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 3 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>][]" value="<?php echo isset($data[2])?$data[2]:''?>" >
									</div>
									</div>
									
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 4 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[<?php echo isset($get_all_question[$r]->IDQuest)?$get_all_question[$r]->IDQuest:''?>][]" value="<?php echo isset($data[3])?$data[3]:''?>" >
									</div>
									</div>
									</div>
									<?php  }else if($get_all_question[$r]->t_a=="file"){?>
									<!--<div class="col-md-12"> <br/>
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> 1 .</label>
									<div class="col-lg-8">
									<input  class="form-control" type="text" name="options[]" value="<?php //echo isset($data[0])?$data[0]:'';?>" >
									</div>
									</div>
									</div>
									-->
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
								 <?php
				  if($list->Case_Sequence_ID) { ?>
								<button class="btn active btn-success" type="submit" name="test">
								<i class="fa fa-save"></i>  Update </button> <?php }else { ?>
								<button class="btn active btn-success" type="submit" name="test">
								<i class="fa fa-save"></i>  Add </button> <?php } ?>
								
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

<script src="<?php echo base_url()."assets/js/lightbox.min.js"?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/validate/validetta.min.js"></script>




<!--<script>-->
<!-- 	$.validator.setDefaults({-->
<!--		submitHandler: function(form) {-->
<!--			form.submit();-->
<!--		}-->
<!--	});-->
<!--       -->
<!--</script>-->

   <script type="text/javascript">
    $(document).ready(function() {
    //$('#role_name').multiselect();
	
	$("#frmaddmodule").validetta({
	   realTime : true,
	    display : 'inline',
        errorTemplateClass : 'validetta-inline'
	  });	
	
    });
	
    </script>
   
   <script>
	  $(document).ready(function(){
		 $.each($('.t_a'),function(){
			if ($(this).val() == "file") {
			   $(this).parent().parent().parent().find(".option_set div").hide();
		 }
		 });
	  });
   </script>
        <!-- End: Content-Wrapper -->

<script>
function goBack() {
    window.history.back();
}
</script>   


        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>