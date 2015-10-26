<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		$this->load->library('imagic_resize');
		$this->load->model('register_model');	
		
		

     }

	public function index()
	{
		 $this->load->library('form_validation');
		$data = array();	
		//$user_list = $this->user_model->get_user_list();
		//$data['user_list'] = $user_list;
		$data['user_info'] = '';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('user_register',$data);
		
		
	}
	
		 
		 
		  public function register_user()
		  {
			  $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('FirstName','First Name','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('LastName','Last Name','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Position','Position','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('City','City','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('State','State','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Zip','Zip','required|xss_clean|max_length[6]');
			  $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_email|callback_exist_email');
			  $this->form_validation->set_rules('Password','Password','required|xss_clean');
			   $this->form_validation->set_rules('conPassword','Conform Password','required|xss_clean|callback_check_conform_password');
			  $this->form_validation->set_rules('PhoneNumber','Phone Number','required|xss_clean|numeric|max_length[10]');
			  
			  if($this->form_validation->run()==false)
			  {
				$data = array();
				$user_info = array();
				
				$user_info['FirstName']               = $this->input->post('FirstName');
				$user_info['LastName']                = $this->input->post('LastName');
				$user_info['Address']                 = $this->input->post('Address');
				$user_info['City']                    = $this->input->post('City');
				$user_info['State']                   = $this->input->post('State');
				$user_info['Zip']                     = $this->input->post('Zip');
				$user_info['Email']                   = $this->input->post('Email');
				$user_info['Password']                = $this->input->post('Password');
				$user_info['PhoneNumber']             = $this->input->post('PhoneNumber');
				$user_info['Firm_CompanySize']        = $this->input->post('Firm_CompanySize');
				$user_info['HowDidYouHearAboutUs']    = $this->input->post('HowDidYouHearAboutUs');
				$user_info['CompanyName']                = $this->input->post('CompanyName');
				$user_info['CompanySize']                = $this->input->post('CompanySize');
				$user_info['AreYouAnAttorney']           = $this->input->post('AreYouAnAttorney');
				$user_info['FirmName']                   = $this->input->post('FirmName');
				$user_info['FirmSize']                   = $this->input->post('FirmSize');
				$user_info['AreYouAnAttorney']           = $this->input->post('AreYouAnAttorney');
				$data['user_info'] = $user_info;	
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('user_register',$data);
			  }
			  else
			  {
			
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
				$user_info['Email']                   = strip_tags($this->input->post('Email'));
				$user_info['Password']                = $this->input->post('Password');
				$user_info['PhoneNumber']             = $this->input->post('PhoneNumber');
				$user_info['Firm_CompanySize']        = $this->input->post('Firm_CompanySize');
				$user_info['HowDidYouHearAboutUs']    = strip_tags($this->input->post('HowDidYouHearAboutUs'));
				$user_info['User_type']               = '3';
				$user_info['IsActive']                = '1';
				$user_info['UserJoinedDate']          = $now;
				$inserted_id = $this->register_model->add_user($user_info);
				
				if($this->input->post('active_frm')=='company')
				{
					$company_info['UserID']                     = $inserted_id;
					$company_info['CompanyName']                = strip_tags($this->input->post('CompanyName'));
					$company_info['CompanySize']                = strip_tags($this->input->post('CompanySize'));
					$company_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('terms2'))
					{
					  $company_info['IndustryType']             = implode(',',$this->input->post('terms2'));
					}
					$company_info['CreatedDate']                = $now;
					$company_info['UpdatedDate']                = $now;
					$company_info['IsActive']                   = '1';
				}
				if($this->input->post('active_frm')=='law_firm')
				{
					$lawfirm_info['UserID']                     = $inserted_id;
					$lawfirm_info['FirmName']                   = strip_tags($this->input->post('FirmName'));
					$lawfirm_info['FirmSize']                   = strip_tags($this->input->post('FirmSize'));
					$lawfirm_info['AreYouAnAttorney']           = strip_tags($this->input->post('AreYouAnAttorney'));
					if($this->input->post('terms'))
					{
					  $lawfirm_info['PracticeAreas']           = implode(',',$this->input->post('terms'));
					}
					$lawfirm_info['CreatedDate']                = $now;
					$lawfirm_info['UpdatedDate']                = $now;
					$lawfirm_info['IsActive']                   = '1';
					
				}
				 
				
				if($inserted_id!='')
				{
					if(count($lawfirm_info)>0)
				   {
					 $this->register_model->add_lawfirm($lawfirm_info);
				   }
				  if(count($company_info)>0)
				  {
					 $this->register_model->add_company($company_info);
				  }
					
					$this->session->set_flashdata('msg', 'Register successful please login');
					redirect('login');
				}
				
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
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */