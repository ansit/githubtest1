<?php

   class Notification_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		

    }
			
		public function new_case()
		{
				/* $this -> db -> select('UserID');
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
				} */
		   }
		   
		   public function new_user()
		   {
				/* $this -> db -> select('UserID');
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
				} */
		   }
		   // manager user count
		   public function notifications_to_assign_managers()
		   {
				/* $session_data = $this->session->userdata('logged_in');
				$this->db->distinct();
				$this->db->select('CreatedBy');
				$this->db->from('tblcase');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('ManagerAssigned', $session_data['UserID']);
				$query = $this->db->get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				} */
		   }
		   
		    public function count_cases_assgin_manager($id)
		   {
				
				/* $this -> db -> select('CaseID');
				$this -> db -> from('tblcase');
				$this -> db -> where('ManagerAssigned',$id);
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				} */
		    }
			
			 public function count_case()
		    {
			    /* $this -> db -> select('CaseID');
				$this -> db -> from('tblcase');
				$query = $this -> db -> get();
				if($query -> num_rows()> 0)
				{
				  return $query -> num_rows();
				}
				else
				{
				    return '0';
				} */
		    }
			
			public function addnotification($userid,$obj,$objid,$role,$action,$comment){
				$data = array('userid'=>$userid,'object'=>$obj,'objectid'=>$objid,'role'=>$role,'action'=>$action,'comment'=>$comment);
				$this->db->insert('tblnotification',$data);
				//echo $this->db->last_query();
			}
			
			
			
			public function getnotice($role){
			   if($role == 1){
				  $query = $this->db->select('id,comment,created')->from('tblnotification')->order_by('created','desc')->limit(10)->get();
			   }else if($role == 2){
				  $query = $this->db->select('id,comment,created')->from('tblnotification')->where('role',2)->or_where('role',3)->order_by('created','desc')->limit(15)->get();
			   }else{
				  $query = $this->db->select('id,comment,created')->from('tblnotification')->where('role',3)->order_by('created','desc')->limit(15)->get();
			   }
			   return $query->result();
			}
			
			
			public function show_notification($role){
			    if($role == 1){
				$query = $this->db->select('id,comment,created')->from('tblnotification')->order_by('created','desc')->limit(10)->get();
				}else if($role == 2){
				  $query = $this->db->select('id,comment,created')->from('tblnotification')->where('role',2)->or_where('role',3)->order_by('created','desc')->limit(10)->get();
				}else{
				  $query = $this->db->select('id,comment,created')->from('tblnotification')->where('role',3)->order_by('created','desc')->limit(10)->get();
				}
				return $query->result();

				//SELECT b.FirstName as Name, c.RoleName, d.FirstName as objectname FROM tblnotification a join register_user b ON b.userid = a.UserID JOIN tblmst_userrole c ON a.role = c.UserRoleID JOIN register_user d ON d.UserID = a.objectid
			    //$query = $this->db->query("SELECT b.FirstName as Name, c.RoleName, d.FirstName as objectname FROM tblnotification a join register_user b ON b.userid = a.UserID JOIN tblmst_userrole c ON a.role = c.UserRoleID JOIN register_user d ON d.UserID = a.objectid ");
				
				}
				
				
				
				public function getnamebyid($id){
				  $query = $this->db->get_where('register_user',array('UserID'=>$id));
				  $row = $query->row();
				  return $row->FirstName;
				}
				
				public function noticedetails($id){
				  $query = $this->db->get_where('tblnotification',array('id'=>$id));
				  return $query->row();
				}
	
  }
?>