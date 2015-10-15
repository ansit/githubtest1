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
   <!-- <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
-->
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/skin/default_skin/css/theme.css">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/vendor/validate/validetta.min.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/css/jqvalidate/screen.css">-->

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
   <!--<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>-->
   
 
</head>

<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>

       <?php echo $right_panel; ?>
     
       
    <!-- Start: Content-Wrapper -->
<section id="content_wrapper">
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
   
    <?php /*error_reporting(0);*/?>
     <div id="content" class="animated fadeIn">
        <div class="row">
      
			
            <form id="frmaddrespon" class="form-horizontal" method="post" action="" enctype="multipart/form-data">

<!---========== Add test ==========================------------------------------------------->
				<div class="col-md-12"></div>
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span> Answer Module
							</span>
                        </div>
                        <div class="panel-body pn">
							<div class="col-md-12"> &nbsp; </div>
							<div class="errorLabelContainer"></div>
							

							<?php
							
							//var_dump($getques);
							$i = 0;
							foreach($getques as $getque):
							foreach($getque as $getqu){
							  if($getqu['side_auth']->side_authority == strval($getpartyno)){
								continue;
							  }
							  
								  $i++; 
							
							?>
							<div class="col-md-6">
								<div class="admin-form">
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Question <?php echo $i;?>:  </label>
									<div class="col-lg-8">
									<label class="gui-textarea"><?php echo $getqu['Question']?></label>
									<input  type="hidden" name="IDQuest[]" value="<?php echo $getqu['IDQuest']?>">
									<input  type="hidden" name="iDAlternativa[]" value="<?php echo $getqu['iDAlternativa']?>">
									<input type="hidden" name="option_list[]" value="<?php echo $getqu['option_list']?>"/>
									<input type="hidden" name="ta[]" value="<?php echo $getqu['t_a'] ?>">
									</div>
									</div>
								
									<div class="form-group">
									<label class="col-lg-4 control-label" for="inputStandard"> Respond Please: </label>
									<div class="col-lg-8">
									  <?php //echo $getqu['IDQuest']?>
									<br>
								  

								  
										<?php if($getqu['t_a'] == "Text"){?>
										  <input type="text" class="form-control" name="anstxt<?php echo $getqu['IDQuest']?>[]" value="<?php echo isset($filledans[$i-1]->anstxt)?$filledans[$i-1]->anstxt:"";?>"data-validetta="required" />
										<?php }elseif($getqu['t_a'] == "Radio"){
										  echo '<div class="radio-custom radio-primary">';
										  //echo '<select class="form-control" name=anstxt[]>';
										  $opt =  explode('@',$getqu['option_list']);
										  $j=0;
										foreach($opt as $opt):
										if($opt !== ''){
										  $j++;
										?>
										<input type="radio" id="rad<?php echo $getqu['IDQuest'].$j?>" name="ansrad<?php echo $getqu['IDQuest']?>" value="<?php echo $opt?>" <?php if(isset($filledans[$i-1]->anstxt)){ echo ($filledans[$i-1]->anstxt == $opt)?"checked":"";}?> data-validetta="required">
										<label for="rad<?php echo $getqu['IDQuest'].$j?>"><?php echo $opt?></label>
										<?php
										}
										endforeach;
										echo '</div>';
										}elseif($getqu['t_a'] == "Checkbox"){
										  $opt =  explode('@',$getqu['option_list']);
										  if(isset($filledans[$i-1]->anstxt)){
											$valarr = explode('@', $filledans[$i-1]->anstxt);
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
										  
											<input type="checkbox" id="ck<?php echo $getqu['IDQuest'].'q'.$k?>" class="chkgen" name="anschk<?=$getqu['IDQuest']?>[]" value="<?php echo $opt;?>"  <?php echo in_array($opt, $valarr)?"checked":"" ?> data-validetta="minChecked[1]">
											<label for="ck<?php echo $getqu['IDQuest'].'q'.$k?>"><?php echo $opt;?></label>
										<?php }endforeach;?>
										</span>
										<!--<label for=-->
										<?php }elseif($getqu['t_a'] == "file"){?>
											<!--<input  class="form-control" type="file" name="file<?php echo $getqu['IDQuest']?>"> -->
											<label class="field prepend-icon append-button file">
											  <span class="button btn-primary">Choose File</span>
											  <input type="file" class="gui-file" name="file<?php echo $getqu['IDQuest']?>" id="file<?php echo $getqu['IDQuest']?>" onchange="document.getElementById('uploader<?php echo $getqu['IDQuest']?>').value = this.value;">
											  <input type="text" class="gui-input" id="uploader<?php echo $getqu['IDQuest']?>" placeholder="Please Select A File">
											  <label class="field-icon">
												<i class="fa fa-upload"></i>
											  </label>
											</label>
											<?php if(isset($filledans[$i-1]->f_name)){ ?><label >
											<a href="<?php echo site_url('uploads/'.$filledans[$i-1]->f_name)?>" data-lightbox="image-<?php echo $i-1?>"><img src="<?php echo site_url('uploads/'.$filledans[$i-1]->f_name)?>" class="passport thumbnail" /></a>
											</label>
										<?php }}?>
									<!--data-validetta="required" data-vd-message-required="Please select a file to upload"-->
									</div>
									</div>
								</div>
							</div>
							<div class="col-md-6"></div>
								<div class="col-md-12"> <hr/> </div>
								

							<?php } endforeach;?>

							
							<div class="col-md-12"> <hr/> </div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard"> &nbsp; </label>
								<div class="col-lg-8">
								<button class="btn active btn-success" type="submit" name="submitresponse">
								<i class="fa fa-save"></i>  Submit </button>
								
								<a href="javascript:window.history.back()" class="btn active btn-warning">
								<i class="fa fa-warning"></i>
								Cancel
								</a>
								
								
								</div>	
								</div>
							</div><div class="col-md-6"></div>
						</div><!-- end col-md-12 -->	
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
    $('#role_name').multiselect();
	
	$("#frmaddrespon").validetta({
	   realTime : true,
	    display : 'inline',
        errorTemplateClass : 'validetta-inline'
	  });	
	
    });
	
    </script>
        <!-- End: Content-Wrapper -->
        
 <?php echo $common_footer ?>       
        
        
