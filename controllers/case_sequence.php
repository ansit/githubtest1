<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Case_sequence extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('case_model');
		$this->load->model('user_model');
		$this->user_model->roleaccess();
		//error_reporting(0);

    }

	public function index()
	{
		$data = array();	
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('dyanamic_form_dashboard',$data);
	}
		
	public function module_case_sequence($id="") {	
		if(isset($_POST['btn_case_sequence'])){
			if($id > 0){
				$this->case_model->update_module($id);
				$this->session->set_flashdata('msg', 'Update successfully');
				redirect('case_sequence/module_case_sequence');
			}else{
				
			$data = array();
			$now = date('Y-m-d h:i:s');
			$session_data = $this->session->userdata('logged_in');
			$data['SequenceName'] = strip_tags($this->input->post('case_sequence_name')); 
			$data['CreatedBy'] = $session_data['UserID'];
			$data['CreatedDate'] = $now; 
			$data['UpdatedDate'] = $now; 
			$data['IsActive'] = '1'; 
			$id = $this->case_model->insert_case_sequence($data);
			if($id)
			{
				$this->session->set_flashdata('msg', 'Add successfully');
				redirect('case_sequence/module_case_sequence');
			}
		}	
	}
		
		
		$data['list'] = $this->case_model->get_edit_module($id);
		$data['case_sequence_list'] = $this->case_model->get_case_sequence_list();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('dyanamic_module_case_sequence',$data);
	}
		
	public function module($id=''){
		error_reporting(0);
	if (isset($_POST['test'])) {
		if($id >0){
			$this->case_model->add_test($id);
			$this->session->set_flashdata('msg', 'Update successfully');
			redirect('case_sequence/module_list');
		}else{
			$this->case_model->add_test($id);
			$this->session->set_flashdata('msg', 'Add successfully');
			redirect('case_sequence/module_list');
		}
	}else{
		$data['case_sequence_list'] = $this->case_model->get_case_sequence_list();
		$data['case_sequence_all'] = $this->case_model->get_case_sequence_all($id);
		$data['get_all_question'] = $this->case_model->get_qustion($id);
		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('dyanamic_module',$data);
		}
	}
	
	public function module_list() {
		$data['msg'] = '';
		$module_list = '';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['module_list'] = $this->case_model->get_module_list();
		if($this->session->flashdata('val'))
		{
			if($this->session->flashdata('val')==1)
			{
				$data['msg'] = 'Add successfully' ;
			}
			else
			{
				$data['msg'] = 'Update successfully' ;
			}
		}
		
		$this->load->view('module_list',$data);

	}
	
	// -------------to delete Module case sequence--------------	
		public function delete_Module_Case_sequence()
	{
			$uid = $this->input->post('CaseSequenceID');
		$res = $this->case_model->delete_case_sequence($uid);
		//echo $this->db->last_query();
		//exit;
		if($this->db->affected_rows()>0)
		{
			echo 1;
		}
		else{
			echo 0;
		}
		
	}	
	//-----------------------------...////	
	public function response($id='') {
		
		if(isset($_POST['responce'])){
			$this->case_model->add_responce();
		}
		
		$data['case_sequence_list'] = $this->case_model->get_case_sequence_list();
		$data['input_module_list'] = $this->case_model->get_input_module();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('dyanamic_responce',$data);

	}
	
	public function checkmodulename(){
		if($this->input->is_ajax_request()){
			echo $this->case_model->checkmoduleexistance();
			
		}else{
			echo "direct browser access is not allowed!";
		}
		
	}
	
	
	public function information_module(){
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$data['case_sequence_list'] = $this->case_model->get_case_sequence_list();
		$data['input_module_list'] = $this->case_model->get_input_module();
		$this->load->view('information_module',$data);
	}
	public function search ($q){
		
		$data['test_info'] = $this->case_model->get_input($q);
		$this->load->view('ajax_search',$data);
		
	}
	
	public function main_case($q){

		$get_info = $this->case_model->get_value($q);
		print_r($get_info);
		
	}
	
	public function delete_question()
	{
		 $qid = $this->input->post('qestiondivId');
		 $result = $this->case_model->delete_question($qid);
		 echo $result;
		 exit;
		
	}	
		


		function uploadimg($prodid){
			 if (!empty($_FILES)) {
			
			 $prodid = $this->input->post('prodid', TRUE);
			$tempFile = $_FILES['file']['tmp_name'];                    
			  // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
			$targetPath = getcwd(). '/uploads/';  
			 // Adding timestamp with image's name so that files with same name can be uploaded easily.
			$fname =  $targetPath.time().'-'. $_FILES['file']['name'];  
			$file_name=time().'-'. $_FILES['file']['name'];
			$ftype=$_FILES["file"]["type"];
			$fsize=($_FILES["file"]["size"] / 1024);
			$tmpname=$_FILES["file"]["tmp_name"];
			$flink=base_url().'uploads/'.$file_name;
		$arr= array('f_name'=>$file_name,
				'f_size'=>$fsize,
				'f_link'=>$flink,
				'f_type'=>$ftype,
				'd_date'=>date('Y-m-d h:i:s'),
				'context'=>'product',
				'refrence_id'=>$prodid);
			$this->db->insert('file_upload', $arr);
			move_uploaded_file($tempFile,$fname); 
			echo $file_name;
			}
		 }

		 // To Delete case model in dynamic form
	// Randheer kumar
	
	public function delete_Case_Module()
	{
			$uid = $this->input->post('Case_Sequence_ID');
		$res = $this->case_model->delete_case_module($uid);
		//echo $this->db->last_query();
		
		if($this->db->affected_rows()>0)
		{
			echo 1;
		}
		else{
			echo 0;
		}
		
	}	
	public function getquesansbycaseseq($id){
		//echo "this is id ".$id;
		$casequesans = $this->case_model->casequesans($id);
		$casequesans = json_encode($casequesans);
		echo $casequesans;
	}
	public function getansbyidques($id){
		//$query = $this->db->get_where('caseanswer',array('IDQuest'=>$id));
		$query = $this->db->query("SELECT caseanswer.ansid,caseanswer.caseid,caseanswer.IDQuest,caseanswer.t_a,caseanswer.iDAlternativa,caseanswer.optionlist,caseanswer.anstxt,file_upload.f_name FROM `caseanswer` LEFT JOIN file_upload ON caseanswer.anstxt = file_upload.refrenceid  WHERE caseanswer.IDQuest = '$id'");
		echo json_encode($query->result());
	}
	
	public function addques(){
		$moduleid = $this->input->post('moduleid');
		//print_r($this->input->post());
		//exit;
		$this->case_model->addsingleques($moduleid);
	}
	
	public function fillmodlist(){
		if($this->input->is_ajax_request()){
			$modlist = $this->case_model->getmodlist();
			echo $modlist;
		}
		
	}
	
	public function processinfomod(){
		if($this->input->is_ajax_request()){
			$infomoduledata = $this->case_model->processinfomod();
			echo $infomoduledata;
		}
	}
	
}

