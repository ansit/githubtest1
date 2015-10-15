<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. --> <!-- charactor validation :-onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');"-->
    <meta charset="utf-8">
    <title>CaseManagement</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">
    
    <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">
       <script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
   
   
 <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>   
 <script language="javascript">
$(document).ready(function(){  
   $('#company').hide();
   $('#law_firm').hide();
   $('#active_frm').val('individual');
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
     
   	 
});
  
    function changefrm(id)
	{
		if(id=='company')
		{
		   $('#law_firm').hide();	
		   $('#company').show();	
		   $('#active_frm').val(id);	
		   
		}
		if(id=='law_firm')
		{
		   $('#company').hide();
		   $('#law_firm').show();
		    $('#active_frm').val(id);	
		  	
		}
		if(id=='individual')
		{
		   $('#company').hide();
		   $('#law_firm').hide();
		   $('#active_frm').val(id);	
		  	
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
   
   
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Settings Scripts -->
   
    <!-- End: Settings Scripts -->

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content" class="">

                <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-6 va-m pln">
                          
                              <h1 style="color:#FFF">Registration Form </h1>
                          
                        </div>

                        <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                                <a href="<?php echo base_url(); ?>login" class="" title="Login Page">Back to Login</a>
                               
                            </div>

                        </div>

                    </div>

                    <div class="panel panel-info mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                            <div class="section row mn">
                                <div class="col-sm-4">
                                    <a class="button btn-social facebook span-left mr5 btn-block">
                                        <span><i class="fa fa-group"></i>
                                        </span>User Registration Form</a>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php if(validation_errors()){?>
                 
                        <div class="alert alert-danger alert-dismissable"><?php echo validation_errors() ?></div>
                    
                        <?php } ?>
                        
                          <?php echo form_open_multipart('register/register_user');?>
                            <div class="panel-body p25 bg-light">
                                <div class="section-divider mt10 mb40">
                                    <span>Set up your account</span>
                                </div>
                                <!-- .section-divider -->
                                <?php //print_r($user_info['FirstName']) ?>

                                <div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirstName"   value="<?php if($user_info!=''){echo $user_info['FirstName']; }?>" class="gui-input FirstName" placeholder="First name.">
                                            <label for="firstname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="LastName"  value="<?php if($user_info!=''){echo $user_info['LastName']; }?>" class="gui-input LastName" placeholder="Last name...">
                                            <label for="lastname" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                                <!-- end .section row section -->
								<div class="section">
									<label class="field select prepend-icon">
										<select  name="Position" onChange="changefrm(this.value)" class="Positionc">
										<option value="" selected disabled> Select Position </option>
										<option value="individual"> Individual </option>
										<option value="company"> Company </option>
										<option value="law_firm"> Law firm</option>
										</select>
									<i class="arrow double"></i>
									</label>
								</div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <textarea  name="Address" id="Address"class="gui-input Address" placeholder="Address"><?php if($user_info!=''){echo $user_info['Address']; }?></textarea> 
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="City"  class="gui-input City" placeholder="City" value="<?php if($user_info!=''){echo $user_info['City']; }?>">
                                            <label class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label for="firstname" class="field prepend-icon">
                                            <input type="text" name="State"  class="gui-input State" placeholder="State" value="<?php if($user_info!=''){echo $user_info['State']; }?>">
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="Zip" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="5"  value="<?php if($user_info!=''){echo $user_info['Zip']; }?>" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="6"  class="gui-input Zip" placeholder="Zip">
                                            <label class="field-icon"><i class="fa fa-tag"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="email" name="Email" value="<?php if($user_info!=''){echo $user_info['Email']; }?>" class="gui-input Email" placeholder="Email address">
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
                                        <input type="password" name="conPassword"  class="gui-input Con_Password" placeholder="Retype your password">
                                        <label  class="field-icon"><i class="fa fa-lock"></i>
                                        </label>
                                    </label>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                          <label class="field prepend-icon">
                                            <input type="text" name="PhoneNumber" value="<?php if($user_info!=''){echo $user_info['PhoneNumber']; }?>" maxlength="10" class="gui-input PhoneNumber" onKeyUp="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="10"  placeholder="PhoneNumber">
                                            <label  class="field-icon">+1
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label  class="field prepend-icon">
                                            <input type="text" name="Firm_CompanySize" value="<?php if($user_info!=''){echo $user_info['Firm_CompanySize']; }?>" class="gui-input Firm_CompanySize" placeholder="Firm_CompanySize">
                                            <label  class="field-icon"><i class="fa fa-building"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
								
								<div class="section">
                                    <label class="field prepend-icon">
                                 <input type="text" name="HowDidYouHearAboutUs"   value="<?php if($user_info!=''){echo $user_info['HowDidYouHearAboutUs']; }?>" class="gui-input how" placeholder="How Did You Hear About Us">
                                        <label class="field-icon"><i class="fa fa-gear"></i>
                                        </label>
                                    </label>
                                </div>
                                <!-- end section -->
								
	<!--================================= Law firm start here  ============================================-->			
                              <div id="law_firm">
                                <div class="section-divider mv40">
                                    <span>Law Firm</span>
                                </div>
								
								<div class="section row">
                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmName"  value="<?php if($user_info!=''){echo $user_info['FirmName']; }?>" class="gui-input" placeholder="Firm Name">
                                            <label  class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="col-md-6">
                                        <label class="field prepend-icon">
                                            <input type="text" name="FirmSize" <?php if($user_info!=''){echo $user_info['FirmSize']; }?>" class="gui-input" placeholder="Firm Size">
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
								
	<!--================================= Company firm start here  ============================================-->			
                              <div id="company">
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
                                            <input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z\.]/g,'');" name="CompanySize"  class="gui-input" placeholder="Company size">
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
										<option value="1" >Yes</option>
                                        <option value="0" >No</option>
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
                            <div class="panel-footer clearfix">
                                <input type="hidden" id="active_frm" name="active_frm" value="">
                                <button type="submit" class="button btn-primary pull-right submit_register_btn">Create Account</button>
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
			<script src="<?php echo base_url(); ?>media/alertify/alertifyjs.js"></script> 
    
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

</body>

</html>
