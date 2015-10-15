<!DOCTYPE html>
<html>
<?php error_reporting(0); ?>
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
	
	    <!-- casestyle CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/casestyle.css">

   <!--lightbox-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/lightbox.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/assets/img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	
	
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
   /*.commentsection{background:#bddce8;}*/
   .glyphicon-remove-sign{
	  visibility: hidden;
   }
   .comrow:hover > .glyphicon-remove-sign{
	  background:#bddce8;
	  visibility: visible;
   }
</style>
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
					<a href="#">Case Page</a>
				</li>
			</ol>
		</div>
		<!--<div class="topbar-right">    
			<a href="<?php echo base_url(); ?>cases/addcase"><button  class="btn btn-success btn-sm light fw600 ml10 pull-right" type="button"><i class="fa fa-plus"></i>
            Add New</button></a>
		</div>-->
	   
	</header>
	<div class="backbutton"><?php $attributes = array('class'=>'btn btn-info');
	echo anchor('manager_dashboard/view_case/'.$caseItem[0]->CaseID,'<span class="glyphicon glyphicon-circle-arrow-left"></span> Back to View Report',$attributes); ?></div>
    <?php if($this->session->flashdata('msg')){ ?> 
    <!--########################## Message for update add edit delete ##################### ----------->
		<div class="col-md-12"> 
			<div class="alert alert-success dark alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="fa fa-check pr10"></i>
				 <?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
    <?php } ?>           
	<!--############### Main Body of Form start start , good alignment view notepad++  editer ####### ----------->

    <!-- Begin: Content --> 
    <div id="content">
        <div class="row">
		 <?php if($stepno == 1){?>
		 <!--details section start here-->
		 <div class="col-md-12"><h2>Details</h2></div>
			<div class="col-md-12">
			
				<div class="panel-body form-horizontal">
		 			<div class="form-group">
						<label> Case Type</label>
							<?php echo $caseItem[0]->CaseType ?>
					</div>				  

					<div class="form-group">
						<label> Amount in Controversy </label>
						
							$<?php echo number_format($caseItem[0]->AmountInDispute,2)?> 
						
					</div>
					<div class="form-group">
						<label> Case Commenced </label>
						<?php echo $caseItem[0]->DateCommenced;?>
					</div>
					<div class="form-group">
						<label> Case Commenced </label>
						<?php echo $caseItem[0]->DateCommenced?>
					</div>
					<?php if($partyno == 1){?>
		 			<div class="form-group">
						<label>First Party Names </label>
							<?php echo $caseItem[0]->FirstParty; ?>
					</div>		
		 			<div class="form-group">
						<label>First Party Address </label>
							<?php echo $caseItem[0]->AddressOfFirstParty; ?>
					</div>
		 			<div class="form-group">
						<label>First Party Phone Number</label>
							<?php echo $caseItem[0]->FirstPArtyPhone;?>
					</div>
		 			<div class="form-group">
						<label>First Party Email</label>
							<?php echo $caseItem[0]->FirstPartyEmail;?>
					</div>
		 			<div class="form-group">
						<label>First Party Firm Name</label>
							<?php echo $caseItem[0]->first_party_firm_name;?>
					</div>
					
		 			<div class="form-group">
						<label>First Party Attorney Name </label>
							<?php echo $caseItem[0]->AttorneyName;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Email</label>
							<?php echo $caseItem[0]->AttorneyEmail;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Address </label>
							<?php echo $caseItem[0]->AttorneyAddress;?>
					</div>					
		 			<div class="form-group">
						<label>First Party Attorney Phone </label>
							<?php echo $caseItem[0]->AttorneyPhone;?>
					</div>					
					<?php }else{?>
		 			<div class="form-group">
						<label>Second Party Names </label>
							<?php echo $caseItem[0]->SecondParty; ?>
					</div>		
		 			<div class="form-group">
						<label>Second Party Address </label>
							<?php echo $caseItem[0]->AddressOfSecondParty; ?>
					</div>
		 			<div class="form-group">
						<label>Second Party Phone Number</label>
							<?php echo $caseItem[0]->SocendPArtyPhone;?>
					</div>
		 			<div class="form-group">
						<label>Second Party Email</label>
							<?php echo $caseItem[0]->SocendPartyEmail;?>
					</div>
		 			<div class="form-group">
						<label>Second Party Firm Name</label>
							<?php echo $caseItem[0]->second_party_firm_name;?>
					</div>

		 			<div class="form-group">
						<label>Second Party Attorney Name </label>
							<?php echo $caseItem[0]->second_party_attorney;?>
					</div>					
		 			<div class="form-group">
						<label>Second Party Attorney Email</label>
							<?php echo $caseItem[0]->second_party_attorney_email;?>
					</div>					
		 			<div class="form-group">
						<label>Second Party Attorney Address </label>
							<?php echo $caseItem[0]->second_party_attorney_address;?>
					</div>					
		 			<div class="form-group">
						<label>Second Party Attorney Phone </label>
							<?php echo $caseItem[0]->second_party_attorney_phone;?>
					</div>					
					 
					<?php }?>
				</div>
			</div>
	
			   <!--details section closed here-->
			   <?php }
			   
			   
			   elseif($stepno == 2){ ?>
			   <!--question response starts here-->
			<div class="col-md-12"><h2>User Response</h2></div>
			
			
			   
			   <?php
			   //print_r($userid);
			   //print_r($filledans);
			   $i = 0;
			   foreach($questions as $questions){
				  foreach($questions as $question){
					 if($question['side_auth']->side_authority == strval($partyno)){
								continue;
					 }
				  ?>
			   <div class="col-md-12">
			   <div class="admin-form">
			   <div class="form-group">
			   <label class="col-md-2 control-label" for="inputStandard"> Question :<?=$question['t_a']?> </label>
			   <div class="col-md-10">
			   <label class="gui-textarea"><?php echo $question['Question']?></label>
			   </div>
			   
			   <label class="col-md-2 control-label" for="inputStandard"> Answer : </label>
			   <div class="col-md-10">
				  <div class="well">
			   <?php if($question['t_a'] == "Text"){?>
			   <p class="text-primary mn"><?=$filledans[$i]->anstxt?>.</p>
			   <?php }elseif($question['t_a'] == "Radio"){
										  echo '<div class="radio-custom radio-primary">';
										  $opt =  explode('@',$question['option_list']);
										  //print_r($filledans[$i]->anstxt);
										  $j=0;
										foreach($opt as $opt):
										if($opt !== ''){
										  $j++;
										?>
										<input type="radio" id="rad<?php echo $question['IDQuest'].$j?>" name="ansrad<?php echo $question['IDQuest']?>" value="<?php echo $opt?>" <?php if(isset($filledans[$i]->anstxt)){ echo ($filledans[$i]->anstxt == $opt)?"checked":"";}?> disabled>
										<label for="rad<?php echo $question['IDQuest'].$j?>"><?php echo $opt?></label>
										<?php
										}
										endforeach;
										echo '</div>';
										}elseif($question['t_a'] == "Checkbox"){
										  $opt =  explode('@',$question['option_list']);
										  if(isset($filledans[$i]->anstxt)){
											$valarr = explode('@', $filledans[$i]->anstxt);
											//print_r($valarr);
											echo "<br>";
											
										  }else{
											$valarr = array();
										  }
										  ?>
										<span class="checkbox-custom checkbox-info">
										  <?php
										  
										  $k = 0;
										  foreach($opt as $opt):
										  if($opt !== ''){
											$k++;
											
										  ?>
										  
											<input type="checkbox" id="ck<?php echo $question['IDQuest'].'q'.$k?>" class="chkgen" name="anschk<?=$question['IDQuest']?>[]" value="<?php echo $opt;?>"  <?php echo in_array($opt, $valarr)?"checked":"" ?> disabled>
											<label for="ck<?php echo $question['IDQuest'].'q'.$k?>"><?php echo $opt;?></label>
										<?php }endforeach;?>
										</span>
										<?php }elseif($question['t_a'] == "file"){?>
										<p class="text-system mn sliderupl">See Uploaded files</p>
										<label ><a href="<?php echo site_url('uploads/'.$filledans[$i]->f_name)?>" data-lightbox="image-<?=$i?>"><img src="<?php echo site_url('uploads/'.$filledans[$i]->f_name)?>" class="passport thumbnail" /></a></label>
										<?php }?>
										
			   </div>
			   </div>
			   </div>
			   </div>
			   </div>
			   <div class="col-md-12"> <hr/> </div>
			   <?php $i++; }} ?>

			   <!--question response ends here-->
			   <?php }?>
			   
			   <!--comment section starts-->
     
		 <div class="col-md-12">
			<h2>Comments</h2>
			</div>
		 <div class="col-md-12">
			<!--<div class="col-md-12">-->
		 <div class="panel-body form-horizontal">
		<div class="commentsection">
		 <?php
		 foreach($manacomment as $com):
		 echo "<p id='".$com->commentid."' class='comrow'>".$com->comment." on ".$com->created." <span data-toggle='tooltip' data-placement='right' title='delete' class='glyphicon glyphicon-remove-sign delcom'></span></p>";
		 endforeach;
		 ?>
		</div>
		 </div>
		 
		</div>
		 
		 <!--comment section ends here-->
		 
		</div>
	
<?php
$session_data = $this->session->userdata('logged_in');
$userid = $session_data['UserID'];
?>
		<br>
		<?php $attributes = array('id'=>'frmaddcom');
		echo form_open('manager_dashboard/addcomment',$attributes);?>
   <div class="row">
   <div class="col-lg-6">
    <div class="input-group">
	  
      <input type="text" name="txtcom" class="form-control" placeholder="Write a comment">
	  
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Go!</button>
      </span>
    
	</div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->  
  <div class="col-lg-6">
  </div><!-- /.col-lg-6 -->

</div><!-- /.row -->

<?php
echo form_hidden('partyno',$partyno);
echo form_hidden('caseid',$caseItem[0]->CaseID);
echo form_hidden('userid',$userid);
echo form_hidden('stepno',$stepno);
echo form_close();
?>
            <!-- End: Content -->  
</section>

        <!-- End: Content-Wrapper -->
  
  <script src="<?php echo base_url()."assets/js/lightbox.min.js"?>"></script>
 <?php echo $common_footer ?>       
        
        
