<?php

   class Administrator_profile_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function get_administrator_data(){
		
		$this->db->where('UserID',1);
		$query = $this->db->get("register_user");
		return $query->result();
	}
	
	public function update_administrator_data($id,$data){
		$this->db->where("UserID",1);
		$res = $this->db->update('register_user',$data);
		if($res)
		{
			return 1;
		}
		else
		{
			return false;
		}
		
	}
	
	
	
	
	
  }



?>