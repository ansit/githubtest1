<?php

   class Dashboard_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		

    }
			
		public function count_manager()
		{
				$this -> db -> select('UserID');
				$this -> db -> from('register_user');
				$this -> db -> where('User_type = 2');
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				}
		   }
		   
		   public function count_user()
		   {
				$this -> db -> select('UserID');
				$this -> db -> from('register_user');
				$this -> db -> where('User_type = 3');
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				}
		   }
		   // manager user count
		   public function count_user_manager($id='')
		   {
		   if($id==''):
				$session_data = $this->session->userdata('logged_in');
				//$this->db->distinct();
				$this->db->select('CreatedBy');
				$this->db->from('tblcase');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('ManagerAssigned', $session_data['UserID']);
				$query = $this->db->get();
				else:
					//$this->db->distinct();
					$this->db->select('CreatedBy');
					$this->db->from('tblcase');
					$this->db->where('tblcase.IsActive', 1);
					$this->db->where('ManagerAssigned', $id);
					$query = $this->db->get();
			endif;
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
			  
			  //return $this->db->last_query();
				}
				else
				{
				    return '0';
				}
		   }
		   
		    public function count_cases_assgin_manager($id)
		   {
				
				$this -> db -> select('CaseID');
				$this -> db -> from('tblcase');
				$this -> db -> where('ManagerAssigned',$id);
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
			  //return $this->db->last_query();
				}
				else
				{
				    return '0';
				}
		    }
			
			 public function count_case()
		    {
			    $this -> db -> select('CaseID');
				$this -> db -> from('tblcase');
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				}
		    }
			
			
	
       
	
  }



?>