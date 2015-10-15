<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('Dashboard_model');
		$this->load->model('Notification_model');
		}
	
	public function index()
	{
		$data = array();
		$data['notifications'] = $this->Notification_model->show_notification(1);
		$data['no_of_manager'] = $this->Dashboard_model->count_manager();
		$data['no_of_users'] = $this->Dashboard_model->count_user();
		$data['count_case'] = $this->Dashboard_model->count_case();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('admin_dashboard',$data);
	}
	
	
	
	    /* public function delete_vec()
		  {
			$vid = $this->input->get('vecId');
			$uid = $this->input->get('uid');
			$this->Dashboard_model->delete_vechicle($vid,$uid);
			redirect('dashboard');
	     }*/
		 
		
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */