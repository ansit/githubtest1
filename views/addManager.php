<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
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
    
     <link href='<?php echo base_url(); ?>media/alertify/themes/alertify.core.css' rel='stylesheet' type='text/css' />
	<link href='<?php echo base_url(); ?>media/alertify/themes/alertify.default.css' rel='stylesheet' type='text/css' id="toggleCSS" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
     <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery-1.10.2.js"></script>
	 
	<script type="text/javascript">
    function showimagepreview(input) {
    if (input.files && input.files[0]) {
    var filerdr = new FileReader();
    filerdr.onload = function(e) {
    $('#imgprvw').attr('src', e.target.result);
    }
    filerdr.readAsDataURL(input.files[0]);
    }
    }
    </script>
	<script type="text/javascript">
  $(function() {
     $('#profile_img').change(function (){
       var ext = $(this).val().split('.').pop().toLowerCase();
	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		   $('.file-message').html("Upload only image");
		   return false;
		}else{
		 $('.file-message').html("");
		}
     });
  });
</script>
	
	
	<script>

  $(function() {
     $('#file1').change(function (){
       var ext = $(this).val().split('.').pop().toLowerCase();
	   if($.inArray(ext, ['doc','txt','pdf','docx','odt']) == -1) {
		   $('.newfile-message').html("Upload only Document File");
		   return false;
		}else{
		 $('.newfile-message').html("");
		}
     });
  });

</script>
	
	
	<script>
function Email_exists(Email) {
			
			var oldemail = $('input[name="oldemail"]').val();
			if (oldemail == Email) {
			 return false;
			}
			
			data = {Email : Email};
			//alert(Email);
			//console.log(data);
			$.ajax({
			url: "<?php echo base_url(); ?>manager/email_exists",
			type: 'POST',
            data: data, 
            success:function(r)
            {
			  //console.log(r);
		    if (r == 1)
			{
			 	alertify.error("This Email already Registered ! Try another");
			 //alert('Your Email already exist ! please Try another');
			   
			 }
            }
        });
   
        
    }
</script>

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
				 <?php if($manager_data!=''){ ?>
					<a href="<?php echo base_url(); ?>manager/editManager/<?php echo $manager_data[0]->UserID;?>">Edit Manager</a>
					<?php } else { ?>
					<a href="<?php echo base_url(); ?>manager/addManager">Add Manager</a>
					<?php } ?>
				</li>
			</ol>
		</div>
	</header>
	 
    <?php //print_r($manager_data) ?>
    
      
     <?php if($manager_data!=''){ 
		$FirstName = $manager_data[0]->FirstName;
  	    $Address = $manager_data[0]->Address;
		$Email = $manager_data[0]->Email;
		$Password = $manager_data[0]->Password;
		$PhoneNumber = $manager_data[0]->PhoneNumber;
		$biography = $manager_data[0]->biography;
		$areasofexpertise = $manager_data[0]->areasofexpertise;
		$ProfilePic = $manager_data[0]->ProfilePic;
		$manager_id = $manager_data[0]->UserID;
		$upload_cv = $manager_data[0]->upload_cv;
		
    ?>
	 <?php } else { 
	    $FirstName = '';
		$Address = '';
		$Email = '';
		$Password = '';
		$PhoneNumber = '';
		$areasofexpertise = '';
		$biography = '';
		$ProfilePic ='';
		$manager_id ='';
		$upload_cv='';
	 
	 ?>
      <?php } ?>
    
  
    <div id="content" class="animated fadeIn">
        <div class="row"><?php $attributes=array('name'=>"form1");?>
             <?php if($manager_data!=''){ ?>
             <?php echo form_open_multipart( 'manager/add_edit_Manager/'.$manager_data[0]->UserID,$attributes);?>
			 <?php } else { ?>
             <?php echo form_open_multipart( 'manager/add_edit_Manager',$attributes);?>
             <?php } ?>
              <?php if(validation_errors())
				  {?>
                 
                        <div class="alert alert-danger alert-dismissable"><?php echo validation_errors() ?></div>
                    
            <?php } ?> 
            
            <?php if($this->session->flashdata('msg'))
			{ ?> 
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                       <?php echo $this->session->flashdata('msg'); ?>
                        </div>
      <?php } ?>
                
				<div class="col-md-2"> <br/> 
				<div class="fileupload fileupload-new admin-form" data-provides="fileupload">
				<div class="fileupload-preview thumbnail mb15">
				 <?php if($ProfilePic == ""){$ProfilePic="images/noimage.jpg";}?>
				<img alt="100x147" style="height: 147px; width:100%;" id="imgprvw" src="<?php echo base_url(); ?>/media/profile_img/manager/<?php echo $ProfilePic?>">
				</div>
				<span class="button btn-system btn-file btn-block ph5">
				<span class="fileupload-new">Upload File</span>
				<input type="file" name="profile_img" id="profile_img" onChange="showimagepreview(this)">
				
                <input type="hidden" name="old_profile_img" id="old_profile_img" value="<?php echo $ProfilePic ?>">
				</span>
				</div>
				 <strong class="file-message"></strong>
				</div>
                <div class="col-md-5 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Name:</label>
								<div class="col-lg-8">
								 <?php $name =  isset($manager_data[0])?$manager_data[0]->FirstName:'' ;?>
								<input  name="Name" id="Name"  value="<?php echo set_value('Name', $name); ?>" class="form-control Name" type="text">
								</div>
								</div>
                                 <div class="form-group">
								<label class="col-lg-4 control-label">Address :</label>
								<div class="col-lg-8">
								 <textarea name="Address"  class="form-control Address"><?php echo set_value('Address', isset($Address)?$Address:'');?></textarea>
								</div>
								</div>
                                <div class="form-group">
								<label class="col-lg-4 control-label">Phone no. :</label>
								<div class="col-lg-7 input-group">
								 <span class="input-group-addon" id="basic-addon1">+1</span>
							   <input   name="Phone" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'');" onblur="validatePhone(this);"  maxlength='10' value="<?php echo set_value('Phone', isset($PhoneNumber)?$PhoneNumber:'');?>" class="form-control Phone" aria-describedby="sizing-addon1">
								</div>
								</div>
                                 <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Email :</label>
								<div class="col-lg-8">
							    <input name="Email" id="email_exists" onblur="Email_exists(this.value)" value="<?php echo set_value('Email',isset($Email)?$Email:'');?>"  class="form-control Email" type="text">
								<?php echo form_hidden('oldemail',$Email); ?>
								</div>
								</div> 
                            </div><br/> <br/><br/>
                        </div>
                    </div>
                </div> <!--close col-sm-6-->
				
				<div class="col-md-5 form-horizontal">
					<div class="panel panel-primary panel-border top mt20 mb35">
                        <div class="panel-body bg-light dark">
                            <div class="admin-form">
								
								
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Biography :</label>
								<div class="col-lg-8">
                                <textarea name="Biography" class="form-control Biography"><?php echo set_value('Biography',isset($biography)?$biography:'')?></textarea>
							   
								</div>
								</div> 
                                
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Areas of expertise  :</label>
								<div class="col-lg-8">
							    <input id="state" name="Areasofexpertise" value="<?php echo set_value('Areasofexpertise', isset($areasofexpertise)?$areasofexpertise:'');?>" class="form-control Areasofexpertise" type="text" >
								</div>
								</div>   
                                
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard">Password :</label>
								<div class="col-lg-8">
							    <input name="Passsword" value="<?php echo $Password?>" class="form-control Passsword" type="password">
								</div>
								</div> 
                            
                                <div class="form-group">
								<label class="col-lg-4 control-label" for="inputStandard"> CV/resume  :</label>
								<div class="col-lg-8">
								<div class="section">
								<label class="field prepend-icon append-button file">
								<span class="button btn-primary">Choose File</span>
								<input id="file1" name="file1" class="gui-file" type="file" onchange="document.getElementById('uploader1').value = this.value;">
								<input id="uploader1" class="gui-input" type="text" placeholder="Please Select A File" name="Cv">
                                 <input type="hidden" name="old_cv" id="old_cv" value="<?php echo $upload_cv ?>">
								 <?php echo $upload_cv ?>
								 <strong class="newfile-message"></strong>
								<label class="field-icon">
								<i class="fa fa-upload"></i>
								</label>
								</label>
								<?php 
								if(!empty($upload_cv)){
								$ext = pathinfo($upload_cv, PATHINFO_EXTENSION);
								
								 if($ext == 'pdf'){
								   $icon = '<i class="fa fa-file-pdf-o fa-5x"></i>';
								 }else{
								   $icon =  '<i class="fa fa-file-text-o fa-5x"></i>';
								 }
								 
								 echo '<a href="'.base_url().'media/profile_img/manager/manager_cv/'.$upload_cv.'" target="_blank">'.$icon.'</a>';
								}
								?>
								
								
								</div>
								</div>  
								</div>  
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12" align="center">
                 <input type="hidden" value="<?php echo $manager_id?>" name="manager_id"> 
                 <input type="hidden" value="<?php echo  $Email?>" name="email_id"> 
                
				 <?php if($manager_data!=''){ ?>
					<button class="btn active btn-success btnmanager" name="btnmanager" type="submit"> <i class="fa fa-refresh"></i>  Update</button>
                 <?php } else { ?>
                 <button class="btn active btn-success btnmanager" name="btnmanager"  type="submit"> <i class="fa fa-save"></i>  Add Manager</button>
                  <?php } ?>
				<!--<button class="btn active btn-system " type="reset" onclick="return confirm('Are you sure want to Reset ?')"> <i class="fa fa-refresh"></i>  Reset</button>-->
				<button class="btn active btn-warning " type="button" onclick="window.location='<?php echo base_url(); ?>manager'"> 
         		<i class="fa fa-warning"></i> Cancel </button>
                
				</div>	
					
			<?php echo form_close();?>     
        </div>
	</div>
   
</section>
   
 <?php echo $common_footer ?>       
        
        
	<script src="<?php echo base_url(); ?>media/alertify/lib/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url(); ?>media/alertify/lib/alertify.min.js"></script>
	<script src="<?php echo base_url(); ?>media/alertify/alertifyjs.js"></script>
	
	<script>
	 
 function validatePhone(Phonefield)
 {
   var f=document.form1;
   if (f.Phone.value == "")
  {
  // alertify.error("Phone number is required");
  // f.Phone.value = "";
  // f.Phone.focus();
  // return false;
  }
   else if (isNaN(f.Phone.value))
  {
   alertify.error("Enter only Numeric Value In phone number.");
   f.Phone.value = "";
   f.Phone.focus();
   return false;
  }
  else if (!(f.Phone.value.length == 10))
  {
   alertify.error("Please enter 10 digit phone number");
  
   f.Phone.focus();
   return false;
  }

}
	 
	</script>