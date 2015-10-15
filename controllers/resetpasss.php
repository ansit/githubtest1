<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resetpasss extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	    $this->load->model('user_model');
		//$this->load->library('encrypt');
	
     }

	public function index()
	{
		redirect('forgetpassword?link=invalid');
	}
	public function emailauth($encemail,$actcode){
		if($encemail && $actcode){
			//$email = $this->encrypt->decode($encemail);
			$email = base64_decode($encemail);
			$result = $this->user_model->check_act_code($email,$actcode);
			
			
			if($result==1){
				$data['email'] = $encemail;
				$data['act_code'] = $actcode;
				$this->load->view('reset',$data);
			}else{
				redirect('forgetpassword?link=invalid');
			}
		}else{
			redirect('forgetpassword?link=invalid');
		}
	
	}

	public function resetpass(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password', 'Password','trim|required|matches[con_password]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation','required');
		$data['email'] = $this->input->post('email');
		$data['act_code'] = $this->input->post('act_code');
		if($this->form_validation->run() == FALSE)
		{  
						
		        $this->load->view('reset',$data);
		} 
		else
		{
	      if($this->input->post('password')!='')
		  {
				   $user_pass = $this->input->post('password');
				   $email = $this->input->post('email');
				   $act_code= $this->input->post('act_code');
				   
				   $res= $this->user_model->resetpass($user_pass,$email,$act_code);
				   if($res==1)
				   {
					   redirect('login?change=success');
				   }else{
					redirect('forgetpassword?link=invalid');
				   }
			  
			}
	      
	  }
	
	}
 
}


