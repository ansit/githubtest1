<?php

	class Assign_model extends CI_Model {

		function __construct()
		{
			parent::__construct();

		}
		// get case
		public function get_case(){
			$this->db->select('*');
			$this->db->where('CaseStatus',2);
			$query=$this->db->get('tblcase');
			//echo $this->db->last_query();
			
			return $query->result();
		}
		// get case sequence 
		public function get_case_sequence(){
			/* $query = "SELECT Main_case_sequence_ID, Case_Sequence_ID,SequenceName FROM case_sequence INNER JOIN  tblcasesequence ON case_sequence.Main_case_sequence_ID = tblcasesequence.CaseSequenceID";
			$query = $this->db->query($query);
			return $query->result(); */
			$this->db->select('*');
			$query=$this->db->get('tblcasesequence');
			return $query->result();
			
		}
		
		public function getsequence()
		{
		
			$query = "select assign_case_sequence.Assign_ID,tblcase.CaseType ,tblcase.CaseID,tblcasesequence.SequenceName from tblcase 
INNER JOIN assign_case_sequence ON tblcase.CaseID=assign_case_sequence.Case_ID 
INNER JOIN tblcasesequence ON tblcasesequence.CaseSequenceID=assign_case_sequence.Main_case_sequence_ID";
			$query = $this->db->query($query);
			//echo $this->db->last_query();
			
			return $query->result();
		}
		//insert assign case sequence
		public function add_assign (){
			$data = $this->input->post('CaseID');
			$this->db->select('Case_ID');
			$this->db->where('Case_ID',$data);
			$query = $this->db->get('assign_case_sequence');
			if($query->num_rows() > 0){
				$this->session->set_flashdata('msg', 'Dublicate Data Case');
				redirect('assign_cases_sequence');
			}else{
			$data = array();	
			$data['Case_ID'] = $this->input->post('CaseID');
			$data['Main_case_sequence_ID'] = $this->input->post('Case_Sequence_ID');
			$this->db->insert('assign_case_sequence',$data);
			
			$this->session->set_flashdata('msg', 'Add successfuly');
			redirect('assign_cases_sequence');
			}
			
		}		
	function delete($id)
			{
				 $rss = $this->db->delete('assign_case_sequence', array('Assign_ID' => $id));
				
				 if($rss)
				 {
					 return 1;
				 }
				 else
				 {
					 return 0;
				 }
				 
			}
	
	
	function Edit_sequence($id)
			{
			$query = "select assign_case_sequence.Assign_ID,tblcase.CaseType ,tblcase.CaseID,tblcasesequence.SequenceName,tblcasesequence.CaseSequenceID from tblcase 
INNER JOIN assign_case_sequence ON tblcase.CaseID=assign_case_sequence.Case_ID 
INNER JOIN tblcasesequence ON tblcasesequence.CaseSequenceID=assign_case_sequence.Main_case_sequence_ID Where assign_case_sequence.Assign_ID=$id";
			$query = $this->db->query($query);
			//echo $this->db->last_query();
			
			return $query->result();
	
	
	
	
		}
		public function update_assign ($id,$data){
			$this -> db -> where('Assign_ID',$id);
			$this -> db -> update('assign_case_sequence',$data);
			//$data = array();	
			//$data['Case_ID'] = $this->input->post('CaseID');
			//$data['Main_case_sequence_ID'] = $this->input->post('Case_Sequence_ID');
			//$this->db->update('assign_case_sequence',$data);
			//echo $this->db->last_query();
			$this->session->set_flashdata('msg', 'Update successfuly');
			redirect('assign_cases_sequence');
			}
		
	}
?>