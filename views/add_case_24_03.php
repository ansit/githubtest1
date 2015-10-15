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
  
  function check_assgin_manager(id)
  {
	  var managerField = $('#ManagerAssigned').val();
	  if(id==2 && managerField =='')
	  {
	     alert('Please Manager to assgin');	  
	  }
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
					<a href="#">Add New Cases</a>
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
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                               
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Case Title :</label>
								<div class="col-lg-7">
								<input  name="CaseTitle" value="" class="form-control" type="text" placeholder="Type Here...">
								</div>
								</div>
                                
                                 <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Case Type:</label>
								<div class="col-lg-7">
								<label class="field select">
									<select  name="CaseType">
										
										<option value="1">Case Type 1</option>
										<option value="2">Case Type 2</option>
										<option value="3">Case Type 3</option>
										<option value="4">Case Type 4</option>
									</select>
									<i class="arrow double"></i>
								</label>
								</div>
								</div>
                                
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Date Commenced :</label>
								<div class="col-lg-7">
								<input  name="DateCommenced" value="" id="Dat_Commenced" class="form-control" type="text" placeholder="YYYY-MM-DD">
								</div>
								</div>
                                
                               <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">End Date :</label>
								<div class="col-lg-7">
								<input  name="EndDate" value="" id="enddate" class="form-control" type="text" 
								placeholder="YYYY-MM-DD">
								</div>
								</div>  
                                
                               	<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party :</label>
								<div class="col-lg-7">
							    <input  name="FirstParty" value="" class="form-control" type="text">
								</div>
								</div> 
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Email:</label>
								<div class="col-lg-7">
							    <input  name="FirstPartyEmail" value="" class="form-control" type="text">
								</div>
								</div> 
                                 
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Address Of First Party :</label>
								<div class="col-lg-7">
								<textarea name="AddressOfFirstParty" class="form-control">  </textarea>
								</div>
								</div>   
                                
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Phone :</label>
								<div class="col-lg-7">
							    <input  name="FirstPArtyPhone" value="" class="form-control" type="text">
								</div>
								</div>  
								
									
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">First Party Status :</label>
								<div class="col-lg-7">
							    <input  name="FirstPartyStatus" value="" class="form-control" type="text">
								</div>
								</div> 
                                
                                
                                 <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard"> Manager Assigned:</label>
								<div class="col-lg-7">
                                	<label class="field select">
									<select  name="ManagerAssigned" id="ManagerAssigned">
										<option value="">-- Select --</option>
                                       <?php for($i=0;$i<count($manager_list);$i++){?>
										<option value="<?php echo $manager_list[$i]->UserID?>"><?php echo $manager_list[$i]->FirstName?></option>
                                         <?php }?>
									</select>
									<i class="arrow double"></i>
								</label>
								</div>
								</div>
                        				
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Category of Dispute :</label>
								<div class="col-lg-7">
							    <input  name="CategoryofDispute" value="" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Successful Resolution :</label>
								<div class="col-lg-7">
							    <input  name="SuccessfulResolution" value="" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Address :</label>
								<div class="col-lg-7">
								<textarea name="AttorneyAddress" class="form-control">  </textarea>
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
								<textarea name="CaseDescription" class="form-control">  </textarea>
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Case Status :</label>
								<div class="col-lg-7">
							   <label class="field select">
						          <select  name="CaseStatus" onChange="check_assgin_manager(this.value);">
									   <option value="1">New case</option>
                                       <option value="2">Active</option>
                                       <option value="3">Close</option>
                                        
							   </select>
                               <i class="arrow double"></i>
								</label>
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Amount InDispute :</label>
								<div class="col-lg-7">
							    <input  name="AmountInDispute" value="" class="form-control" type="text">
								</div>
								</div> 
							
                                <div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Second Party :</label>
								<div class="col-lg-7">
							    <input  name="SecondParty" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Address Of SecondParty :</label>
								<div class="col-lg-7">
								<textarea name="AddressOfSecondParty" class="form-control">  </textarea>
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Socend Party Email :</label>
								<div class="col-lg-7">
							    <input  name="SocendPartyEmail" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Socend Party Phone :</label>
								<div class="col-lg-7">
							    <input  name="SocendPArtyPhone" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Second Party Status :</label>
								<div class="col-lg-7">
							    <input  name="SecondPartyStatus" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Ammount Settled for :</label>
								<div class="col-lg-7">
							    <input  name="AmmountSettledfor" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Name:</label>
								<div class="col-lg-7">
							    <input  name="AttorneyName" value="" class="form-control" type="text">
								</div>
								</div> 
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Email :</label>
								<div class="col-lg-7">
							    <input  name="AttorneyEmail" value="" class="form-control" type="text">
								</div>
								</div> 
								
								
								<div class="form-group">
								<label class="col-lg-5 control-label" for="inputStandard">Attorney Phone :</label>
								<div class="col-lg-7">
							    <input  name="AttorneyPhone" value="" class="form-control" type="text">
								</div>
								</div> 
								
                            </div>
                        </div>
                    </div>
                </div>
				<!---############### button start here chose button as your requirement ######################------>
				<div class="col-md-12" align="center">
            		<button class="btn active btn-success" type="submit" name="btn_submit"> 
					<i class="fa fa-save"></i> Save </button>
           		<button class="btn active btn-system" name="btnSubmit" value="btncase" type="submit"> <i class="fa fa-refresh"></i>  Reset </button>
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
        
        
