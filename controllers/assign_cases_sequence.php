<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_cases_sequence extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->model('assign_model');
		$this->load->model('user_model');
		$this->user_model->roleaccess();
		error_reporting(0);
     }

	public function index()
	{
		
		
		$data = array();
		$data['case'] = $this->assign_model->getsequence();
		//$data['case_sequence'] = $this->assign_model->get_case_sequence();
		///$data['input_module'] = $this->assign_model->get_input_module();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('sequence',$data);
		
	}
	
	
	public function Sequence_add()
	{
		if(isset($_POST['assign'])){
			$this->assign_model->add_assign();
		}
		
		$data = array();
		$data['case'] = $this->assign_model->get_case();
		$data['case_sequence'] = $this->assign_model->get_case_sequence();
		//$data['input_module'] = $this->assign_model->get_input_module();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('assign_cases_sequence',$data);
	}
	
	public function deletesequence()
	{
		$uid = $this->input->post('Assign_ID');
	$res = $this->assign_model->delete($uid);
	if($this->db->affected_rows()>0)
	{
		echo 1;
	}
	else{
		echo 0;
	}
	
				//$msg=" successfully deleted";
				//$this->session->set_flashdata('msg',$msg);
				//redirect('assign_cases_sequence');
		
	}
	
	
	
	public function Edit_sequence($id='')
	{
		if(isset($_POST['submit'])){
			$data = array();
			$data = $this->input->post('CaseID');
			$this->db->select('Case_ID');
			$this->db->where('Case_ID',$data);
			$query = $this->db->get('assign_case_sequence');
			if($query->num_rows() > 0){
				$this->session->set_flashdata('msg', 'Duplicate Data Case');
				redirect('assign_cases_sequence');
			}else{
			$data = array();	
			$data['Case_ID'] = $this->input->post('CaseID');
			$data['Main_case_sequence_ID'] = $this->input->post('Case_Sequence_ID');
			//$data['Case_ID'] = $this->input->post('CaseID');
			//$data['Main_case_sequence_ID'] = $this->input->post('Case_Sequence_ID');
			$this->assign_model->update_assign($id,$data);
			}
		}
		else {
		$data=array();
		$data['list'] = $this->assign_model->Edit_sequence($id);
		$data['case'] = $this->assign_model->get_case();
		$data['case_sequence'] = $this->assign_model->get_case_sequence();
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('edit_sequence',$data);
		//$user_data = $this->assign_model->Edit_sequence($id);
		//$msg=" successfully deleted";
		//$this->session->set_flashdata('msg',$msg);
		//redirect('assign_cases_sequence');
		
		}
	}
	
}

