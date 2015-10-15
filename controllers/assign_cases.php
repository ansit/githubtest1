<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_cases extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->model('manager_model');	
		error_reporting(0);
     }

	public function index()
	{
		$data = array();
		if ($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
		}
		$data['active_case_list']=$this->manager_model->get_Active_case_list($session_data['UserID']);
		$data['close_case_list']=$this->manager_model->get_close_case_list($session_data['UserID']);		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		
		$this->load->view('assign_case',$data);
	}
	
	
	
}

