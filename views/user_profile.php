<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="hack" >
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
   <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
 <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>  
<script type="text/javascript">
$(document).ready(function(){  
   $('#company_other').click(function(){
 	if($(this).is(':checked'))
	{
        $('#company_text').show();
	}
    else
	{
       $('#company_text').hide();
	}
  });	
  
  $('#law_other').click(function(){
 	if($(this).is(':checked'))
	{
     	$('#law_text').show();
	}
    else
	{
       $('#law_text').hide();
	}
  });
    
     
   	 
});
  
    function changefrm(id)
	{
		
		if(id=='company')
		{
		   $('#law_firm').hide();	
		   $('#company').show();	
		   
		}
		if(id=='law_firm')
		{
		   $('#company').hide();
		   $('#law_firm').show();
		  	
		}
		if(id=='individual')
		{
		   $('#company').hide();
		   $('#law_firm').hide();
			  	
		}
		if(id=='')
		{
		  $('#active_frm').val('individual');	 
		  	
		}
	}

    
</script>
    
  <script>
    var boxtest = localStorage.getItem('boxed');
    if (boxtest === 'true') {
        document.body.className += ' boxed-layout';
    }
    </script>  
   
    </script>

</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>
       <?php echo $right_panel;?>
     
       
    <!-- Start: Content-Wrapper -->
 <section id="content_wrapper">
 
 <header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>user_profile">User Profile</a>
				</li>
			</ol>
		</div>
        
	</header>
     <?php if($this->session->flashdata('msg')){ ?> 
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <?php } ?>
                        
                         <?php if(validation_errors()){?>
                 
                        <div class="alert alert-danger alert-dismissable"><?php echo validation_errors() ?></div>
                    
                        <?php } ?>

            <!-- begin canvas animation bg -->
    <?php 
		//print_r($user_data);  for numeric validation without spance onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');" 	
		echo form_open_multipart('user_profile/update_profile/'.$user_data[0]->UserID);
    ?>    
	<div class="col-md-6 form-horizontal">
		<div class="panel panel-border top mt20 mb35">
			<div class="panel-body">
				<div class="admin-form">
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label ">First Name</label>
					<div class="col-lg-8">
						<input type="text" name="FirstName" value="<?php echo $user_data[0]->FirstName ?>" class="form-control FirstName" placeholder="First name.">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label" for="textArea1"> Address </label>
					<div class="col-lg-8">
						<textarea class="form-control textarea-grow Address" name="Address" id="textArea1" rows="4"><?php echo $user_data[0]->Address ?> </textarea>
					</div>
				</div>
				
				
								
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label"> State </label>
					<div class="col-lg-8">
						<input type="text" name="State" onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');" value="<?php echo $user_data[0]->State ?>" class="form-control State">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label"> Email </label>
					<div class="col-lg-8">
						<input type="email" name="Email" value="<?php echo $user_data[0]->Email ?>" class="form-control Email">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label"> Password </label>
					<div class="col-lg-8">
						<input type="password"name="Password"value="<?php echo $user_data[0]->Password ?>"class="form-control Password">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label"> Select Position </label>
					<div class="col-lg-8">
						<label class="field select prepend-icon">
							<select  name="Position" onChange="changefrm(this.value)" class="form-control">
								<option value="" selected disabled> Select Position </option>
								<option value="individual"<?php if($user_data[0]->Position=='individual') {?> selected="selected" <?php }?>> Individual </option>
								<option value="company"<?php if($user_data[0]->Position=='company') {?> selected="selected" <?php }?>> Company </option>
								<option value="law_firm"<?php if($user_data[0]->Position=='law_firm') {?> selected="selected" <?php }?>> Law firm </option>
							</select>
                            <input type="hidden" id="old_postition" name="old_postion" value="<?php echo $user_data[0]->Position?>">
							<i class="arrow double"></i> 
						</label>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div> <!--close col-sm-6-->
	
	<div class="col-md-6 form-horizontal">
		<div class="panel panel-border top mt20 mb35">
			<div class="panel-body">
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label">Last Name</label>
					<div class="col-lg-8">
						<input type="text" name="LastName"  value="<?php echo $user_data[0]->LastName ?>" class="form-control LastName">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label">City</label>
					<div class="col-lg-8">
						<input type="text" name="City" onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');" value="<?php echo $user_data[0]->City ?>" class="form-control City">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label"> Zip </label>
					<div class="col-lg-8">
						<input type="text" name="Zip" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');"  maxlength="5"value="<?php echo $user_data[0]->Zip ?>" class="form-control Zip">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label">Firm Company Size</label>
					<div class="col-lg-8">
						<input type="text" name="Firm_CompanySize" value="<?php echo $user_data[0]->Firm_CompanySize ?>"   class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label" for="textArea1"> How did you Hear About </label>
					<div class="col-lg-8">
						<textarea class="form-control textarea-grow" onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');" name="HowDidYouHearAboutUs" id="textArea1" rows="4"><?php echo $user_data[0]->HowDidYouHearAboutUs ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-4 control-label">Phone</label>
					<div class="col-lg-8">
						<input type="text" name="PhoneNumber" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');"  maxlength="10" value="<?php echo $user_data[0]->PhoneNumber ?>" class="form-control PhoneNumber">
					</div>
				</div>
			</div>
		</div>
	</div> <!--close col-sm-6-->
	
	
	
            <!-- Begin: Content -->
            <section id="content">
                <div class="admin-form theme-info mw700" style="max-width: 100% !important;" id="login1">
                    <div class="panel panel-info mt10 br-n">
                        <div class="col-md-12">
                        <!-- end section -->
								
						<?php if($user_data[0]->Position=='law_firm') {?>
                             
						<?php 
						$firm_details = '';
						$FirmName='';
					    $FirmSize = '';
					    $AreYouAnAttorney ='';
					    $PracticeAreas_Arr = array();
					    $other_practiceArea = '';
					    $firm_details = get_user_law_firm($user_data[0]->UserID);
						if($firm_details)
						{
						  if($firm_details[0]->FirmName!='')
						  {
						    $FirmName = $firm_details[0]->FirmName;
						  }
						  if($firm_details[0]->FirmSize!='')
						  {
						    $FirmSize = $firm_details[0]->FirmSize;
						  }
						  if($firm_details[0]->AreYouAnAttorney!='')
						  {
						    $AreYouAnAttorney = $firm_details[0]->AreYouAnAttorney;
						  }
						  if($firm_details[0]->PracticeAreas!='')
						  {
						    $PracticeAreas_Arr = explode(',',$firm_details[0]->PracticeAreas);
						  }
						  if($firm_details[0]->other_practiceArea!='')
						  {
						    $other_practiceArea = $firm_details[0]->other_practiceArea;
						  }
						  
						}
								
								?>
	<!--================================= Law firm start here  ============================================-->			
                            <div id="law_firm">
                                <div class="section-divider mv40">
                                    <span>Law Firm</span>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmName" value="<?php echo $FirmName?>"  class="gui-input" placeholder="Firm Name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmSize" value="<?php echo $FirmSize?>" id="FirmSize" class="gui-input" placeholder="Firm Size">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                
                                 <div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorneylaw">
										<option value="1" <?php if($AreYouAnAttorney== 1){?> selected<?php } ?>>Yes</option>
                                        <option value="0" <?php if($AreYouAnAttorney== 0){?> selected<?php } ?>>No</option>
								   </select>
                     				<i class="arrow double"></i> 
									</label>
								</div>
                                
                                <!-- .section-divider -->
								<div class="section mb15">
                                    <h5> Practice areas </h5>
                                    <label class="option block mt15">
									<input type="checkbox" name="terms[]" value="commercial litigation"<?php if(in_array('commercial litigation',$PracticeAreas_Arr)){?>checked<?php }?>>
								    <span class="checkbox"></span>commercial litigation </label>
   
									<label class="option block mt15">
									<input type="checkbox" name="terms[]" value="personal injury"<?php if(in_array('personal injury',$PracticeAreas_Arr)){?>checked<?php }?> > 
									<span class="checkbox"></span>personal injury </label>
           
                                       
                                    <label class="option block mt15">
                                    <input type="checkbox" name="terms[]" value="corporate transactional"  <?php if(in_array('corporate transactional',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>corporate transactional 
                                    </label>
									
                                    <label class="option block mt15"> 
                                    <input type="checkbox" name="terms[]" value="insurance litigation" <?php if(in_array('insurance litigation',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>insurance litigation 
                                    </label>
									
                                    <label class="option block mt15"> 
                                    <input type="checkbox" name="terms[]" value="intellectual property" <?php if(in_array('intellectual property',$PracticeAreas_Arr)){?>checked<?php }?> ><span class="checkbox">
									</span>intellectual property 
                                    </label>
									
                                    <label class="option block mt15">
									<input type="checkbox" name="terms[]" value="products liability" <?php if(in_array('products liability',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>products liability 
                                    </label>
									
                                    <label class="option block mt15">  
									<input type="checkbox" name="terms[]" value="environmental litigation" <?php if(in_array('environmental litigation',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>environmental litigation 
                                    </label> 
									
                                    <label class="option block mt15">
									<input type="checkbox" name="terms[]" value="labor and employment" <?php if(in_array('labor and employment',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>labor and employment 
                                    </label>
									
                                    <label class="option block mt15"> 
									<input type="checkbox" name="terms[]" value="consumer litigation" <?php if(in_array('consumer litigation',$PracticeAreas_Arr)){?>checked<?php }?>> <span class="checkbox">
									</span>consumer litigation
                                    </label> 
									
                                    <label class="option block mt15">
									<input type="checkbox" name="terms[]" value="Other" id="law_other" <?php if(in_array('Other',$PracticeAreas_Arr)){?>checked<?php }?>><span class="checkbox"></span>Other 
                                    </label>
									
                                    <?php if(in_array('Other',$PracticeAreas_Arr)){
										$clsss = 'style="display:block;"';
								    } else {
										$clsss = 'style="display:none;"';
									}?>  
									
                                    <div class="col-md-6" <?php echo $clsss?> id="law_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_law" id="otherval_law" value="<?php echo $other_practiceArea;?>" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                  
                                </div>
							</div>
                                <!-- ---------------------------------company------------------------------->
                                
                                <div id="company" style="display:none;">
                                <div class="section-divider mv40">
                                    <span> Company</span>
                                </div>	
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanyName"  class="gui-input" placeholder="Company name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanySize"  class="gui-input" placeholder="Company size">
                                            <label class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                
                                <div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorney">
										<option value="1">Yes</option>
                                        <option value="0">No</option>
								   </select>
                     				<i class="arrow double"></i> 
									</label>
								</div>
                     			
								
								<div class="section mb15">
                                   <h5> Industry type  </h5>
                        <label class="option block mt15">
                         <input type="checkbox" name="terms2[]" value="Media and entertainment"><span class="checkbox"></span>Media and entertainment 
                                      </label>   
                          <label class="option block mt15">
                           <input type="checkbox" name="terms2[]" value="non-profit"><span class="checkbox"></span>non-profit 
                                         </label>
                    <label class="option block mt15">
                       <input type="checkbox" name="terms2[]" value="Real estate and construction"><span class="checkbox"></span>Real estate and construction
                                         </label>
                                         <label class="option block mt15">
                                         <input type="checkbox" name="terms2[]" value="Retail"><span class="checkbox"></span>Retail
                                          </label>
                                          <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="software and internet"><span class="checkbox"></span>software and internet
                                         </label>
                                         <label class="option block mt15">  
                                        <input type="checkbox" name="terms2[]" value="Telecommunications"><span class="checkbox"></span>Telecommunications
                                         </label> 
                                         <label class="option block mt15">  
                                        <input type="checkbox" name="terms2[]" value="Transportation and storage"><span class="checkbox"></span>Transportation and storage
                                         </label>
                                         <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="Travel recreation and leisure"><span class="checkbox"></span>Travel recreation and leisure
                                         </label> 
                                         <label class="option block mt15"> 
                                        <input type="checkbox" name="terms2[]" value="Wholesale and distribution"><span class="checkbox"></span>Wholesale and distribution
                                         </label> 
                                         <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="Other" id="company_other"><span class="checkbox"></span>Other
                                    </label>
                                    <div class="col-md-6" style="display:none;" id="company_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_company" id="otherval_company" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    
                                </div>
							</div>
                                
                                
                                
								<?php } elseif($user_data[0]->Position=='company') { ?>
	<!--================================= Law firm start here  ============================================-->	
                         
                         
                         
                          <?php 
						  $user_company = '';
						  $user_company = get_user_company($user_data[0]->UserID);
						  $company_name = '';
						  $company_size='';
						  $AreYouAnAttorney='';
						  $IndustryType_Arr = array();
						  $other_ind_type = '';
						if($user_company)
						{
						  if($user_company[0]->CompanyName!='')
						  {
						    $company_name = $user_company[0]->CompanyName;
						  }
						  if($user_company[0]->CompanySize!='')
						  {
						    $company_size = $user_company[0]->CompanySize;
						  }
						   if($user_company[0]->AreYouAnAttorney!='')
						  {
						    $AreYouAnAttorney = $user_company[0]->AreYouAnAttorney;
						  }
						  
						  if($user_company[0]->IndustryType!='')
						  {
						    $IndustryType_Arr = explode(',',$user_company[0]->IndustryType);
						  }
						  if($user_company[0]->other_ind_type!='')
						  {
						    $other_ind_type = $user_company[0]->other_ind_type;
						  }
						  
						}
						  
						  ?> 		
                              <div id="company">
                                <div class="section-divider mv40">
                                    <span> Company</span>
                                </div>	
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanyName" value="<?php echo $company_name?>"  class="gui-input" placeholder="Company name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                           <input type="text" name="CompanySize" value="<?php echo $company_size?>"  class="gui-input" placeholder="Company size">
                                            <label class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorney">
										<option value="1" <?php if($AreYouAnAttorney== 1){?> selected<?php } ?>>Yes</option>
                                        <option value="0" <?php if($AreYouAnAttorney== 0){?> selected<?php } ?>>No</option>
								   </select>
                     				<i class="arrow double"></i> 
									</label>
								</div>
                                
								
								<div class="section mb15">
                                <h5> Industry type  </h5>
                                  
                                 <label class="option block mt15">
             <input type="checkbox" name="terms2[]" value="Media and entertainment" <?php if(in_array('Media and entertainment',$IndustryType_Arr)){?>checked<?php }?>> <span class="checkbox"></span>Media and entertainment 
                                         </label>
                                         
              <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="non-profit" <?php if(in_array('non-profit',$IndustryType_Arr)){?>checked<?php }?>>
              <span class="checkbox"></span>non-profit 
               </label>
               
                <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Real estate and construction" <?php if(in_array('Real estate and construction',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Real estate and construction 
               </label>
               
               <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Retail" <?php if(in_array('Retail',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Retail 
               </label>
               
               <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="software and internet" <?php if(in_array('software and internet',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>software and internet 
               </label>
               
               <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Telecommunications" <?php if(in_array('Telecommunications',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Telecommunications 
               </label>
               
                <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Transportation and storage" <?php if(in_array('Transportation and storage',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Transportation and storage 
               </label>
               
               <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Travel recreation and leisure" <?php if(in_array('Travel recreation and leisure',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Travel recreation and leisure 
               </label>
               
                <label class="option block mt15">
              <input type="checkbox" name="terms2[]" value="Wholesale and distribution" <?php if(in_array('Wholesale and distribution',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Wholesale and distribution 
               </label>
               
                <label class="option block mt15">
              <input type="checkbox" name="terms2[]" id="company_other" value="Other" <?php if(in_array('Other',$IndustryType_Arr)){?>checked<?php }?>><span class="checkbox"></span>Other 
               </label>
                                 <?php if(in_array('Other',$IndustryType_Arr))
									      {
										     $clsss = 'style="display:block;"';
								           }
										   else
										   {
											   $clsss = 'style="display:none;"';
										   }
										   
										   ?>  
                                    
                                    
                                    <div class="col-md-6" <?php echo $clsss;?> id="company_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_company" id="otherval_company" value="<?php echo $other_ind_type?>" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    
                                </div>
							</div>
                            
                            
                            <!-------------------------law firm----------------------------------------------------------------->
                            
                            <div id="law_firm" style="display:none;">
                                <div class="section-divider mv40">
                                    <span>Law Firm</span>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmName" class="gui-input" placeholder="Firm Name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmSize" id="lastname" class="gui-input" placeholder="Firm Size">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorneylaw">
										<option value="1" >Yes</option>
                                        <option value="0" >No</option>
								   </select>
                     				<i class="arrow double"></i> 
									</label>
								</div>
                                
                                <!-- .section-divider -->
								<div class="section mb15">
                                   <h5> Practice areas </h5>
                                    <label class="option block mt15">
                              <input type="checkbox" name="terms[]" value="commercial litigation"> <span class="checkbox"></span>commercial litigation 
                                    </label>
                                     <label class="option block mt15">  
                              <input type="checkbox" name="terms[]" value="personal injury"> <span class="checkbox"></span>personal injury 
                                       </label>  
                                         <label class="option block mt15">
                              <input type="checkbox" name="terms[]" value="corporate transactional"> <span class="checkbox"></span>corporate transactional 
                                         </label>
                                         <label class="option block mt15"> 
                                        <input type="checkbox" name="terms[]" value="insurance litigation"> <span class="checkbox"></span>insurance litigation 
                                         </label>
                                         <label class="option block mt15"> 
                           <input type="checkbox" name="terms[]" value="intellectual property"> <span class="checkbox"></span>intellectual property 
                                         </label>
                                        <label class="option block mt15">
                           <input type="checkbox" name="terms[]" value="products liability"> <span class="checkbox"></span>products liability 
                                         </label>
                                         <label class="option block mt15">  
                          <input type="checkbox" name="terms[]" value="environmental litigation"> <span class="checkbox"></span>environmental litigation 
                                         </label> 
                                     <label class="option block mt15">
                         <input type="checkbox" name="terms[]" value="labor and employment"> <span class="checkbox"></span>labor and employment 
                                         </label>
                                         <label class="option block mt15"> 
                         <input type="checkbox" name="terms[]" value="consumer litigation"> <span class="checkbox"></span>consumer litigation
                                         </label> 
                                       <label class="option block mt15">
                        <input type="checkbox" name="terms[]" value="Other" id="law_other"> <span class="checkbox"></span>Other 
                                    </label>
                                    <div class="col-md-6" style="display:none;" id="law_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_law" id="otherval_law" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                </div>
                            
                            
                            
                            	
                             <?php } else { ?>
                                <!-- end section -->
                                
                                
                                
                                
                           <div id="law_firm" style="display:none;">
                                <div class="section-divider mv40">
                                    <span>Law Firm</span>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmName" class="gui-input" placeholder="Firm Name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmSize" id="lastname" class="gui-input" placeholder="Firm Size">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorneylaw">
										<option value="1">Yes</option>
                                        <option value="0">No</option>
								   </select>
                     				<i class="arrow double"></i> 
									</label>
								</div>
                                
                                <!-- .section-divider -->
								<div class="section mb15">
                                   <h5> Practice areas </h5>
                                    <label class="option block mt15">
                              <input type="checkbox" name="terms[]" value="commercial litigation"> <span class="checkbox"></span>commercial litigation 
                                    </label>
                                     <label class="option block mt15">  
                              <input type="checkbox" name="terms[]" value="personal injury"> <span class="checkbox"></span>personal injury 
                                       </label>  
                                         <label class="option block mt15">
                              <input type="checkbox" name="terms[]" value="corporate transactional"> <span class="checkbox"></span>corporate transactional 
                                         </label>
                                         <label class="option block mt15"> 
                                        <input type="checkbox" name="terms[]" value="insurance litigation"> <span class="checkbox"></span>insurance litigation 
                                         </label>
                                         <label class="option block mt15"> 
                           <input type="checkbox" name="terms[]" value="intellectual property"> <span class="checkbox"></span>intellectual property 
                                         </label>
                                        <label class="option block mt15">
                           <input type="checkbox" name="terms[]" value="products liability"> <span class="checkbox"></span>products liability 
                                         </label>
                                         <label class="option block mt15">  
                          <input type="checkbox" name="terms[]" value="environmental litigation"> <span class="checkbox"></span>environmental litigation 
                                         </label> 
                                     <label class="option block mt15">
                         <input type="checkbox" name="terms[]" value="labor and employment"> <span class="checkbox"></span>labor and employment 
                                         </label>
                                         <label class="option block mt15"> 
                         <input type="checkbox" name="terms[]" value="consumer litigation"> <span class="checkbox"></span>consumer litigation
                                         </label> 
                                       <label class="option block mt15">
                        <input type="checkbox" name="terms[]" value="Other" id="law_other"> <span class="checkbox"></span>Other 
                                    </label>
                                    <div class="col-md-6" style="display:none;" id="law_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_law" id="otherval_law" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                                </div>
                                
                            <!--888888888888888888888888company888888888888888888888888888888888 --> 
                            
                            <div id="company" style="display:none;">
                                <div class="section-divider mv40">
                                    <span> Company</span>
                                </div>	
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanyName"  class="gui-input" placeholder="Company name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanySize"  class="gui-input" placeholder="Company size">
                                            <label class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="AreYouAnAttorney" class="gui-input" 
										placeholder="Are you an attorney?">
                                        <label  class="field-icon"><i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
								
								<div class="section mb15">
                                   <h5> Industry type  </h5>
                        <label class="option block mt15">
                         <input type="checkbox" name="terms2[]" value="Media and entertainment"><span class="checkbox"></span>Media and entertainment 
                                      </label>   
                          <label class="option block mt15">
                           <input type="checkbox" name="terms2[]" value="non-profit"><span class="checkbox"></span>non-profit 
                                         </label>
                    <label class="option block mt15">
                       <input type="checkbox" name="terms2[]" value="Real estate and construction"><span class="checkbox"></span>Real estate and construction
                                         </label>
                                         <label class="option block mt15">
                                         <input type="checkbox" name="terms2[]" value="Retail"><span class="checkbox"></span>Retail
                                          </label>
                                          <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="software and internet"><span class="checkbox"></span>software and internet
                                         </label>
                                         <label class="option block mt15">  
                                        <input type="checkbox" name="terms2[]" value="Telecommunications"><span class="checkbox"></span>Telecommunications
                                         </label> 
                                         <label class="option block mt15">  
                                        <input type="checkbox" name="terms2[]" value="Transportation and storage"><span class="checkbox"></span>Transportation and storage
                                         </label>
                                         <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="Travel recreation and leisure"><span class="checkbox"></span>Travel recreation and leisure
                                         </label> 
                                         <label class="option block mt15"> 
                                        <input type="checkbox" name="terms2[]" value="Wholesale and distribution"><span class="checkbox"></span>Wholesale and distribution
                                         </label> 
                                <label class="option block mt15">
                                        <input type="checkbox" name="terms2[]" value="Other" id="company_other"><span class="checkbox tool"></span>Other
                                    </label>
                                    <div class="col-md-6" style="display:none;" id="company_text">
                                        <label class="field prepend-icon">
                                            <input type="text" name="otherval_company" id="otherval_company" class="gui-input" placeholder="Other">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    
                                </div>
							</div>    
                                
                                
                                
                          <?php }?>      
                            </div>
                            <!-- end .form-body section -->
                            
                            <div class="col-md-12" style="text-align:center; margin-bottom:50px;" > &nbsp;    
                            </div>
                            
                            
                            
                            <div class="col-md-12" style="text-align:center; margin-bottom:50px;" >
                            <input type="hidden" name="email_id" value="<?php echo $user_data[0]->Email ?>">
                              <button class="btn active btn-success user_update" type="submit"> <i class="fa fa-save"></i> Update</button>
                              <!--<button class="btn active btn-warning" type="reset"> <i class="fa fa-save"></i> Reset</button>-->
                              <button class="btn active btn-system" onclick="window.location='<?php echo base_url() ?>user_dashboard';" type="button"> <i class="fa fa-save"></i> Cancel</button>
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                       
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

   
    <!-- END: PAGE SCRIPTS -->
    <!-- End: Content-Wrapper -->
      <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/demo.js"></script>

    <!-- Page Javascript -->
     
			<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
			<script src="<?php echo base_url(); ?>media/alertify/uservalidation.js"></script> 
    
    
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script> <!-- End: Content-Wrapper -->   
        
 <?php echo $common_footer ?>       
        
        
