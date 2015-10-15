<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_message extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('manager_model');
		$this->load->model('register_model');	

     }

	public function index()
	{
		$data = array();	
		$manager_list = $this->manager_model->get_manager_list();
		$data['manager_list'] = $manager_list;
		$data['title'] = 'Manager';
		$data['heading'] = 'Manager';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('message_user',$data);
	}
	
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */