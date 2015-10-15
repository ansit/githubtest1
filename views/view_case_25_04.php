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
					<a href="#">View Case</a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->

    <?php //echo '<pre>';print_r($caseItem); ?>
    
    <div id="content" class="animated fadeIn">
        <div class="row">
          
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>cases/editcase/<?php echo $caseItem[0]->CaseID?>" method="post">
		  
                <div class="col-md-6">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                               
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Case Title :</label>
								<div class="col-lg-7">
								<input  name="CaseTitle" value="<?php echo $caseItem[0]->CaseTitle?>" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                 <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Case Type:</label>
								<div class="col-lg-7">
								<label class="field select">
									<select  name="CaseType">
										
										<option value="1"<?php if($caseItem[0]->CaseType==1){?> selected<?php }?>>Case Type 1</option>
										<option value="2" <?php if($caseItem[0]->CaseType==2){?> selected<?php }?>>Case Type 2</option>
										<option value="3" <?php if($caseItem[0]->CaseType==3){?> selected<?php }?>>Case Type 3</option>
										<option value="4" <?php if($caseItem[0]->CaseType==4){?> selected<?php }?>>Case Type 4</option>
									</select>
									<i class="arrow double"></i>
								</label>
								</div>
								</div>
                                
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Date Commenced :</label>
								<div class="col-lg-7">
								<input  name="DateCommenced" value="<?php echo $caseItem[0]->DateCommenced?>" id="Dat_Commenced" class="form-control" type="text" placeholder="YYYY-MM-DD">
								</div>
								</div>
                                
                               <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">End Date :</label>
								<div class="col-lg-7">
								<input  name="EndDate" value="<?php echo $caseItem[0]->EndDate?>" id="enddate" class="form-control" type="text" 
								placeholder="YYYY-MM-DD">
								</div>
								</div>  
                                
                               	<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party :</label>
								<div class="col-lg-7">
							    <input  name="FirstParty" value="<?php echo $caseItem[0]->FirstParty?>" class="form-control" type="text">
								</div>
								</div> 
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Email:</label>
								<div class="col-lg-7">
							    <input  name="FirstPartyEmail" value="<?php echo $caseItem[0]->FirstPartyEmail?>" class="form-control" type="text">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Address Of First Party :</label>
								<div class="col-lg-7">
								<textarea name="AddressOfFirstParty" class="form-control"><?php echo $caseItem[0]->AddressOfFirstParty?></textarea>
								</div>
								</div>   
                                
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Phone :</label>
								<div class="col-lg-7">
							    <input  name="FirstPArtyPhone" value="<?php echo $caseItem[0]->FirstPArtyPhone?>" class="form-control" type="text">
								</div>
								</div>  
								
									
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Status :</label>
								<div class="col-lg-7">
							    <input  name="FirstPartyStatus" value="<?php echo $caseItem[0]->FirstPartyStatus?>" class="form-control" type="text">
								</div>
								</div> 
                                
                                
                                 <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Manager Assigned:</label>
								<div class="col-lg-7">
                                	<label class="field select">
									<select  name="ManagerAssigned">
										<option value="">-- Select --</option>
                                       <?php for($i=0;$i<count($manager_list);$i++){?>
										<option value="<?php echo $manager_list[$i]->UserID?>" <?php if($caseItem[0]->ManagerAssigned==$manager_list[$i]->UserID){?> selected<?php }?>><?php echo $manager_list[$i]->FirstName?></option>
                                         <?php }?>
									</select>
									<i class="arrow double"></i>
								</label>
								</div>
								</div>
                        				
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Category of Dispute :</label>
								<div class="col-lg-7">
							    <input  name="CategoryofDispute" value="<?php echo $caseItem[0]->CategoryofDispute?>" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Successful Resolution :</label>
								<div class="col-lg-7">
							    <input  name="SuccessfulResolution" value="<?php echo $caseItem[0]->SuccessfulResolution?>" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Address :</label>
								<div class="col-lg-7">
								<textarea name="AttorneyAddress" class="form-control"><?php echo $caseItem[0]->AttorneyAddress?></textarea>
								</div>
								</div> 
								
                            </div>
                        </div>
                    </div>
                </div> <!--close col-sm-6-->
				
				<div class="col-md-6">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
							
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Case Description :</label>
								<div class="col-lg-7">
								<textarea name="CaseDescription" class="form-control"><?php echo $caseItem[0]->CaseDescription?> </textarea>
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Case Status :</label>
								<div class="col-lg-7">
                                <label class="field select">
						          <select  name="CaseStatus">
									   <option value="1" <?php if($caseItem[0]->CaseStatus==1){?> selected<?php }?>>New case</option>
                                       <option value="2" <?php if($caseItem[0]->CaseStatus==2){?> selected<?php }?>>Active</option>
                                       <option value="3" <?php if($caseItem[0]->CaseStatus==3){?> selected<?php }?>>Close</option>
                                        
							   </select>
                               <i class="arrow double"></i>
								</label>
                                 
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Amount InDispute :</label>
								<div class="col-lg-7">
							    <input  name="AmountInDispute" value="<?php echo $caseItem[0]->AmountInDispute?>" class="form-control" type="text">
								</div>
								</div> 
							
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Second Party :</label>
								<div class="col-lg-7">
							    <input  name="SecondParty" value="<?php echo $caseItem[0]->SecondParty?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Address Of SecondParty :</label>
								<div class="col-lg-7">
								<textarea name="AddressOfSecondParty" class="form-control"><?php echo $caseItem[0]->AddressOfSecondParty?></textarea>
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Socend Party Email :</label>
								<div class="col-lg-7">
							    <input  name="SocendPartyEmail" value="<?php echo $caseItem[0]->SocendPartyEmail?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Socend Party Phone :</label>
								<div class="col-lg-7">
							    <input  name="SocendPArtyPhone" value="<?php echo $caseItem[0]->SocendPArtyPhone?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Second Party Status :</label>
								<div class="col-lg-7">
							    <input  name="SecondPartyStatus" value="<?php echo $caseItem[0]->SecondPartyStatus?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Ammount Settled for :</label>
								<div class="col-lg-7">
							    <input  name="AmmountSettledfor" value="<?php echo $caseItem[0]->AmmountSettledfor?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Name:</label>
								<div class="col-lg-7">
							    <input  name="AttorneyName" value="<?php echo $caseItem[0]->AttorneyName?>" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Email :</label>
								<div class="col-lg-7">
							    <input  name="AttorneyEmail" value="<?php echo $caseItem[0]->AttorneyEmail?>" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Phone :</label>
								<div class="col-lg-7">
							    <input  name="AttorneyPhone" value="<?php echo $caseItem[0]->AttorneyPhone?>" class="form-control" type="text">
								</div>
								</div> 
								
                            </div>
                        </div>
                    </div>
                </div>
				<!---############### button start here chose button as your requirement ######################------>
				<div class="col-md-12" align="center">
           		   	<button class="btn active btn-system" onclick="goBack()"> <i class="fa fa-refresh"></i>  Back </button>
					<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>admin_dashboard'"> 
					<i class="fa fa-warning"></i> Cancel </button>
				</div>	
					
			</form>      
        </div>
	</div>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
