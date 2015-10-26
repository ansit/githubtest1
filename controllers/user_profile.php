<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_profile extends CI_Controller {
	
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

     }

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = array();	
		$data['user_data'] = $this->user_model->get_user($session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('user_profile',$data);
		
		
	}
	
	 
		
	  public function update_profile($id)
		  {
			 	$this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('FirstName','First Name','required|xss_clean');
			  $this->form_validation->set_rules('LastName','Last Name','required|xss_clean');
			  $this->form_validation->set_rules('Position','Position','required|xss_clean');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean');
			  $this->form_validation->set_rules('City','City','required|xss_clean');
			  $this->form_validation->set_rules('State','State','required|xss_clean');
			  $this->form_validation->set_rules('Zip','Zip','required|xss_clean|max_length[6]');
			  if($this->input->post('email_id')=='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			     $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			   }
			   elseif($this->input->post('email_id')!='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			      $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			   }
			  $this->form_validation->set_rules('Password','Password','required|xss_clean');
			  $this->form_validation->set_rules('HowDidYouHearAboutUs','How Did You Hear About Us','required|xss_clean');
			  
			  if($this->form_validation->run()==false)
			  {
					$session_data = $this->session->userdata('logged_in');
					$data = array();	
					$data['user_data'] = $this->user_model->get_user($session_data['UserID']);
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('user_profile',$data);
				
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
				$user_info['PhoneNumber']             = strip_tags($this->input->post('PhoneNumber'));
				$user_info['Firm_CompanySize']        = strip_tags($this->input->post('Firm_CompanySize'));
				$user_info['HowDidYouHearAboutUs']    = strip_tags($this->input->post('HowDidYouHearAboutUs'));
				$user_info['UpdatedBy']               = $uid;
				$this->register_model->edit_user($user_info,$id);
				
				if($this->input->post('Position')=='company' && $this->input->post('old_postion')=='company' )
				{
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
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
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
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
					$lawfirm_info['AreYouAnAttorney']           =strip_tags( $this->input->post('AreYouAnAttorneylaw'));
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
					$this->register_model->add_lawfirm($lawfirm_info);
					
				}
				
				if($this->input->post('Position')=='law_firm' && $this->input->post('old_postion')=='law_firm' )
				{
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorneylaw'));
					if($this->input->post('otherval_law'))
					{
					 $lawfirm_info['other_practiceArea'] = $this->input->post('otherval_law');             
					}
					if(count($this->input->post('terms'))>0)
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
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
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
					$lawfirm_info['AreYouAnAttorney']           = $this->input->post('AreYouAnAttorneylaw');
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
					$this->register_model->add_lawfirm($lawfirm_info);
					
				}
				
					$this->session->set_flashdata('msg', ' Successfully Update');
					redirect('user_profile');
		     }
		  }
		  
		   //  This function is checking Email Id already Exits for Not .. ( Callback function )
		 
			public function exist_email()
			{
				$emailId=$this->input->post('Email');	
				$result = $this->register_model->exist_email($emailId);
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
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */