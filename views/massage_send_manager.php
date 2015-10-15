<!DOCTYPE html>
<html>
    <!-- End: sidemenu -->
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Dashboard</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	

</head> 
    <!-- Start: Content-Wrapper -->
<body class="dashboard-page sb-l-o sb-r-c">
	 <!-- Start: Main -->
    <div id="main">

       <?php echo $common_header;?>
       <?php echo $right_panel;?>	
<section id="content_wrapper"
	<!-- Start: Topbar -->
	<header id="topbar">
		<div class="topbar-left">
			<ol class="breadcrumb">
				<li class="crumb-active">
					<a href="<?php echo base_url(); ?>user/massage_send_manager/<?php echo $managerid; ?>"> Conversation </a>
				</li>
			</ol>
		</div>
	</header>
	<!-- End: Topbar -->

    <!-- Begin: Content -->
    <div id="content" class="animated fadeIn">
        <div class="row">
			

<!---========== Add Documents ==========================------------------------------------------->
				<div class="col-md-12">
                    <div class="panel" id="spy4">
                        <div class="panel-headingcolor">
                            <span class="panel-title">
                               <i class="fa fa-comments"></i> Conversation
							</span>
                        </div>
                        <div class="panel-body pn" style="min-height:880px;">
							<div class="col-md-12"> &nbsp; </div>
							
							
						
		<!--###### Conversatiuon #################################------------>	
		
		
	
					<div class="col-md-10">		<br/>									
					<div class="row-fluid"><div class="span8" style="margin-left:120px;">	<link href="<?=$this->config->base_url()?>media/assets/css/style_chat.css" rel="stylesheet" type="text/css"/>
                         
						 <div class="portlet">
						<div class="panel-headingcolor">
							<div class="caption">
								
							</div>
							
						</div>
						<div class="portlet-body" id="chats">
							<div>
							<div class="megachat"  style="height: 200px; overflow: auto;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats">
								<?php foreach($list as $view):
								if($view->TYPE==2){
									$align="out";
									
								}else{
									$align="in";
								}
								?>
									<li class="<?php echo $align?>">
										<img class="avatar img-responsive" alt="" src="<?php echo base_url(); ?>media/profile_img/manager/audi.jpg">
										<div class="message">
											<span class="arrow">
											</span>
											<span  class="name"> <?php echo $view->RESPONCE;?> </span>
											<span class="datetime">
												 <?php echo $view->DATE;?> <?php echo $view->TIME;?>
											</span>
											<span class="body">
											<?php echo $view->DISCUSSION;?>
											</span>
										</div>
									</li>
								<?php endforeach;?>	
								</ul>
							</div>
							</div>
							<?php $attributes = array('id'=>'setchatmessage');
							echo form_open('user/sendmessageuser/'.$managerid,$attributes);?>
							<div class="chat-form">
								<div class="input-cont">
									<input class="form-control" id="chatdis" name="DISCUSSION" placeholder="Type a message here..." type="text" style="height:35px;">
								</div>
								<div class="btn-cont" style="width:80px;" >
									
									<input type="submit" style="height:35px;" name="save_discuuss" class="btn btn-system btn-small"  value="Send" >
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>	
							
                        </div>
                    </div>
                    </div>
                </div><!-- end col-md-12 -->
<!---==========  Documents List ==========================------------------------------------------->			
				

			     
        </div>
	</div>
            <!-- End: Content -->  
</section>
<script>
   var managerid = <?php echo $managerid?>;
   var userid = <?php echo $userid?>;
   
setInterval(function(){
   var lastid = $('.chats li:last-child').data('msgid');
   retrivechat(managerid,userid,lastid,2);
},1000);
</script>
<?php echo $common_footer ?>   