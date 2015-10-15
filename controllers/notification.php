<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('Notification_model');	

     }

	public function index()
	{
		$data = array();
		//$data['notifications'] = $this->Notification_model->show_notification();
		$data['no_of_manager'] = $this->Notification_model->new_case();
		$data['no_of_users'] = $this->Notification_model->new_user();
		$data['count_case'] = $this->Notification_model->notifications_to_assign_managers();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('notification',$data);
	}
	
	    /* public function delete_vec()
		  {
			$vid = $this->input->get('vecId');
			$uid = $this->input->get('uid');
			$this->Notification_model->delete_vechicle($vid,$uid);
			redirect('dashboard');
	     }*/
		 
		 public function shwnotification($role){
			$notices = $this->Notification_model->getnotice($role);
			$json_respose = array();
			foreach($notices as $row):
			$node = array();
			$node['id'] = $row->id;
			$node['comment'] = $row->comment;
			$node['created'] = $row->created;
			array_push($json_respose,$node);
			endforeach;
			echo json_encode($json_respose);
			
		 }
		
		public function noticedetails($id){
			$res = $this->Notification_model->noticedetails($id);
			$node = array();
			if($res->role == 1){
				$role = "Admin";
			}else if($res->role == 2){
				$role = "Manager";
			}else{$role = "User";}
			$node['id'] = $id;
			$node['name']= $this->Notification_model->getnamebyid($res->userid);
			$node['role'] = $role;
			$node['comment'] = $res->comment;
			$node['created'] = $res->created;
			echo json_encode($node);
		}
		
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */