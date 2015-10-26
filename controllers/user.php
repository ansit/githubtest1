<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		
		$this->load->library('imagic_resize');
		$this->load->model('user_model');	
		$this->load->model('register_model');
		$this->load->model('notification_model');
		$this->load->model('case_model');
		//error_reporting(0);
     }

	public function index()
	{
		$this->user_model->roleaccess();
		$data = array();	
		$user_list = $this->user_model->get_user_list();
		$data['user_list'] = $user_list;
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('user',$data);
	}
	
		 public function addUser($caseid="",$party="")
		 {
			$this->user_model->roleaccess();
			if($caseid =="" && $party == ""){
					$data = array();
					$user_data['FirstName']               = '';
					$user_data['LastName']                = '';
					$user_data['Position']                = '';
					$user_data['Address']                 = '';
					$user_data['City']                    = '';
					$user_data['State']                   = '';
					$user_data['Zip']                     = '';
					$user_data['Email']                   = '';
					$user_data['Password']                = '';
					$user_data['PhoneNumber']             = '';
					$user_data['Firm_CompanySize']        = '';
					$user_data['HowDidYouHearAboutUs']    = '';
					$user_data['CompanyName']             = '';
					$user_data['CompanySize']             = '';
					$user_data['AreYouAnAttorney']        = '';
					$user_data['FirmName']                = '';
					$user_data['FirmSize']                = '';
					$user_data['AreYouAnAttorney']        = '';
					$data['user_data'] = $user_data;
					$data['title'] = 'Add User';
					$data['heading'] = 'Add User';
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('addUser',$data);
				}else{
					$casedata = $this->case_model->getunregisterpartydata($caseid,$party);
					$user_data['FirstName']               = $casedata->name;
					$user_data['LastName']                = '';
					$user_data['Position']                = '';
					$user_data['Address']                 = $casedata->address;
					$user_data['City']                    = '';
					$user_data['State']                   = '';
					$user_data['Zip']                     = '';
					$user_data['Email']                   = $casedata->email;
					$user_data['Password']                = '';
					$user_data['PhoneNumber']             = $casedata->phone;
					$user_data['HowDidYouHearAboutUs']    = '';
					$user_data['CompanyName']             = '';
					$user_data['CompanySize']             = '';
					$user_data['AreYouAnAttorney']        = '';
					$user_data['FirmName']                = '';
					$user_data['FirmSize']                = '';
					$user_data['Firm_CompanySize']        = '';
					$user_data['AreYouAnAttorney']        = '';
					$user_data['defentuser']              = $casedata->CaseID;
					$data['user_data'] = $user_data;
					$data['title'] = 'Add User';
					$data['heading'] = 'Add User';
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('addUser',$data);					
				}
			
			
	     }
		 
		public function editUser($id='') {
				$data = array();
				$user_data = $this->user_model->get_user($id);
				$data['user_data'] = $user_data;
				$data['title'] = 'Edit User';
				$data['heading'] = 'Edit User';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('editUser',$data);
			
	    }
		
		public function add_user()
		{
			  $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('FirstName','First Name','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('LastName','Last Name','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Position','Position','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('City','City','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('State','State','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Zip','Zip','required|xss_clean|max_length[5]');
			  $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			  $this->form_validation->set_rules('Password','Password','required|xss_clean');
			   $this->form_validation->set_rules('conPassword','Conform Password','required|xss_clean|callback_check_conform_password');
			  $this->form_validation->set_rules('PhoneNumber','Phone Number','required|xss_clean|numeric|max_length[10]');
			  
			  if($this->form_validation->run()==false)
			  {
				$data = array();
				$user_data['FirstName']               = $this->input->post('FirstName');
				$user_data['LastName']                = $this->input->post('LastName');
				$user_data['Position']                = $this->input->post('Position');
				$user_data['Address']                 = $this->input->post('Address');
				$user_data['City']                    = $this->input->post('City');
				$user_data['State']                   = $this->input->post('State');
				$user_data['Zip']                     = $this->input->post('Zip');
				$user_data['Email']                   = $this->input->post('Email');
				$user_data['Password']                = $this->input->post('Password');
				$user_data['PhoneNumber']             = $this->input->post('PhoneNumber');
				$user_data['Firm_CompanySize']        = $this->input->post('Firm_CompanySize');
				$user_data['HowDidYouHearAboutUs']    = strip_tags($this->input->post('HowDidYouHearAboutUs'));
				$user_data['CompanyName']             = strip_tags($this->input->post('CompanyName'));
				$user_data['CompanySize']             = strip_tags($this->input->post('CompanySize'));
				$user_data['AreYouAnAttorney']        = strip_tags($this->input->post('AreYouAnAttorney'));
				$user_data['FirmName']                = strip_tags($this->input->post('FirmName'));
				$user_data['FirmSize']                = strip_tags($this->input->post('FirmSize'));
				$user_data['AreYouAnAttorney']        = strip_tags($this->input->post('AreYouAnAttorney'));
				$data['user_data'] = $user_data;
				$data['title'] = 'Add User';
				$data['heading'] = 'Add User';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('addUser',$data);
			
			  }
			  else
			  {
			 	$session_data= $this->session->userdata('logged_in');
				$uid = $session_data['UserID'];
				$now = date('Y-m-d');
				$lawfirm_info = array();
				$company_info = array();
				$inserted_id ='';
				$user_info = array();
				$session_data = array();
				$user_info['FirstName']               = strip_tags($this->input->post('FirstName'));
				$user_info['LastName']                = strip_tags($this->input->post('LastName'));
				if($this->input->post('Position')=='')
				{
					$user_info['Position']                = 'individual';
				}
				else
				{
				   $user_info['Position']                = $this->input->post('Position');
				}
				$user_info['Address']                 = strip_tags($this->input->post('Address'));
				$user_info['City']                    = strip_tags($this->input->post('City'));
				$user_info['State']                   = strip_tags($this->input->post('State'));
				$user_info['Zip']                     = strip_tags($this->input->post('Zip'));
				$user_info['Email']                   = $this->input->post('Email');
				$user_info['Password']                = $this->input->post('Password');
				$user_info['PhoneNumber']             = $this->input->post('PhoneNumber');
				$user_info['Firm_CompanySize']        = strip_tags($this->input->post('Firm_CompanySize'));
				$user_info['HowDidYouHearAboutUs']    = strip_tags($this->input->post('HowDidYouHearAboutUs'));
				$user_info['User_type']               = '3';
				$user_info['IsActive']                = '1';
				$user_info['UserJoinedDate']          = $now;
				$user_info['CreatedBy']               = $uid;
				$user_info['UpdatedBy']               = $uid;
				$session_data= $this->session->userdata('logged_in');
				$inserted_id = $this->register_model->add_user($user_info);
				if($this->input->post('Position')=='company')
				{
					$company_info['UserID']                     = $inserted_id;
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('otherval_company'))
					{
					 $company_info['other_ind_type'] = strip_tags($this->input->post('otherval_company'));             
					}
					if($this->input->post('terms2'))
					{
					  $company_info['IndustryType']             = implode(',',$this->input->post('terms2'));
					}
					$company_info['CreatedDate']                = $now;
					$company_info['UpdatedDate']                = $now;
					$company_info['IsActive']                   = '1';
					$company_info['CreatedBy']                   = $uid;
					$company_info['UpdatedBy']                   = $uid;
				}
				if($this->input->post('Position')=='law_firm')
				{
					$lawfirm_info['UserID']                     = $inserted_id;
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('otherval_law'))
					{
					 $lawfirm_info['other_practiceArea'] = $this->input->post('otherval_law');             
					}
					if(count($this->input->post('terms'))>0)
					{
					   $law_terms = $this->input->post('terms');
					   $lawfirm_info['PracticeAreas']           = implode(',',$law_terms);
					}
					$lawfirm_info['CreatedDate']                = $now;
					$lawfirm_info['UpdatedDate']                = $now;
					$lawfirm_info['IsActive']                   = '1';
					$lawfirm_info['CreatedBy']                   = $uid;
					$lawfirm_info['UpdatedBy']                   = $uid;
					
				} 
		
			   if($inserted_id!='')
				{
					//added by sumit
					if($this->input->post('hidenval') == '1'){
					 $this->case_model->updfpspid($user_info['Email'],$inserted_id);
					$this->case_model->sendintromail($inserted_id);
					}
					
					$action = 1;
					$mname = $this->notification_model->getnamebyid($inserted_id);
					$comment = $session_data['FirstName'].' added a user '.$mname;
					$this->notification_model->addnotification($session_data['UserID'],1,$inserted_id,$session_data['User_type'],$action,$comment);					
					
					//ends here
					if(count($lawfirm_info)>0)
				   {
					 $this->register_model->add_lawfirm($lawfirm_info);
				   }
				  if(count($company_info)>0)
				  {
					 $this->register_model->add_company($company_info);
				  }
					
					$this->session->set_flashdata('msg', 'Registration successful');
					redirect('user');
				}
					
			  }
			
	     }
		 
		 
		 // edit user information
		  public function edit_user($id='')
		  {
			 	
			  $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('FirstName','First Name','required|xss_clean');
			  $this->form_validation->set_rules('LastName','Last Name','required|xss_clean');
			  $this->form_validation->set_rules('Position','Position','required|xss_clean');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean');
			  $this->form_validation->set_rules('City','City','required|xss_clean');
			  $this->form_validation->set_rules('State','State','required|xss_clean');
			  $this->form_validation->set_rules('Zip','Zip','required|xss_clean|max_length[5]');
			 if($this->input->post('email_id')=='' && $this->input->post('email_id')!= $this->input->post('Email'))
			 {
			     $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			 }
			 elseif($this->input->post('email_id')!='' && $this->input->post('email_id')!= $this->input->post('Email'))
			 {
			      $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			 }
			  $this->form_validation->set_rules('Password','Password','required|xss_clean');
			  $this->form_validation->set_rules('PhoneNumber','Phone Number','required|xss_clean|numeric|max_length[10]');
			  
			  if($this->form_validation->run()==false)
			  {
				$data = array();
				$user_data = $this->user_model->get_user($id);
				$data['user_data'] = $user_data;
				$data['title'] = 'Edit User';
				$data['heading'] = 'Edit User';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('editUser',$data);
			
			  }
			  else
			  {
				$session_data= $this->session->userdata('logged_in');
				$uid = $session_data['UserID'];
				$now = date('Y-m-d');
				$lawfirm_info = array();
				$company_info = array();
				$inserted_id ='';
				$user_info = array();
				$session_data = array();
				$user_info['FirstName']               = strip_tags($this->input->post('FirstName'));
				$user_info['LastName']                = strip_tags($this->input->post('LastName'));
				if($this->input->post('Position')=='')
				{
					$user_info['Position']                = 'individual';
				}
				else
				{
				   $user_info['Position']                = strip_tags($this->input->post('Position'));
				}
				$user_info['Address']                 = strip_tags($this->input->post('Address'));
				$user_info['City']                    = strip_tags($this->input->post('City'));
				$user_info['State']                   = strip_tags($this->input->post('State'));
				$user_info['Zip']                     = strip_tags($this->input->post('Zip'));
				$user_info['Email']                   = $this->input->post('Email');
				$user_info['Password']                = $this->input->post('Password');
				$user_info['PhoneNumber']             = $this->input->post('PhoneNumber');
				$user_info['Firm_CompanySize']        = strip_tags($this->input->post('Firm_CompanySize'));
				$user_info['HowDidYouHearAboutUs']    = strip_tags($this->input->post('HowDidYouHearAboutUs'));
				$user_info['UpdatedBy']               = $uid;
				$this->register_model->edit_user($user_info,$id);
				
				if($this->input->post('Position')=='company' && $this->input->post('old_postion')=='company' )
				{
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorneycom'));
					if($this->input->post('otherval_company'))
					{
					 $company_info['other_ind_type'] = $this->input->post('otherval_company');             
					}
					if($this->input->post('terms2'))
					{
					  $company_info['IndustryType']             = implode(',',$this->input->post('terms2'));
					}
					
					$company_info['UpdatedDate']                = $now;
					$company_info['UpdatedBy']                  = $uid;
					
					$this->register_model->update_user_company($company_info,$id);
				}
				
				if($this->input->post('Position')=='company' && $this->input->post('old_postion')=='law_firm' )
				{
					//delete old record
					$this->register_model->delet_user_law_firm($id);
					//
					$company_info['UserID']                     = $id;
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorneycom'));
					if($this->input->post('otherval_company'))
					{
					 $company_info['other_ind_type'] = $this->input->post('otherval_company');             
					}
					if($this->input->post('terms2'))
					{
					  $company_info['IndustryType']             = implode(',',$this->input->post('terms2'));
					}
					$company_info['CreatedDate']                = $now;
					$company_info['UpdatedDate']                = $now;
					$company_info['IsActive']                   = '1';
					$company_info['CreatedBy']                   = $uid;
					$company_info['UpdatedBy']                   = $uid;
					
					$this->register_model->add_company($company_info);
				}
				
				if($this->input->post('Position')=='law_firm' && $this->input->post('old_postion')=='company' )
				{
				  //delete old record
					$this->register_model->delet_user_company($id);
					//
					
					$lawfirm_info['UserID']                     = $id;
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('otherval_law'))
					{
					 $lawfirm_info['other_practiceArea'] = $this->input->post('otherval_law');             
					}
					if($this->input->post('terms'))
					{
					   $law_terms = $this->input->post('terms');
					   $lawfirm_info['PracticeAreas']           = implode(',',$law_terms);
					}
					$lawfirm_info['CreatedDate']                = $now;
					$lawfirm_info['UpdatedDate']                = $now;
					$lawfirm_info['IsActive']                   = '1';
					$lawfirm_info['CreatedBy']                   = $uid;
					$lawfirm_info['UpdatedBy']                   = $uid;
					$this->register_model->add_lawfirm($lawfirm_info);
					
				}
				
				if($this->input->post('Position')=='law_firm' && $this->input->post('old_postion')=='law_firm' )
				{
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('otherval_law'))
					{
					 $lawfirm_info['other_practiceArea'] = $this->input->post('otherval_law');             
					}
					if($this->input->post('terms'))
					{
					   $law_terms = $this->input->post('terms');
					   $lawfirm_info['PracticeAreas']           = implode(',',$law_terms);
					}
					
					$lawfirm_info['UpdatedDate']                = $now;
					$lawfirm_info['UpdatedBy']                   = $uid;
					
					$this->register_model->edit_lawfirm($lawfirm_info,$id);
					
				}
				
				if($this->input->post('Position')=='individual' && $this->input->post('old_postion')=='law_firm' )
				{
				   	$this->register_model->delet_user_law_firm($id);
				}
				if($this->input->post('Position')=='individual' && $this->input->post('old_postion')=='company' )
				{
				   $this->register_model->delet_user_company($id);
				}
				
				if($this->input->post('Position')=='company' && $this->input->post('old_postion')=='individual' )
				{
					
					$company_info['UserID']                     = $id;
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorneycom'));
					if($this->input->post('otherval_company'))
					{
					 $company_info['other_ind_type'] = $this->input->post('otherval_company');             
					}
					if($this->input->post('terms2'))
					{
					  $company_info['IndustryType']             = implode(',',$this->input->post('terms2'));
					}
					$company_info['CreatedDate']                = $now;
					$company_info['UpdatedDate']                = $now;
					$company_info['IsActive']                   = '1';
					$company_info['CreatedBy']                   = $uid;
					$company_info['UpdatedBy']                   = $uid;
					
					$this->register_model->add_company($company_info);
				}
				
				if($this->input->post('Position')=='law_firm' && $this->input->post('old_postion')=='individual' )
				{
					
					$lawfirm_info['UserID']                     = $id;
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('otherval_law'))
					{
					 $lawfirm_info['other_practiceArea'] = $this->input->post('otherval_law');             
					}
					if($this->input->post('terms'))
					{
					   $law_terms = $this->input->post('terms');
					   $lawfirm_info['PracticeAreas']           = implode(',',$law_terms);
					}
					$lawfirm_info['CreatedDate']                = $now;
					$lawfirm_info['UpdatedDate']                = $now;
					$lawfirm_info['IsActive']                   = '1';
					$lawfirm_info['CreatedBy']                   = $uid;
					$lawfirm_info['UpdatedBy']                   = $uid;
					$this->register_model->add_lawfirm($lawfirm_info);
					
				}
				
				$session_data= $this->session->userdata('logged_in');
					$action = 2;
					$mname = $this->notification_model->getnamebyid($id);
					$comment = $session_data['FirstName'].' update user '.$mname;
					$this->notification_model->addnotification($session_data['UserID'],2,$id,$session_data['User_type'],$action,$comment);
					
					$this->session->set_flashdata('msg', ' Successfully Update');
					
					$session_data = $this->session->userdata('logged_in');
					if($session_data['User_type']==1)
					{
					redirect('user');	
					}
					else {
						redirect('user/manager_user_list');	
					}
			  }
		     }
		 
		 
		 
		 
		 
		 
		 
		 
		 
		  function thumb($data)
		 {
				$config['image_library'] = 'gd2';
				$config['source_image'] =$data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 275;
				$config['height'] = 250;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
		}
		
		 public function delete_user()
		{
			$uid = $this->input->post('userid');
			 $result = $this->user_model->get_image_name($uid);
			 if($result->ProfilePic!='notfound')
			 {
				$dirPath = FILE_ROOT_PATH.'/media/profile_img/user/'.$result->ProfilePic;
	  		    unlink(realpath($dirPath));
			 }
			
			$result = $this->user_model->delete_user($uid);
			echo $result;
			exit;
			
	    }	
		 
		 //  This function is checking Email Id already Exits for Not .. ( Callback function )
		 
			public function exist_email()
			{
				$emailId=$this->input->post('Email');	
				$result=$this->register_model->exist_email($emailId);
				if($result=='')
				{
				return true;	
				}
				else
				{
				$this->form_validation->set_message('exist_email', 'Email Id Already Exits ! try another');
				return false;	
				}
				
			}
			
			 // This Function is checking Conform Password match with Password.  ( Callback function )
			
			public function check_conform_password()
			{
			    $password=$this->input->post('Password');
				$con_password=$this->input->post('conPassword');
				if($password != $con_password)
				{
					$this->form_validation->set_message('check_conform_password', 'Conform Password Not match');
				    return false;	
				}
				else
				{
				return true;	
				}	
			}
			// massage list user (Manager tab)...........
			public function message_list()
			{
				if ($this->session->userdata('logged_in'))
				    {
				      $session_data = $this->session->userdata('logged_in');
				    }
					//print_r($session_data);exit;
					
			$id=$session_data['UserID'];	
			$data = array();	
			$user_list = $this->user_model->get_user_list_manager($id);
			
			$aa = array();
			foreach($user_list as $user_list):
			$node = array();
			$node['UserID'] = $user_list['fp'][0]->UserID;
			$node['FirstName'] = $user_list['fp'][0]->FirstName;
			$node['Email'] = $user_list['fp'][0]->Email;
			$node['PhoneNumber'] = $user_list['fp'][0]->PhoneNumber;
			$node['Position'] = $user_list['fp'][0]->Position;
			array_push($aa,$node);
			endforeach;
			$data['user_list'] = array_map("unserialize", array_unique(array_map("serialize", $aa)));
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('massage_list',$data);
			}
			
			// message send manager to user.................
			public function massage($id=''){
				//if(isset($_POST['save_discuuss'])){
				//	$this->user_model->manager_send_message($id);
				//}
				$session_data = $this->session->userdata('logged_in');
				$data = array();
				$data['managerid'] = $session_data['UserID'];
				$data['userid'] = $id;
				$data['list'] = $this->user_model->get_message($id,$data['managerid']);
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('massage_manager',$data);
						
				
			}
			
			// send message to database
			public function setmessage($id){
				$this->user_model->manager_send_message($id);
			}
			
			
			public function getnewchat(){
				if($this->input->is_ajax_request()){
					$userid = $this->input->post('userid');
					$managerid = $this->input->post('managerid');
					$lastid = $this->input->post('lastid');
					$chats = $this->user_model->getnewmessage($managerid,$userid,$lastid);
					$json_respose = array();
					foreach($chats as $chat):
					$node = array();
					$node['msgid'] = $chat->MESSAGE_ID;
					$node['managerid'] = $chat->MANAGER_ID;
					$node['userid'] = $chat->USER_ID;
					$node['msg'] = $chat->DISCUSSION;
					$node['date'] = $chat->DATE;
					$node['time'] = $chat->TIME;
					$node['response'] = $chat->RESPONCE;
					$node['type'] = $chat->TYPE;
					array_push($json_respose,$node);
					endforeach;
					echo json_encode($json_respose);
				}
			}
			
			// message list manager (user tab)...........
			public function massage_list_manager()
			{
				$sesson_data = $this->session->userdata('logged_in');
				$UserID = $sesson_data['UserID'];
				$User_type = $sesson_data['User_type'];
			$data = array();	
			$user_list = $this->user_model->get_manager_list_user($UserID,$User_type);
			$data['user_list'] = $user_list;
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('massage_list_manager',$data);
			}
			
			// message send user to manager.................
			public function massage_send_manager($id=''){
				$session_data = $this->session->userdata('logged_in');
				$data = array();
				$data['managerid'] = $id; 
				$data['userid'] = $session_data['UserID'];
				$data['list'] = $this->user_model->get_message_user($id);
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('massage_send_manager',$data);
				
			}
			
			
			public function sendmessageuser($id=''){
				$this->user_model->user_send_message($id);
			}			
			
			
			/////----------03-10-2015 Randheer kumar ----
			
			public function manager_user_list($id='')
			{
				
					//print_r($session_data);exit;
					
				//$id=$session_data['UserID'];
				if($id==""){
					$session_data = $this->session->userdata('logged_in');
					$id = $session_data['UserID'];
				}
				$data = array();
				$data['managerid']=$id;
				//$data['$managerid']=$managerid;
				$data['user_list']  = $this->user_model->get_user_list_manager($id);
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('manager_user_list',$data);
			}
		 
		public function deleteuser($id='') {
				//$data = array();
				$user_data = $this->user_model->delete($id);
				$msg=" successfully deleted";
				$this->session->set_flashdata('msg',$msg);
				redirect('user');
			
	    }
			
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */