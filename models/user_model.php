<?php

   class User_model extends CI_Model {

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
			
			    $this->db->set($data);
                $result1 = $this->db->insert('register_user');
				$insert_id = $this->db->insert_id();
				return $insert_id;
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
			
			
			
			
			
			// user info admin
			function get_user_list()
			{
				$this->db->where('User_type', 3);
				$this->db->where('IsActive', 1);
				$query = $this->db->get("register_user");
				return $query->result();
				
				 
			}
		
			// user info for manager
			function get_user_list_manager($id='')
			{
				$this->db->select('CaseTitle,fpid ,spid');
				$query = $this->db->get_where('tblcase',array('ManagerAssigned'=>$id));
				$json_respose =array();
				foreach($query->result() as $result){
				  $node = array();
				  $node['fp'] = $this->get_caseuser($result->fpid);
				  $node['CaseTitle'] = $result->CaseTitle;
				  array_push($json_respose,$node);
				  $node['fp'] = $this->get_caseuser($result->spid);
				  $node['CaseTitle'] = $result->CaseTitle;
				  array_push($json_respose,$node);
				}
				return $json_respose;
				
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
			
			function checkExistance($userEmail)
			{
		
				$this -> db -> select('UserID');
				$this -> db -> from('register_user');
				$this -> db -> where('Email = ' . "'" . $userEmail . "'");
				$this -> db -> where('IsActive = 1');
				$query = $this -> db -> get();
				if($query -> num_rows() == 1)
				{
				return $query->row()->UserID;
				}
				else
				{
				return false;
				}
			}
			
			
			function insertActivationcode($userEmail,$activation_id)
		    {
				 $data = array('pswd_reset_code' => $activation_id,'pswdrest_status'=>1);
				 $res= $this->db->update('register_user', $data,array('Email'=>$userEmail)); 
				 if($res)
				 {
					 return 1;
				 }
				  else 
				  {
					  return 0;
				  }
		   }
		   
		   
		   public function check_act_code($email,$act_code)
			{
			    $this -> db -> select('UserID');
				$this -> db -> from('register_user');
				$this -> db -> where('email',$email);
				$this -> db -> where('pswd_reset_code',$act_code);
				$query = $this -> db -> get();
				//$this->db->last_query();
				//exit;
				if($query -> num_rows() > 0)
				{
				return 1;
				}
				else
				{
				return 0;
				}	
				
				
			}
			
			 public function resetpass($pass,$email,$resetcode)
			{$email = base64_decode($email);
			   
			   $result = $this->check_act_code($email,$resetcode);
			   if($result == 1){
				  $data = array('Password ' => $pass,'pswd_reset_code ' => '','pswdrest_status'=>0,'pswdrest_time'=>'');
				  //$this -> db -> where('pswd_reset_code = ' . "'" . $resetcode . "'");
				  $res= $this->db->update('register_user', $data,array('Email'=>$email,'pswd_reset_code'=>$resetcode)); 
				  if($res)
				  {
					 return 1;
				  }
				  else 
				  {
					  return 0;
				  }

			   }else{return 0;}
			}
			
			
			public function get_profile_data($id){
				
				$this->db->where('UserID',$id);
				$query = $this->db->get("register_user");
				return $query->result();
			   //return $this->db->last_query();
			}
			
			public function update_administrator_data($id,$data){
				$this->db->where("UserID",$id);
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
			// manager info for user
			function get_manager_list_user($user_id,$user_type)
			{
				
				$session_data = $this->session->userdata('logged_in');
				$this->db->distinct();
				$this->db->select('UserID,FirstName, Email,PhoneNumber,Position');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.ManagerAssigned','INNER');
				$this->db->where("tblcase.fpid OR 'tblcase.spid'" .'='.$session_data['UserID']);
				//$this->db->where('tblcase.IsActive', 1);
				//$this->db->where("('tblcase.fpid', $user_id  OR 'tblcase.spid', $user_id)");
				//$this->db->where('tblcase.CreatedBy', $session_data['UserID']);
				$query = $this->db->get();
				return $query->result();
			   //return $this->db->last_query();
			
			}
			
			// mesaage send manager
			function manager_send_message($id){
				$session_data = $this->session->userdata('logged_in');
				date_default_timezone_set("Asia/Kolkata");
				$data = array(
				'MANAGER_ID' => $session_data['UserID'],
				'USER_ID' => $id,
				'DISCUSSION' => htmlspecialchars(mysql_real_escape_string($this->input->post('discussion'))),
				'DATE' => date("Y-m-d"),
				'TIME' => date('H:i:s', time()),
				'TYPE' => 1,
				'RESPONCE' =>$session_data['FirstName']);
				$this->db->insert('message', $data);
				if($this->db->affected_rows() > 0){
				  echo 1;
				  
				}else{
				  echo 0;
				}
			}
			
			
			// mesaage view manager
			function get_message ($id,$managerid){
				
				$this->db->select('MESSAGE_ID,USER_ID,RESPONCE,DISCUSSION,DATE,TIME,TYPE');
				//$this->db->from('message');
				$this->db->where('MANAGER_ID ', $managerid);
				$this->db->where('USER_ID',$id);
				$query = $this->db->get('message');
				return $query->result();
				
				
			}
			
			// append new msg
			public function getnewmessage($managerid,$userid,$lastid){
			   $this->db->select('*');
			   $this->db->from('message');
			   $this->db->where('MANAGER_ID',$managerid);
			   $this->db->where('USER_ID',$userid);
			   $this->db->where('MESSAGE_ID > ',$lastid);
			   $query = $this->db->get();
			   return $query->result();
			}
			
			// mesaage send user
			function user_send_message($id){
				$session_data = $this->session->userdata('logged_in');
				date_default_timezone_set("Asia/Kolkata");
				$data = array(
				'MANAGER_ID' => $id,
				'USER_ID' => $session_data['UserID'],
				'DISCUSSION' => htmlspecialchars(mysql_real_escape_string($this->input->post('discussion'))),
				'DATE' => date("Y-m-d"),
				'TIME' => date('H:i:s', time()),
				'TYPE' => 2,
				'RESPONCE' => $session_data['FirstName']);
				$this->db->insert('message', $data);
				if($this->db->affected_rows() > 0){
				  echo 1;
				}else{
				  echo 0;
				}

			}
			// mesaage view user
			function get_message_user ($id){
				$session_data = $this->session->userdata('logged_in');
				$this->db->select('RESPONCE,DISCUSSION,DATE,TIME,TYPE');
				//$this->db->from('message');
				$this->db->where('MANAGER_ID ',$id);
				$this->db->where('USER_ID',$session_data['UserID']);
				$query = $this->db->get('message');
				return $query->result();
				
				
			}
	   
	function delete($id)
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
			
			function get_caseuser($id){
			   $this->db->select('UserID,FirstName,Email,PhoneNumber,Position');
			   $query = $this->db->get_where('register_user',array('UserID'=>$id));
			   return $query->result();
											 
			}
  }



?>
