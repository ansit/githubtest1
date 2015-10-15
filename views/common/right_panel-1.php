 <?php 
    $session_data = array();
 if ($this->session->userdata('logged_in'))
 {
	$session_data = $this->session->userdata('logged_in');
	
 }
	?>
 <!-- sidebar menu -->
                <ul class="nav sidebar-menu">
                <?php if($session_data['User_type']==1){?>
					
					<li class="sidebar-label pt15"> Administrator Module </li>
					<li class="active">
                        <a href="<?php echo base_url(); ?>notification">
                            <span class="glyphicon glyphicon-globe"></span>
                            <span class="sidebar-title">Notification</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin_dashboard">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url(); ?>admin_profile">
                            <span class="glyphicons glyphicons-user"></span>
                            <span class="sidebar-title"> My Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>manager">
                            <span class="glyphicons glyphicons-group"></span>
                            <span class="sidebar-title"> Conversations  </span>
                        </a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url(); ?>user">
                            <span class="glyphicons glyphicons-parents"></span>
                            <span class="sidebar-title"> User </span>
                        </a>
                    </li>
					
					<li>
                        <a  href="<?php echo base_url();?>case_management">
                            <span class="glyphicons glyphicons-log_book"></span>
                            <span class="sidebar-title"> Case </span>
                        </a>
                    </li>
					
					<li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-adress_book"></span>
                            <span class="sidebar-title"> Case Sequence </span>
                        	<span class="caret"></span>
                        </a>
						<ul class="nav sub-nav">
                            <li>
                                <a href="<?php echo base_url();?>case_sequence">
                                    <span class="glyphicons glyphicons-book"></span> Dynamic Form  </a>
                            </li>
                           <!-- <li>
                                <a href="#">
                                    <span class="glyphicons glyphicons-show_big_thumbnails"></span> Information Module   </a>
                            </li>-->
                            <li>
                                <a href="#">
                                    <span class="glyphicons glyphicons-sampler"></span> Report </a>
                            </li>
                        </ul>
						
                    </li>
					<li>
						<a href="<?php echo base_url();?>assign_cases_sequence">
							<span class="glyphicons glyphicons-sampler"></span> Assign Case sequence </a>
					</li>
                    <?php }?>
<!---******************************* Managers Module ****************************---->
                    <?php if($session_data['User_type']==2){?>
                    <li class="sidebar-label pt20"> Manager Module</li>
					
					<li class="active">
                        <a href="<?php echo base_url();?>manager_dashboard/manager_user">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    
                    <li>
                        <a  href="<?php echo base_url();?>manager/manager_profile">
                            <span class="glyphicons glyphicons-fire"></span>
                            <span class="sidebar-title"> My Profile </span>
                        </a>
                    </li>
                  
					<li>
                        <a href="<?php echo base_url(); ?>user/manager_user_list">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> User </span>
                        </a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url();?>assign_cases">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> Case </span>
                        </a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url();?>user/massage_list">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> Conversations   </span>
                        </a>
                    </li>
					
					<li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> Payment  </span>
                        </a>
                    </li>
               <?php }?>
	<!---******************************* User Module ****************************---->
              <?php if($session_data['User_type']==3){?>
					<li class="sidebar-label pt20"> User Module </li>
					
					<li class="active">
                        <a href="<?php echo base_url();?>user_dashboard">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url();?>cases">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> Case </span>
                        </a>
                    </li>
					
					<li>
                        <a href="<?php echo base_url();?>user/massage_list_manager">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title"> Conversations  </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url();?>user_profile">
                            <span class="glyphicons glyphicons-fire"></span>
                            <span class="sidebar-title"> My Profile </span>
                        </a>
                    </li>
     
					
				    <?php } ?> 
					
                </ul>
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>
        </aside>
    <!-- End: sidemenu -->