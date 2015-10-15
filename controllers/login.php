<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
       	$this->load->model('user_model'); 
     }

	
	public function index()
	{
		if(isset($_POST['logsub'])){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|callback_check_database');
			$this->form_validation->set_rules('user_password', 'Password', 'required');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('login');
			}else{
				$session_data = $this->session->userdata('logged_in');
				if($session_data['User_type']==3)
				{
					redirect('user_dashboard');
					exit();
				}
				elseif($session_data['User_type']==2)
				{
					redirect('manager_dashboard/manager_user');
					exit();
				}
				else
				{
					redirect('admin_dashboard');
					exit();
				}
				
			}
		}else if ( $this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			if($session_data['User_type']==3)
			{
				redirect('user_dashboard');
				exit();
			}
			elseif($session_data['User_type']==2)
			{
				redirect('manager_dashboard/manager_user');
				exit();
			}
			else
			{
				redirect('admin_dashboard');
			    exit();
			}			
			
		}else{
			$this->load->view('login');
		}
		
    }
	
	
	function check_database()
	{
		$userEmail = $this->input->post('email',TRUE);
		$userPassword = $this->input->post('user_password',TRUE);
		$result = $this->user_model->login($userEmail, $userPassword);
		$this -> db -> select('UserID,FirstName,LastName,Email,User_type ');
		if($result)
		{
		       $sess_array = array();
				foreach($result as $row)
				{
				$sess_array = array(
				'UserID'		=> $row->UserID,
				'FirstName'	 => $row->FirstName,
				'LastName'	  => $row->LastName,
				'User_type'	  => $row->User_type,
				'Email'	     => $row->Email	
				);
				$this->session->set_userdata('logged_in',$sess_array);
				}
	    return TRUE;
		}
		else
		{
		$this->form_validation->set_message('check_database', 'Invalid email or password');
		return false;
		}
	   }
	   
	   public function forgotpass()
	   {
		   
		    $data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$data['search'] = $this->load->view('common/inner_search', '', true);
			$this->load->view('login',$data);  
		   
	   }
	   
		public function user_register(){
			
		$this->load->view('user_register');
		}
	
		public function forget(){
		
		$this->load->view('forgot');
		}
 }


