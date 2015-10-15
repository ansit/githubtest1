<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Manager_dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->library('email');
		$this->load->model('Dashboard_model');	
		$this->load->model('manager_model');	
		$this->load->model('case_model');
		$this->load->model('Notification_model');
		//error_reporting(0);
     }

	public function index()
	{
		$data = array();	
		if ($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
		}
		$data['notifications'] = $this->Notification_model->show_notification(2);
		$data['active_case_list']=$this->manager_model->get_Active_case_list($session_data['UserID']);
		$data['no_of_manager'] = $this->Dashboard_model->count_manager();
		$data['no_of_users'] = $this->Dashboard_model->count_user();
		$data['no_of_cases_assign'] = $this->Dashboard_model->count_cases_assgin_manager($session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager_dashboard',$data);
	}
	
	public function manager_user()
	{
		$data = array();	
		if ($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
		}
		$data['notifications'] = $this->Notification_model->show_notification(2);
		$data['active_case_list']=$this->manager_model->get_Active_case_list($session_data['UserID']);
		$data['ManagerAssigned']=$session_data['UserID'];
		//$data['no_of_manager'] = $this->Dashboard_model->count_manager();
		$data['no_of_users'] = $this->Dashboard_model->count_user_manager();
		$data['no_of_cases_assign'] = $this->Dashboard_model->count_cases_assgin_manager($session_data['UserID']);
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager_dashboard',$data);
	}
	
	    /* public function delete_vec()
		  {
			$vid = $this->input->get('vecId');
			$uid = $this->input->get('uid');
			$this->Dashboard_model->delete_vechicle($vid,$uid);
			redirect('dashboard');
	     }*/
		 
		 
		 //delete record
		public function delete($id=''){
			$list = $this->manager_model->getadminlist();
		$resta = $this->manager_model->delete_record($id);
		if($resta == 1){
			$data['caseid'] = $id;
			$session_data = $this->session->userdata('logged_in');
			$data['managername'] = $session_data['FirstName'];
			foreach($list as $row):
			$data['adminname'] = $row->FirstName;
			$this->email->from('dev@ansitdev.com', 'CaseManagerApp');
			$this->email->to($row->Email); 
			$this->email->subject('Case ID'.$id.' rejected');
			$mailbody = $this->load->view('email/caserejectmail',$data,true);
			$this->email->message($mailbody);
			if(!$this->email->send()){
				show_error($this->email->print_debugger());
			 }
			endforeach;	
		}
		redirect('manager_dashboard','refresh');
		
		
		}
		// view case
		public function view_case($id=''){
			
			if($id){
				$data = array();
				$chsta['case_stat'] = $this->case_model->allcasestat();
				$chsta['caseid'] = $id;
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', $chsta, true);
				$data['caseItem']=$this->case_model->get_case($id);
				$data['firparcom'] = $this->case_model->getmanagercomment($id,1);
				$data['secparcom'] = $this->case_model->getmanagercomment($id,2);
				$data['firstep1'] = $this->case_model->stepdata($id,1,1);
				$data['secstep1'] = $this->case_model->stepdata($id,2,1);
				$data['firstep2'] = $this->case_model->stepdata($id,1,2);
				$data['secstep2'] = $this->case_model->stepdata($id,2,2);
				$this->load->view('assign_case_manager_view',$data);
			}else{
				redirect('manager_dashboard','refresh');
			}
		
		}
		
	public function viewcasedetails($caseid,$partyno,$stepno){
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['caseItem']=$this->case_model->get_case($caseid);
		$data['partyno'] = $partyno;
		$data['stepno'] = $stepno;
		if($stepno == 2){
			$data['questions'] = $this->case_model->getquesbycaseid($caseid);
			//$data['filledans'] = $this->case_model->getansbycaseid($caseid);
			$userid = $this->case_model->getuserbyparty($caseid,$partyno);
			$data['filledans'] = $this->case_model->getfileans($caseid,$userid);
			//print_r($data['questions']);
			//exit;
			//
		}
		$data['manacomment'] = $this->case_model->getmanagercomment($caseid,$partyno);
		$this->load->view('viewcasedetails.php',$data);
	}
	
	public function responseuser($caseid,$partyno){
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['caseItem']=$this->case_model->get_case($caseid);
		$data['partyno'] = $partyno;
		$data['manacomment'] = $this->case_model->getmanagercomment($caseid,$partyno);
		$this->load->view('viewcasedetails.php',$data);		
	}
	
	
	public function addcomment(){
		$caseid = $this->input->post('caseid');
		$partyno = $this->input->post('partyno');
		$userid = $this->input->post('userid');
		$stepno = $this->input->post('stepno');
		$comment = $this->input->post('txtcom');
		$data = array('userid'=>$userid,'comment'=>$comment,'caseid'=>$caseid,'partyno'=>$partyno,'stepno'=>$stepno);
		$this->db->insert('tab_comment',$data);
		$insert_id = $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			echo "<p id='$insert_id' class='comrow'>".$comment." on ".date("Y-m-d h:i:s", time())." <span data-toggle='tooltip' data-placement='right' title='delete' class='glyphicon glyphicon-remove-sign delcom'></span></p>";
		}else{
			echo 0;
		}
	}
	
	public function delmanacom($id){
		if($this->input->is_ajax_request()){
			$session_data = $this->session->userdata('logged_in');
			$usertype = $session_data['User_type'];
			
			if($usertype == 1 ||  $usertype == 2){
				$delcomment = $this->case_model->delmanacom($id);
				echo $delcomment;
			}else{
				echo "Please Login to do the command";
			}
		}else{
			echo "Not available on direct mode";
		}
	}

	public function chgcasestepstat(){
		if($this->input->is_ajax_request()){
			$status = $this->input->post('casesta');
			$caseid = $this->input->post('caseno');
			$stepno = $this->input->post('stepno');
			$partyno = $this->input->post('partyno');
			if($this->input->post('review')){$review = 1;}else{$review = 0;}
			$this->case_model->chgcasestate($caseid,$stepno,$partyno,$status,$review);
		}else{
			echo "Direct access Not allowed";
		}		
	}


	
	public function allstatoption(){
		$case_stat = $this->case_model->allcasestat();
		$json_respose = array();
		foreach($case_stat as $stat):
		$node = array();
		$node['id'] = $stat->id;
		$node['comment'] = $row->comment;
		$node['created'] = $row->created;
		array_push($json_respose,$node);
		endforeach;
		echo json_encode($json_respose);
	}
	
	public function executnotify(){
		$comment = $this->input->post('txtcom');
		$caseid = $this->input->post('caseid');
		$partyno = $this->input->post('partyno');
		$partyemail = $this->case_model->getpartyemail($caseid,$partyno);
			$this->email->from('dev@ansitdev.com', 'CaseManagerApp');
			$this->email->to($partyemail->email); 
			$this->email->subject('Case ID '.$caseid.' notification');
			//$mailbody = $this->load->view('email/caserejectmail',$data,true);
			$this->email->message("The Following comment has been added to your case<br><strong>".$comment."</strong>");
			if(!$this->email->send()){
				show_error($this->email->print_debugger());
			 }else{
				echo "mail send";
			 }
	}
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */