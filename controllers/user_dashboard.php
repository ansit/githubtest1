<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('Dashboard_model');
		$this->load->model('case_model');
		$this->load->model('Notification_model');
		

     }

	public function index()
	{
		$data = array();	
		$session_data = $this->session->userdata('logged_in');
		$UserID = $session_data['UserID'];
		$User_type = $session_data['User_type'];
		$data['notifications'] = $this->Notification_model->show_notification(3);
		$data['active_case_list']=$this->case_model->get_Active_case_list($UserID,$User_type);
		$data['close_case_list']=$this->case_model->get_close_case_list($UserID,$User_type);	
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('user_dashboard',$data);
	}
	
	    /* public function delete_vec()
		  {
			$vid = $this->input->get('vecId');
			$uid = $this->input->get('uid');
			$this->Dashboard_model->delete_vechicle($vid,$uid);
			redirect('dashboard');
	     }*/
	public function active_case($id=''){ 
		$data = array();
		 $session_data =  $this->session->userdata('logged_in');
		$data['casestepstat'] = $this->case_model->getcasestat($id,$session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['caseItem']=$this->case_model->get_case($id);
		$this->load->view('close_case',$data);
		
	}	 

	public function close_case($id=''){ 
		$data = array();
		 $session_data =  $this->session->userdata('logged_in');
		$data['casestepstat'] = $this->case_model->getcasestat($id,$session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['caseItem']=$this->case_model->get_case($id);
		$this->load->view('close_case',$data);
		
	}
	
	
	public function responseuser($caseid=""){
		$sessdata = $this->session->userdata('logged_in');
		$userid = $sessdata['UserID'];
		$data['getpartyno'] = $this->case_model->hiddenpartyno($caseid,$userid);
		if (isset($_REQUEST['submitresponse'])){
			 $data['msg'] = $this->case_model->addresponse($userid,$caseid);
			if($data['msg'] !== 0){
				$this->session->set_flashdata('msg', 'Answers submitted successfully');
				redirect('user_dashboard/active_case/'.$caseid);
			}else{
				$this->session->set_flashdata('msg', 'Some error occured');
			}
		}else{
			$data['caseid'] = $caseid;
			//$data['filledans'] = $this->case_model->getansbycaseid($caseid);
			$data['filledans'] = $this->case_model->getfileans($caseid,$userid);
			$data['getques'] = $this->case_model->getquesbycaseid($caseid);
			//print_r($data['getques']);
			//exit;
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('responseuser',$data);
		}
	}
		
	public function casepartydetail($id){
			$session_data =  $this->session->userdata('logged_in');
			$userid = $session_data['UserID'];
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$data['caseItem']=$this->case_model->get_case($id,$userid);
			$this->load->view('partydetails',$data);
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */