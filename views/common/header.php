 <!-- Start: Header -->
 <?php 
   $session_data = array();
 if ($this->session->userdata('logged_in'))
 {
	$session_data = $this->session->userdata('logged_in');
	
	
 }
	?>

<!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/core.js"></script>
	
	<header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
            <?php if($session_data['User_type']==1){?>
                <a class="navbar-brand" href="<?php echo base_url()?>admin_dashboard"> <b>CaseManagement</b>app</a>
            <?php }?>
            <?php if($session_data['User_type']==2){?>
                <a class="navbar-brand" href="<?php echo base_url()?>manager_dashboard"><b>CaseManagement</b>app</a>
            <?php }?>
             <?php if($session_data['User_type']==3){?>
                <a class="navbar-brand" href="<?php echo base_url()?>user_dashboard"><b>CaseManagement</b>app</a>
            <?php }?>
            </div>
			<span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines pull-left"></span>
			<ul class="nav navbar-nav pull-right hidden">
				<li>
					<a href="#" class="sidebar-menu-toggle">
						<span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
					</a>
				</li>
			</ul>
			
			
            <ul class="nav navbar-nav navbar-left">
               
                <li>
                    <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
                </li>
                <li class="dropdown hidden">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicons glyphicons-settings fs14"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-times-circle-o pr5 text-primary"></span> Reset LocalStorage </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-slideshare pr5 text-info"></span> Force Global Logout </a>
                        </li>
                        <li class="divider mv5"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-tasks pr5 text-danger"></span> Run Cron Job </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-wrench pr5 text-warning"></span> Maintenance Mode </a>
                        </li>
                    </ul>
                </li>
                <li class="hidden-xs">
                    <a class="request-fullscreen toggle-active" href="#">
                        <span class="octicon octicon-screen-full fs18"></span>
                    </a>
                </li>
            </ul>
        
            <ul class="nav navbar-nav navbar-right">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <!--<img src="<?php echo base_url(); ?>media/assets/img/avatars/2.jpg" alt="avatar" class="mw30 br64 mr15">-->
                        <span><?php echo ucfirst($session_data['FirstName'])?></span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        
                        <li class="br-t of-h">
							<?php if($session_data['User_type']==1){?>
                            <a href="<?php echo base_url()?>admin_profile" class="fw600 p12 animated animated-short fadeInDown"><span class="fa fa-gear pr5"></span> My Profile </a>
                            <?php }?>
                            <?php if($session_data['User_type']==2){?>
                            <a href="<?php echo base_url()?>manager/manager_profile" class="fw600 p12 animated animated-short fadeInDown"><span class="fa fa-gear pr5"></span> My Profile </a>   
                            <?php }?>
                            <?php if($session_data['User_type']==3){?>
                            <a href="<?php echo base_url()?>user_profile" class="fw600 p12 animated animated-short fadeInDown"><span class="fa fa-gear pr5"></span> My Profile </a> 
                            <?php }?>
                        
                        </li>
                        <li class="br-t of-h">
                            <a href="<?php echo base_url(); ?>logout" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </header>
        <!-- End: Header -->
        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">

                <!-- Start: Sidebar Header -->
                <header class="sidebar-header">
                    <div class="user-menu">
                        <div class="row text-center mbn">
                            <div class="col-xs-4">
                                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                    <span class="glyphicons glyphicons-home"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                                    <span class="glyphicons glyphicons-inbox"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                                    <span class="glyphicons glyphicons-bell"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                                    <span class="glyphicons glyphicons-imac"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicons glyphicons-settings"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                                    <span class="glyphicons glyphicons-restart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- End: Sidebar Header -->
