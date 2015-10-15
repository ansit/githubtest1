<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title> Case Management </title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="<?php echo base_url();?>media/assets/js/jquery-1.10.2.js"></script>
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
  <!-- date picker -->  
  <link rel="stylesheet" href="<?php echo base_url(); ?>media/assets/css/jquery-ui.css">
  <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />
    
 
  <script src="<?php echo base_url();?>media/assets/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>media/assets/css/style.css">
  <script>
  $(function() {
	
	$("#Dat_Commenced").datepicker({
      dateFormat: "yy-mm-dd" //<----here
    });
	$("#enddate").datepicker({
      dateFormat: "yy-mm-dd" //<----here
    });      
  });
  
  
  
  </script>
    
 <!-- date picker -->     
    

</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>
       <?php echo $right_panel;?>
     
       
    <!-- Start: Content-Wrapper -->


    <!-- Start: Content-Wrapper -->
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>cases/addcase">Add New Cases</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->

    <div id="content" class="animated fadeIn">
        <div class="row">
      	       <form class="form-horizontal" action="<?php echo base_url(); ?>cases/addcases" method="post">	
					<div class="col-md-6">	
						<div class="panel panel-border top mt20 mb35">
							<div class="panel-body">
							  
							  <div class="form-group">
									<label for="inputStandard" class="col-lg-4 control-label"> Case Title </label>
									<div class="col-lg-8">
										<input  name="CaseTitle" value="" class="form-control casetitle" type="text">
									</div>
								</div>
								<div class="form-group">
									<label for="inputStandard" class="col-lg-4 control-label"> Case Type </label>
									<div class="col-lg-8">
										<input  name="FirstPartyCase_type" value="" class="form-control FirstPartyCase_type" type="text">
									</div>
								</div>
						
								<div class="form-group">
									<label for="inputStandard" class="col-lg-4 control-label"> Case description  </label>
									<div class="col-lg-8">
										<textarea class="form-control textarea-grow FirstPartyCase_desctiption" name="FirstPartyCase_desctiption" rows="4"> </textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="panel panel-border top mt20 mb35">
							<div class="panel-body">
								<div class="form-group">
									<label for="inputStandard" class="col-lg-4 control-label"> Amount in Dispute </label>
									<div class="col-lg-8">
										<input  name="AmountInDisputeFirst_party" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" value="" class="form-control AmountInDisputeFirst_party" type="text">
									</div>
								</div>
								<div class="form-group">
									<label for="inputStandard" class="col-lg-4 control-label">  Category of Dispute </label>
									<div class="col-lg-8">
									<input  name="CategoryofDispute"  value="" class="form-control CategoryofDispute" type="text">
									</div>
								</div>
							</div>
						</div>
					</div>	
					<div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab2_1" data-toggle="tab">Party 1</a>
                                    </li>
                                    <li>
                                        <a href="#tab2_2" data-toggle="tab">Party 2</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content pn br-n">
                                    <div id="tab2_1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-6">
												<div class="panel panel-primary panel-border top mt20 mb35">
													<div class="panel-body bg-light dark">
														<div class="admin-form">
													
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="checkbox-custom checkbox-system mb5 reprchk">
														<input id="checkboxExample10" type="checkbox" value="1" name="firstparty_represnt">
														<label for="checkboxExample10">you are representing this party</label>
														</div>
														</div>			
														</div>
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="radio-custom radio-system mb5">
														<input id="radioExample11" type="radio" value="plaintiff"  name="firstpartyPlain_defendant">
														<label for="radioExample11">Plaintiff</label>
														</div>
														</div>			
														</div>				
																	
																	
																	
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="radio-custom radio-system mb5">
														<input id="radioExample10" type="radio" value="defendant" name="firstpartyPlain_defendant">
														<label for="radioExample10">Defendant</label>
														</div>
														</div>			
														</div>			
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Name :</label>
														<div class="col-lg-7">
														<input name="FirstParty" value="" class="form-control FirstParty"  type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Address :</label>
														<div class="col-lg-7">
														<textarea name="AddressOfFirstParty" class="form-control AddressOfFirstParty">  </textarea>
														</div>
														</div> 
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party E-mail :</label>
														<div class="col-lg-7">
													   <input  name="FirstPartyEmail" value="" class="form-control FirstPartyEmail" type="text">
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Phone :</label>
														<div class="col-lg- input-group"> <span class="input-group-addon" id="basic-addon1">+1</span>
														 <input  onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" name="FirstPArtyPhone" maxlength="10" value="" class="form-control FirstPArtyPhone" type="text">
														</div>
														</div> 
														
														</div> 
													</div>
												</div>	
                                            </div>
											
											<div class="col-md-6">
												<div class="panel panel-primary panel-border top mt20 mb35">
													<div class="panel-body bg-light dark">
														<div class="admin-form">
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;</label>
														<div class="col-lg-7">
														&nbsp;</div>
														</div>
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Firm Name :</label>
														<div class="col-lg-7">
														<input  name="FirstParty_firm_name" value="" class="form-control FirstParty_firm_name"  type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney E-mail :</label>
														<div class="col-lg-7">
														<input  name="FirstParty_attorney_email" value="" class="form-control FirstParty_attorney_email" type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Address :</label>
														<div class="col-lg-7">
														<textarea name="FirstPartyAttorney_address" class="form-control FirstPartyAttorney_address">  </textarea>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Phone :</label>
														<div class="col-lg- input-group"> <span class="input-group-addon" id="basic-addon1">+1</span>
														<input  onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" maxlength="10" name="FirstPartyAttorney_phone" value="" class="form-control FirstPartyAttorney_phone" type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Name :</label>
														<div class="col-lg-7">
														<input  name="AttorneyNameFirst_party" value="" class="form-control AttorneyNameFirst_party"  type="text">
														</div>
														</div> 
														
														</div> <br/> <br/>
													</div>
												</div>	
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab2_2" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-6">
												<div class="panel panel-primary panel-border top mt20 mb35">
													<div class="panel-body bg-light dark">
														<div class="admin-form">
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="checkbox-custom checkbox-system mb5 reprchk">
														<input id="checkboxExample4" type="checkbox" value="1" name="secondparty_represnt">
														<label for="checkboxExample4">you are representing this party</label>
														</div>
														</div>			
														</div>
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="radio-custom radio-system mb5">
														<input id="radioExample5" type="radio" value="plaintiff"  name="secondpartyPlain_defendant">
														<label for="radioExample5">Plaintiff</label>
														</div>
														</div>			
														</div>				
																	
																	
																	
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;
														</label>
														<div class="col-lg-7">
														<div class="radio-custom radio-system mb5">
														<input id="radioExample6" type="radio" value="defendant" name="secondpartyPlain_defendant">
														<label for="radioExample6">Defendant</label>
														</div>
														</div>			
														</div>
														 
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Name :</label>
														<div class="col-lg-7">
														<input  name="SecondParty" value="" class="form-control SecondParty"  type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Address :</label>
														<div class="col-lg-7">
														<textarea name="AddressOfSecondParty" class="form-control AddressOfSecondParty">  </textarea>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party E-mail :</label>
														<div class="col-lg-7">
													   <input  name="SecondPartyEmail" value="" class="form-control SecondPartyEmail" type="text">
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Phone :</label>
														<div class="col-lg- input-group"> <span class="input-group-addon" id="basic-addon1">+1</span>
														 <input  onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');"  maxlength="10" name="SecondPartyPhone" value="" class="form-control SecondPartyPhone" type="text">
														</div>
														</div> 
														
														</div> 
													</div>
												</div>	
                                            </div>
											
											<div class="col-md-6">
												<div class="panel panel-primary panel-border top mt20 mb35">
													<div class="panel-body bg-light dark">
														<div class="admin-form">
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;</label>
														<div class="col-lg-7">
														&nbsp;</div>
														</div>
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Firm Name :</label>
														<div class="col-lg-7">
														<input  name="SecondParty_firm_name" value="" class="form-control SecondParty_firm_name" type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney E-mail :</label>
														<div class="col-lg-7">
														<input  name="SecondParty_attorney_email" value="" class="form-control SecondParty_attorney_email" type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Address :</label>
														<div class="col-lg-7">
														<textarea name="AddressOfSecondParty_attorney" class="form-control"></textarea>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Phone :</label>
														<div class="col-lg- input-group"> <span class="input-group-addon" id="basic-addon1">+1</span>
														<input  onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');"  maxlength="10"  name="SecondParty_attorney_phone" value="" class="form-control SecondParty_attorney_phone" type="text">
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Name :</label>
														<div class="col-lg-7">
														<input  name="SecondPartyAttorneyName"   value="" class="form-control SecondPartyAttorneyName" type="text">
														</div>
														</div> 
														
														
														</div> <br/> <br/> 
													</div>
												</div>	
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					
				<!---############### button start here chose button as your requirement ######################------>
				<div class="col-md-12" align="center">
            		<button class="btn active btn-success add_case" type="submit" name="btn_submit"> 
					<i class="fa fa-save"></i> Save </button>
           		
					<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url()?>cases'"> 
					<i class="fa fa-warning"></i> Cancel </button>
				</div>	
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->
<?php
if ($this->session->userdata('logged_in')){
  $session_data = $this->session->userdata('logged_in');
}			
?>
</section>


 <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/login/TweenLite.min.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/demo.js"></script>

    <!-- Page Javascript -->
     
			<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
			<script src="<?php echo base_url(); ?>media/alertify/usercase.js"></script> 
    

	<script>
	  $(document).ready(function(){
		  var fn = "<?php echo $session_data['FirstName'] ?>";
		  var ln = "<?php echo $session_data['LastName'] ?>";
		  var em = "<?php echo $session_data['Email']?>";
		$('.reprchk > input[type="checkbox"]').click(function(){
		  if ($('#checkboxExample10').is(":checked") && $('#checkboxExample4').is(":checked"))  {
			alertify.error("You can not reprent both parties same time");
			$(this).prop('checked',false);
			return false;
		  }

		 if($('#checkboxExample10').is(":checked")){
			$('input[name="FirstParty"]').val(fn+" "+ln);
			$('input[name="FirstParty"]').prop('readonly',true);
			$('input[name="FirstPartyEmail"]').val(em);
			$('input[name="FirstPartyEmail"]').prop('readonly',true);
		  }else{
			$('input[name="FirstParty"]').val("");
			$('input[name="FirstParty"]').prop('readonly',false);
			$('input[name="FirstPartyEmail"]').val("");
			$('input[name="FirstPartyEmail"]').prop('readonly',false);
		  }
		  if ($('#checkboxExample4').is(":checked")){
			$('input[name="SecondParty"]').val(fn+" "+ln);
			$('input[name="SecondParty"]').prop('readonly',true);
			$('input[name="SecondPartyEmail"]').val(em);
			$('input[name="SecondPartyEmail"]').prop('readonly',true);
		  }else{
			$('input[name="SecondParty"]').val('');
			$('input[name="SecondParty"]').prop('readonly',false);
			$('input[name="SecondPartyEmail"]').val('');
			$('input[name="SecondPartyEmail"]').prop('readonly',false);			
		  }
		 });
		//$('input[name="FirstPartyEmail"]').blur(function(){
		//  if ($(this).prop('readonly') == true) {
		//	return false;
		//  }
		//});
	  });
	</script>
    
 <!-- End: Content-Wrapper -->

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
