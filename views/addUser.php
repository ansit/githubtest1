<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?php echo $title?></title>
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
     <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />
    
    
 <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>   
 <script language="javascript">
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
		   $('#active_frm').val('company');	
		   
		}
		if(id=='law_firm')
		{
		   $('#company').hide();
		   $('#law_firm').show();
		    $('#active_frm').val('law_firm');	
		  	
		}
		if(id=='individual')
		{
		   $('#company').hide();
		   $('#law_firm').hide();
		   $('#active_frm').val('individual');	
		  	
		}
		
		if(id=='')
		{
		   $('#company').hide();
		   $('#law_firm').hide();
		   $('#active_frm').val('individual');	
		  	
		}
		
	}

		
	// Reset function 
	
	function resetFun()
	{
		document.getElementById("myform").reset();
		document.getElementById("firstname").focus();
	}
			
		


    
</script>
    
  <script>
    var boxtest = localStorage.getItem('boxed');
    if (boxtest === 'true') {
        document.body.className += ' boxed-layout';
    }
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
					<a href="<?php echo base_url(); ?>user/addUser">Add User</a>
				</li>
			</ol>
		</div>
	</header>
            <section id="content" class="">

                <div class="admin-form theme-info mw700" style="max-width: 100% !important;" id="login1">

                    

                    <div class="panel panel-info mt10 br-n">

                       
                          <?php if(validation_errors()) { ?> 
                        
                         <div class="alert alert-danger alert-dismissable"><?php echo validation_errors() ?></div>
                         <?php } ?>
                          <?php 
							$attributes = array('id' => "myform");		
                          echo form_open_multipart('user/add_user',$attributes);?>
                            <div class="col-md-12">
                                
                                <!-- .section-divider -->

                                <div class="section row" style="margin-top:10px;">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirstName" class="gui-input FirstName" id="firstname"  value="<?php echo $user_data['FirstName']?>"  placeholder="First name.">
                                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="LastName" class="gui-input LastName"  value="<?php echo $user_data['LastName']?>"  placeholder="Last name...">
                                            <label for="lastname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                <!-- end .section row section -->
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="Position" onChange="changefrm(this.value)" class="Position">
										<option value="" selected disabled> Select Position </option>
                                        <option value="individual"<?php if($user_data['Position']=='individual'){?> selected<?php }?>> Individual </option>
										<option value="company" <?php if($user_data['Position']=='company'){?> selected<?php }?>> Company </option>
										<option value="law_firm" <?php if($user_data['Position']=='law_firm'){?> selected<?php }?>> Law firm</option>
										</select>
                           	  	<i class="arrow double"></i>
									</label>
								</div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                           <textarea  name="Address" class="gui-input Address" placeholder="Address"><?php echo $user_data['Address']?></textarea>
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="City" class="gui-input City"   value="<?php echo $user_data['City']?>"  placeholder="City">
                                            <label class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label for="firstname" class="field prepend-icon">
                                            <input type="text" name="State" class="gui-input State"  value="<?php echo $user_data['State']?>"  placeholder="State">
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="Zip"  class="gui-input Zip" id="Zip" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="5"  value="<?php echo $user_data['Zip']?>" placeholder="Zip">
                                            <label class="field-icon"><i class="fa fa-tag"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
                                <div class="section">
                                    <label class="field prepend-icon">
                                   <input type="email" name="Email" class="gui-input Email" value="<?php echo $user_data['Email']?>"  placeholder="Email address">
                                                            <label class="field-icon"><i class="fa fa-envelope"></i>
                                        </label>
                                    </label>
                                </div>
								
                                <!-- end section -->

                                <div class="section">
                                    <label  class="field prepend-icon">
                                        <input type="password" name="Password" class="gui-input Password" placeholder="Create a password">
                                        <label class="field-icon"><i class="fa fa-unlock-alt"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="password" name="conPassword" class="gui-input Con_Password" id="confirmPassword"  placeholder="Retype your password">
                                        <label  class="field-icon"><i class="fa fa-lock"></i>
                                        </label>
                                    </label>
                                </div>
								
								<div class="section row">
								
                                     <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="PhoneNumber"  class="gui-input PhoneNumber" value="<?php echo $user_data['PhoneNumber']?>" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="10"  placeholder="Phone Number">
                                            <label  class="field-icon">+1
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="Firm_CompanySize" class="gui-input Firm_CompanySize" value="<?php echo $user_data['Firm_CompanySize']?>"  placeholder="Firm Company Size">
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								<div class="section row">
								  <div class="col-md-6">
                                    <label class="field prepend-icon">
                                        <textarea name="HowDidYouHearAboutUs"  class="gui-input HowDidYouHearAboutUs" placeholder="How Did You Hear About Us"><?php echo $user_data['HowDidYouHearAboutUs']?></textarea>
                                        <label class="field-icon"><i class="fa fa-gear"></i>
                                        </label>
                                    </label>
                                </div>
								</div>
								<input type="hidden" name="hidenval" value="<?php echo  isset($user_data['defentuser'])?1:0?>">
                                <!-- end section -->
								
	<!--================================= Law firm start here  ============================================-->			
                              <div id="law_firm" style="display:none;">
                                <div class="section-divider mv40">
                                    <span>Law Firm</span>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmName" value="<?php echo $user_data['FirmName']?>" class="gui-input" placeholder="Firm Name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmSize"  value="<?php echo $user_data['FirmSize']?>"  class="gui-input" placeholder="Firm Size">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorney">
                                        <option value="" >Are You Attorney</option>
										<option value="1" <?php if($user_data['AreYouAnAttorney']=='1'){?> selected<?php }?> >Yes</option>
                                        <option value="0" <?php if($user_data['AreYouAnAttorney']=='0'){?> selected<?php }?> >No</option>
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
								
	<!--================================= Law firm start here  ============================================-->			
                              <div id="company" style="display:none;">
                                <div class="section-divider mv40">
                                    <span> Company</span>
                                </div>	
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanyName" value="<?php echo $user_data['FirmName']?>"  class="gui-input" placeholder="Company name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="CompanySize" value="<?php echo $user_data['FirmSize']?>"  class="gui-input" placeholder="Company size">
                                            <label class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="AreYouAnAttorney">
                                        <option value="" >Are You Attorney</option>
										<option value="1" <?php if($user_data['AreYouAnAttorney']=='1'){?> selected<?php }?> >Yes</option>
                                        <option value="0" <?php if($user_data['AreYouAnAttorney']=='0'){?> selected<?php }?> >No</option>
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
                             
                                <!-- end section -->

                            </div>
                            <!-- end .form-body section -->
                            <div class="col-md-12" style="text-align:center; margin-bottom:50px;" >
                              <input type="hidden" id="active_frm" value="individual" name="active_frm">  
                              <button class="btn active btn-success" id="submit_btn" type="submit"> <i class="fa fa-save"></i> Submit</button>
                            <!--  <button class="btn active btn-warning" type="button"  onclick="return confirm('Are you sure want to reset ?')" > <i class="fa fa-save"></i> Reset</button>-->
                              <button class="btn active btn-system" type="button" onclick="window.location='<?php echo base_url() ?>user';"> <i class="fa fa-save"></i> Cancel</button>
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

    <!-- jQuery -->
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
            <script src="<?php echo base_url(); ?>media/alertify/lib/jquery-1.9.1.js"></script>
			<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
			<script src="<?php echo base_url(); ?>media/alertify/validation.js"></script> 
    
    
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
    </script>

    <!-- END: PAGE SCRIPTS -->

        
 <?php echo $common_footer ?>       
        
  <script>
	 
 function validatezip(Phonefield)
 {
   var f=document.myform;
   if (f.Zip.value == "")
  {
   alert("Zip is Required.");
   f.Zip.value = "";
   f.Zip.focus();
   return false;
  }
   else if (isNaN(f.Zip.value))
  {
   alert("Enter only Numeric Value.");
   f.Zip.value = "";
   f.Zip.focus();
   return false;
  }
  else if (!(f.Zip.value.length ==5))
  {
   alert("Please enter 5 digit .");
  
   f.Zip.focus();
   return false;
  }

}
	 
	</script>      
