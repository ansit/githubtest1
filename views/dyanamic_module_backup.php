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
    
      
    <script language="javascript" type="application/javascript">
	$(function(){
	var x=2;	
	 $('#add_btn').click(function(){
	
	 var str = '<div class="inner_feld_'+x+'"><div class="form-group"><label class="col-lg-4 control-label" for="inputStandard"> Claim Question </label><div class="col-lg-8"><textarea class="gui-textarea" name="claim_question[]" ></textarea></div></div><div class="form-group"><label class="col-lg-4 control-label" for="inputStandard"> Claim Type</label><div class="col-lg-8"><label class="field select"><select name="claim_type[]"><option value="1"> Text</option><option value="2"> Radio</option><option value="3"> Checkbox</option><option value="4"> Upload</option></select><i class="arrow double"></i></label></div></div><div class="form-group"><label class="col-lg-4 control-label" for="inputStandard"> &nbsp;</label><div class="col-lg-8"><div class="remove_inner_box" id="innerBox_'+x+'"><a href="javascript:void(0);" class="btn active btn-primary btn-block"><i class="fa fa-minus"></i> Remove</a></div></div></div></div>';	 
	 $('#inner_main_div').append(str);
	 x++; 
	 
	 $('.remove_inner_box').click(function(){	
     var divId = $(this).attr('id');
	 var arr_st_id = divId.split("_") ;
	 var divNumer = arr_st_id[1] ;
	 $('.inner_feld_'+divNumer).remove();	

   }); 	
		
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
					<a href="user">Module</a>
				</li>
			</ol>
		</div>
		
	   
	</header>
	
	<!-- End: Topbar -->

    <!-- Begin: Content -->
   
    <?php if($module_data!='')
	      {
			  if($module_data[0]->CaseSequenceID)
			  {
				  $CaseSequenceID = $module_data[0]->CaseSequenceID;
			  }
			  if($module_data[0]->StepName)
			  {
				  $StepName = $module_data[0]->StepName;
			  }
			  if($module_data[0]->VisibleTo)
			  {
				  $VisibleArr = explode(',',$module_data[0]->VisibleTo);
			  }
			  if($module_data[0]->StepID)
			  {
				  $claimArr = get_claim($module_data[0]->StepID);
				 
			  }
			  
			   
		  }
		  else
		  {
			  $CaseSequenceID ='';
			  $StepName       = '';
			  $VisibleArr = array();
			  $claimArr = '';
		  }
	  
	
	?>
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
             <?php if($this->uri->segment(3)!=''){ ?>
             <?php  echo form_open('case_sequence/module/'.$this->uri->segment(3));  } else { ?>
             <?php echo form_open('case_sequence/module');?>
             <?php } ?>
            
                <!-- <input type="hidden" class="inner_box_count22" id="inner_box_count" value="" name="boxcount"> -->   
                    <div class="col-md-12 form-horizontal">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
									<div class="row">
										<div class="col-md-6">
											
											<div class="admin-form">
											   
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Main case sequence </label>
												<div class="col-lg-8">
												<label class="field select">
													<select name="case_sequence_name" class="form-control" id="case_sequence_name">
                                                       <option value="">-- Select --</option>
                                                         <?php for($i=0;$i<count($case_sequence_list);$i++) { ?>
														<option value="<?php echo $case_sequence_list[$i]->CaseSequenceID?>"<?php if($CaseSequenceID == $case_sequence_list[$i]->CaseSequenceID){?> selected <?php }?>><?php echo $case_sequence_list[$i]->SequenceName?></option>
														
                                                          <?php } ?>   
													</select>
													<i class="arrow double"></i></label>
												</div>
												</div>
												
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Input only Module </label>
												<div class="col-lg-8">
												<input  name="step_name" value="<?php echo $StepName ?>" class="form-control" type="text">
												</div>
												</div>
												
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Role Name </label>
												<div class="col-lg-8">
													<select name="role_name[]" class="form-control" id="role_name" multiple="multiple">
                                            		<option value="2" <?php if(in_array('2',$VisibleArr)){?> selected <?php } ?>>  Side 1 </option>
                                              		<option value="3" <?php if(in_array('3',$VisibleArr)){?> selected <?php } ?>>  Side 2 </option>
                                                  
													</select>
												</div>
												</div>
												
											</div>
												
										</div><!-- end col-md-6 -->
										
										<div class="col-md-6">
											
											
												
										</div><!-- end col-md-6 -->
										<div class="col-md-12"> <hr/> </div>
										
										 <div class="col-md-6">
                                         
											<div class="admin-form" id="inner_main_div">
											  <div class="inner_feld_1">
                                                <?php if($claimArr!='')
												      {
												       $questionArr = get_claim_question($claimArr[0]->claim_id);
												      }
													  else
													  {
														$questionArr='';
													  }
												?>
                                                
                                              <?php if($questionArr==''){?>
                                              
                                              
                                              
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Claim Question </label>
												<div class="col-lg-8">
												<textarea class="gui-textarea" name="claim_question[]"> </textarea>
												</div>
												</div>
											   
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Claim Type</label>
												<div class="col-lg-8">
													<label class="field select">
													<select name="claim_type[]" class="form-control">
														<option value="1"> Text</option>
														<option value="2"> Radio</option>
														<option value="3"> Checkbox</option>
														<option value="4"> Upload</option>
													</select>
													<i class="arrow double"></i></label>
											
												</div>
												</div>
												
												
                                                
                                                </div>
												
												
                                                
                                                 <?php } else {
													 
												  for($i=0;$i<count($questionArr);$i++){	 
												 ?>
                                                 
                                                 <?php if($i==0){?>
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> &nbsp;</label>
												<div class="col-lg-8">
												<a href="javascript:void(0);" id="add_btn" class="btn active btn-success btn-block"><i class="fa fa-plus"></i> Add More</a>
												</div>
												</div>
												<?php } else {?>
                                             
											
                                              <div id="main_question_div_<?php echo $questionArr[$i]->QuestionID ?>">  
                                                <div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> &nbsp;</label>
												<div class="col-lg-8">
												<a href="javascript:void(0);" id="remove_<?php echo $questionArr[$i]->QuestionID ?>" class="btn active btn-primary btn-block removequstiondiv"><i class="fa fa-minus"></i> Remove</a>
												</div>
												</div>
                                              <?php } ?>
                                                 
                                                
                                                <div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Claim Question </label>
												<div class="col-lg-8">
												<textarea class="gui-textarea" name="update_claim_question[]"><?php echo $questionArr[$i]->Question ?> </textarea>
												</div>
												</div>
											   
												<div class="form-group">
												<label class="col-lg-4 control-label" for="inputStandard"> Claim Type</label>
												<div class="col-lg-8">
													<select name="update_claim_type[]">
                                                    <option value="1" <?php if($questionArr[$i]->ControlTypeID == 1){?> selected <?php } ?>>Text</option>
                                                    <option value="2" <?php if($questionArr[$i]->ControlTypeID == 2){?> selected <?php } ?>>Radio</option>
                                                    <option value="3" <?php if($questionArr[$i]->ControlTypeID == 3){?> selected <?php } ?>>Checkbox</option>
                                                    <option value="4" <?php if($questionArr[$i]->ControlTypeID == 4){?> selected <?php } ?>>Upload</option>
													</select>
											
												</div>
												</div>
                                           <input type="hidden" name="update_question_id[]" value="<?php echo $questionArr[$i]->QuestionID ?>">
											  	
                                               </div>      
                                               <div>
                                               
											  <?php  } } ?>
                                                
                                          
                                                
                                          </div>  
                                          </div>
                                          </div> 
                                          
												
										</div><!-- end col-md-6 -->
                               		
                                        <div class="col-md-12"> <hr/> </div>
										<div class="col-md-6">
											<div class="form-group">
											<label class="col-lg-4 control-label" for="inputStandard"> &nbsp;</label>
                                             <?php if($this->uri->segment(3)!=''){ ?>
											<div class="col-lg-8">
                                            <button class="btn active btn-success" type="submit" name="btn_sub_module">
											<i class="fa fa-save"></i>  Update </button>
											
                                             <?php } else { ?>
                                             
                                            <button class="btn active btn-success" type="submit" name="btn_sub_module">
											<i class="fa fa-save"></i>  Submit </button>
											
                                            <?php }  ?>
										
											<a href="javascript:void(0);" id="add_btn" class="btn active btn-success"><i class="fa fa-plus"></i> Add More</a>
											
                                    		<button class="btn active btn-warning" type="button"
											onclick="window.location='<?php echo base_url(); ?>case_sequence/module_list'">
											<i class="fa fa-warning"></i>Cancel</button>
											
											</div>
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
        
        
