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
 <script>
function goBack() {
    window.history.back();
}
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
					<a href="<?php echo base_url(); ?>case_management/viewcase/<?php echo $caseItem[0]->CaseID?>">View Case</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->

    <div id="content" class="animated fadeIn">
        <div class="row">
      	      <form class="form-horizontal" action="<?php echo base_url(); ?>case_management/editcase/<?php echo $caseItem[0]->CaseID?>" method="post">
						<div class="col-md-12">
						
						 <div class="form-group">
						  <?php foreach($manager_list as $list); ?>
							 <center> <label class="col-lg-5 control-label" for="inputStandard">Assigned Manager :</label></center>
							  <div class="col-lg-1">
								 <label class="col-lg-5 control-label" for="inputStandard"><?php echo $list->FirstName; ?></label>
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
														<!--<div class="form-group">
														<label class="col-lg-8 control-label" for="inputStandard">
														<label class="option block mt15">
														<input type="checkbox" value="1" <?php if($caseItem[0]->firstparty_represnt=='1'){?> checked<?php }?> name="firstparty_represnt">
														<span class="checkbox"></span>
														you are representing this party
														</label>
														</label>
														</div>  -->
														
														<!--<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														<label class="option block mt15">
														<input type="radio" value="plaintiff" <?php if($caseItem[0]->firstpartyPlain_defendant=='plaintiff'){?> checked<?php }?>  name="firstpartyPlain_defendant">
														<span class="radio"></span>
													    Plaintiff 
                                                        </label>
                                                        <label class="option block mt15">
                                                        <input type="radio" value="defendant" <?php if($caseItem[0]->firstpartyPlain_defendant=='defendant'){?> checked<?php }?> name="firstpartyPlain_defendant">
														<span class="radio"></span>
														Defendant
														</label>
														</div> -->
																										
														<!--<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard"> &nbsp;</label>
														<div class="col-lg-7">
														&nbsp;
														</div>
														</div>-->
                                                        
                                                      <div class="form-group">
                                                      <label class="col-lg-5 control-label" for="inputStandard">Case Title :</label>
                                                      <div class="col-lg-7">
                                                     <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->CaseTitle?></label>
                                                    </div>
                                                     </div>
                                            <div class="form-group">
                                            <label class="col-lg-5 control-label" for="inputStandard"> Date Commenced :</label>
                                            <div class="col-lg-7">
                                              <label class="col-lg-5 control-label" for="inputStandard"> <?php echo $caseItem[0]->DateCommenced?></label>
                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-lg-5 control-label" for="inputStandard">End Date :</label>
                                            <div class="col-lg-7">
                                             <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->EndDate?></label>
                                          
                                            </div>
                                            </div>   
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Name :</label>
														<div class="col-lg-7">
														  <label class="col-lg-5 control-label" for="inputStandard"><?php echo $caseItem[0]->FirstParty?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Address :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
													<?php echo $caseItem[0]->AddressOfFirstParty?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party E-mail :</label>
														<div class="col-lg-7">
													  <label class="col-lg-5 control-label" for="inputStandard">
													  <?php echo $caseItem[0]->FirstPartyEmail?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Phone :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
													<?php echo $caseItem[0]->FirstPArtyPhone?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Name :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->AttorneyName?></label>
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
														Amount in Dispute :</label>
														<div class="col-lg-7">
													  <label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->AmountInDispute?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Firm Name :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->first_party_firm_name?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney E-mail :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->first_party_firm_name?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Address :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->AttorneyAddress?> </label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Phone :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->AttorneyPhone?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Case Type :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->CaseType?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Case description  :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->CaseDescription?> </label>
														</div>
														</div> 
														
														
														</div> 
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
														<!--<div class="form-group">
														<label class="col-lg-8 control-label" for="inputStandard">
														<label class="option block mt15">
														<input type="checkbox" value="1" <?php if($caseItem[0]->secondparty_represnt=='1'){?> checked<?php }?> name="secondparty_represnt">
														<span class="checkbox"></span>
														you are representing this party
														</label>
														</label>
														</div>  -->
														
														<!--<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														<label class="option block mt15">
														<input type="radio" value="plaintiff" <?php if($caseItem[0]->secondpartyPlain_defendant=='plaintiff'){?> checked<?php }?>  name="secondpartyPlain_defendant">
														<span class="radio"></span>
													    Plaintiff 
                                                         </label>
                                                        <label class="option block mt15">
														<input type="radio" value="defendant" <?php if($caseItem[0]->secondpartyPlain_defendant=='defendant'){?> checked<?php }?> name="secondpartyPlain_defendant">
														<span class="radio"></span>
														Defendant
														 </label>
														</div>-->
														
														<!--<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard"> &nbsp;</label>
														<div class="col-lg-7">
														&nbsp;
														</div>
														</div> -->
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Name :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->SecondParty?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Address :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->AddressOfSecondParty?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party E-mail :</label>
														<div class="col-lg-7">
													  <label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->SocendPartyEmail?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Party Phone :</label>
														<div class="col-lg-7">
														 <label class="col-lg-5 control-label" for="inputStandard">
													<?php echo $caseItem[0]->SocendPArtyPhone?></label>
														</div>
														</div> 
														
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Name :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
													 <?php echo $caseItem[0]->second_party_attorney?></label>
														</div>
														</div> 
                                                		
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Amount in Dispute :</label>
														<div class="col-lg-7">
													 <label class="col-lg-5 control-label" for="inputStandard">
													<?php echo $caseItem[0]->AmountInDispute_second_party?></label>
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
														
														<!--<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														&nbsp;</label>
														<div class="col-lg-7">
														&nbsp;</div>
														</div>-->
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Firm Name :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->second_party_firm_name?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney E-mail :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->second_party_attorney_email?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Address :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->second_party_attorney_address?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Attorney Phone :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->second_party_attorney_phone?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Case Type :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
														<?php echo $caseItem[0]->second_party_case_type?></label>
														</div>
														</div> 
														
														<div class="form-group">
														<label class="col-lg-5 control-label" for="inputStandard">
														Case description  :</label>
														<div class="col-lg-7">
														<label class="col-lg-5 control-label" for="inputStandard">
												<?php echo $caseItem[0]->second_party_case_description?></label>
														</div>
														</div> 
														
														
														</div> 
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
            	<a href="<?php echo base_url(); ?>case_management"><button class="btn active btn-system" type="button"> <i class="fa fa-refresh"></i>  Back </button></a>
					<!--<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>case_management'"> 
					<i class="fa fa-warning"></i> Cancel </button>-->
				</div>	
					
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
