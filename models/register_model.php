<?php

   class Register_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }
			
			function login($userEmail, $userPassword)
			{
				
		
				$this -> db -> select('UserID,FirstName,LastName,Email,User_type ');
				$this -> db -> from('register_user');
				$this -> db -> where('Email',trim($userEmail));
				$this -> db -> where('Password',trim($userPassword));
				$this -> db -> where('IsActive = 1');
				$this -> db -> limit(1);
				$query = $this -> db -> get();
				//echo $this->db->last_query();
				if($query -> num_rows() == 1)
				{
				return $query->result();
				}
				else
				{
				return false;
				}
			}
			
			
			public function get_image_name($uid)
			{
			    $this -> db -> select('ProfilePic');
				$this -> db -> from('register_user');
				$this -> db -> where('UserID',$uid);
				$query = $this -> db -> get();
				if($query -> num_rows() > 0)
				{
				   return $query->row();
				}
				else
				{
				return 'notfound';
				}	
				
				
			}
			
			public function add_user($data)
			{
			
		        $this->db->insert('register_user', $data);
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
			
			public function add_lawfirm($data)
			{
				 $this->db->insert('tblis_law', $data);
				
			}
			public function add_company($data)
			{
			   $this->db->insert('tblis_company', $data);
			}
			
			
			
			public function update_user($data,$id)
			{
				$this -> db -> where('UserID',$id );
				$res = $this->db->update('register_user',$data); 
			    if($res)
				{
				  return 'update';
				}
				else 
				{
				  return '';
				}
				
				
			}
			
			
			
			function get_user_list()
			{
				  $this->db->select('*');
				  $this->db->from('register_user');
				  $this->db->where('User_type',3);
				  $this->db->where('IsActive',1);
				  $this->db->order_by('UserID','DESC');
				  $query=$this->db->get();
				  return $query->result();
			}
			
			function get_user($id)
			{
				  $this->db->select('*');
				  $this->db->from('register_user');
				  $this->db->where('UserID',$id);
				  $query=$this->db->get();
				  return $query->result();
			}
			
			function delete_user($id)
			{
				 $rss = $this->db->delete('register_user', array('UserID' => $id));	
				 if($rss)
				 {
					 return 1;
				 }
				 else
				 {
					 return 0;
				 }
				 
			}
			
			
			
			public function edit_user($data,$id)
			{
				$this -> db -> where('UserID',$id );
				$res = $this->db->update('register_user',$data); 
			    
				
			}
			
			public function update_user_company($data,$id)
			{
				$this -> db -> where('UserID',$id );
				$res = $this->db->update('tblis_company',$data); 
			   
				
			}
			
			public function edit_lawfirm($data,$id)
			{
				$this -> db -> where('UserID',$id );
				$res = $this->db->update('tblis_law',$data); 
		    }
			
			
			
			
			function delet_user_law_firm($id)
			{
				 $this->db->delete('tblis_law', array('UserID' => $id));	
				 
			}
			
			function delet_user_company($id)
			{
				 $this->db->delete('tblis_company', array('UserID' => $id));	
				 
			}
			
			
		// Check Email exits for form registration 
		
			function exist_email($emailId)
			{
			 $this->db->select('UserID');	
			 $this->db->from('register_user');
			 $this->db->where('Email',trim($emailId));
			 $this->db->where('IsActive = 1');
			 $resultSet=$this->db->get();
			 //echo $this->db->last_query();
			
			 if($resultSet->num_rows()>0)
			 {
			   $row = $resultSet->result();
			   return  $row[0]->UserID;
			  
			   	 
			 }
			 else
			 {
			  return '';	 
			 }
			}
			
       
	
  }



?>