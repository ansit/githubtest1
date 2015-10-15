<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_profile extends CI_Controller {
	
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
		$data['list'] = $this->user_model->get_profile_data($session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('administrator_profile',$data);
	}
	
    function update_profile($id='')
	{
	  if(isset($_POST['administrator_update']))
	  {
		
		      $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('FirstName','First Name','required|xss_clean');
			  $this->form_validation->set_rules('LastName','Last Name','required|xss_clean');
			  //$this->form_validation->set_rules('Position','Position','required|xss_clean');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean');
			  $this->form_validation->set_rules('City','City','required|xss_clean');
			  $this->form_validation->set_rules('State','State','required|xss_clean');
			  $this->form_validation->set_rules('Zip','Zip','required|xss_clean|numeric|max_length[5]');
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
				$session_data = $this->session->userdata('logged_in');
		        $data = array();	
		        $data['list'] = $this->user_model->get_profile_data($session_data['UserID']);
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('administrator_profile',$data);
		 }
		 else
		 {
			  
			
			 if ($_FILES['profile_img']['name']!='')
			 {
			  //$dirPath = FILE_ROOT_PATH.'/media/profile_img/admin/'.$this->input->post('old_profile_img');
			  $dirPath = getcwd().'/media/profile_img/admin/'.$this->input->post('old_profile_img');
			  
			//if($this->input->post('old_profile_img')!='')
			//{
			//   unlink(realpath($dirPath));
			//}
			//$config['upload_path'] = FILE_ROOT_PATH.'base_url()./media/profile_img/admin';
			$config['upload_path'] = getcwd().'/media/profile_img/admin';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size']    = '1024';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$this->load->library('upload', $config);
				 if ( ! $this->upload->do_upload($field='profile_img'))
				 {
				   $error = array('error' => $this->upload->display_errors());
				   $this->session->set_flashdata('msg', $error['error']);
					redirect('admin_profile');
					
				 }
				 else
				 {
					unlink(realpath($dirPath));
					$data = $this->upload->data();
					//$this->thumb($data);
					$image_name = $data['file_name'];
				 }
			   }
				else
				{
					$image_name= $this->input->post('old_profile_img');
				}
				
				$now = date('Y-m-d');
				$data = array(
				'FirstName' => $this->input->post('FirstName'),
				'LastName' => $this->input->post('LastName'),
				//'Position' => $this->input->post('Position'),
				'Address' => $this->input->post('Address'),
				'City' => $this->input->post('City'),
				'State' => $this->input->post('State'),
				'Zip' => $this->input->post('Zip'),
				'Email' => $this->input->post('Email'),
				'Password' => $this->input->post('Password'),
				'PhoneNumber' => $this->input->post('PhoneNumber'),
				'Firm_CompanySize' => $this->input->post('Firm_CompanySize'),
				//'HowDidYouHearAboutUs' => $this->input->post('HowDidYouHearAboutUs'),
				'ProfilePic' => $image_name,
				'UpdatedDate' => $now,
				'Country' => $this->input->post('Country'));
				$rss = $this->user_model->update_administrator_data($id,$data);
			   if($rss)
			   {	
				  $message = 'Successful Update';
				  $this->session->set_flashdata('msg', $message);
				  redirect('admin_profile');
			   }
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
		
		 
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */