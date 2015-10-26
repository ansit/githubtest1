<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgetpassword extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ( $this->session->userdata('logged_in'))
        { 
            redirect('dashboard');
        }
       	$this->load->model('user_model');
		$this->load->library('email');
		$this->load->helper('email');
		//$this->load->library('encrypt');

     }

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|callback_check_existance');		
				
		if($this->form_validation->run() == FALSE)
		{
			
			$data = array();
			if($this->input->get('success')=='1')
			{

				$data['successmsg']= 'Please check your mail password has sent to you thanks.';
			}
			else
			{
				
				$data['successmsg']='';
			}
			$this->load->view('forgot',$data);
			
		}
		else
		{
		
			function genrateActivation_code()
			{
				$characters = 'acefhjkmnopqedruvxyzwABCDEFGHIJLMNOPQRSTUVWXYZ493712580';
				$string = '';
				for ($i = 0; $i < 8; $i++) {
				$string .= $characters[rand(0, strlen($characters) - 1)];
			}   
			   return $string;
			}
			
			  $userEmail = strip_tags($this->input->post('email'));
			  $activation_id=  genrateActivation_code();

			  $result = $this->user_model->insertActivationcode($userEmail,$activation_id);
			  if($result==1)
			  {
				
				//$ecypemail = $this->encrypt->encode($userEmail);
				$ecypemail = base64_encode($userEmail);
				 $cont['link']= base_url().'resetpasss/emailauth/'.$ecypemail.'/'.$activation_id;
				$this->email->from('dev@ansitdev.com', 'CaseManagerApp');
				$this->email->to($userEmail); 
				$this->email->subject('Password Reset CaseManagerApp');
				
				$mailbody = $this->load->view('email/forgetpass', $cont, true);
				$this->email->message($mailbody);
	
				 if($this->email->send()){
					redirect('forgetpassword?success=1');
				 }else{
					show_error($this->email->print_debugger());
				 }
				 
				 
			}
			
			
		}
		
    }
	
	
	function check_existance()
	{
		$userEmail = strip_tags($this->input->post('email'));
		$result = $this->user_model->checkExistance($userEmail);
		$userid= $result;
		
		if(!$result)
		{
		   $this->form_validation->set_message('check_existance', 'Please Enter Valid Email!');
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
	   
	
	
 }


?>