<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->model('livemodel')
     }

	public function index($q)
	{
		
		$q = intval($_GET['q']);
		$this->livemodel->view_question($q);
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