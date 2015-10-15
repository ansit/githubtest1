<?php

   class Manager_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

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
				
			
			
			
			public function add_manager($data)
			{
			
			    $this->db->set($data);
                $result1 = $this->db->insert('register_user');
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
			public function update_manager($data,$id)
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
			
			
			
			function get_manager_list()
			{
				  $manager_id=array();
				  $this->db->select('*');
				  $this->db->from('register_user');
				  $this->db->where('User_type',2);
				  $this->db->where('IsActive',1);
				  $this->db->order_by('UserID','DESC');
				  $query=$this->db->get();
				  //return $query->result();
				  $result = $query->result();
				  // For getting average time taken by each manager to solve the case.
				  foreach($result as $val){
						foreach($val as $key=>$nval){
						   if($key=='UserID'):
							$manager_id[] = $nval;
						   endif;
						}
				  }
				  $average_time = $this->avg_time($manager_id);
				  foreach($result as $k=>$nval){
						foreach($average_time as $avg_key=>$avg_val){
							if($nval->UserID == $avg_key){
							$nval->avg_time=$avg_val; 
							};
						}
				  }
				
				//return $result;
				$success_case = $this->total_success_case_by_manager($manager_id);
				//echo '<pre>';
				//print_r($result);
				
				//print_r($ret);
				foreach($result as $k1=>$newval){
						foreach($success_case as $success_key=>$success_val){
							if($newval->UserID == $success_key){
							$newval->success_rate=$success_val; 
							};
						}
				  }
				  return $result;
				 // print_r($result);
				//die;
			}
			/*avnish*/
			function avg_time($manager_id){
				
				$arr=array();
				foreach($manager_id as $val){
					$newvalue=0;
					$result = $this->get_manager_close_case_list($val);
					foreach($result as $k=>$value){
						$newvalue=$value+$newvalue;
					}
		
					if(!empty($result)){
					$arr[$val] = $newvalue/sizeof($result);
					}
				} 
				return $arr;
			}
			
			public function get_manager_close_case_list($id)
			{
				$total_days = array();
				$session_data = $this->session->userdata('logged_in');
				$this->db->select('DateCommenced,EndDate');
				$this->db->from('tblcase');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('tblcase.CaseStatus',3);
				$this->db->where('tblcase.ManagerAssigned', $id);
				$query = $this->db->get(); 
				$res = $query->result();
				
				foreach($res as $val){
					$start_date = strtotime($val->DateCommenced);
					$end_date = strtotime($val->EndDate);
					$datediff = $end_date-$start_date;
					$total_days[] = floor($datediff/(60*60*24));	
				}
				return $total_days;
			}
			//to gate success rate of manager case
            public function total_success_case_by_manager($manager_id){
				$session_data = $this->session->userdata('logged_in');
				
				foreach($manager_id as $id){
					$this->db->select('count(*) as total_case');
					$this->db->from('tblcase');
					$this->db->where('tblcase.ManagerAssigned', $id);
					$query = $this->db->get(); 
					$res1[$id] = $query->row();
					if($res1):
						$this->db->select('count(*) as total_solved_case');
						$this->db->from('tblcase');
						$this->db->where('tblcase.CaseStatus',3); 
						$this->db->where('tblcase.ManagerAssigned', $id);
						$query = $this->db->get(); 
						$res2[$id] = $query->row();
					endif;
				}
				 foreach($res1 as $k1=>$val1){
					foreach($res2 as $k2=>$val2){
						if($k1==$k2):
							$val1->total_solved_case=$val2->total_solved_case;
						endif;
					}
				}

				foreach($res1 as $key=>$newval){
				  $tc = ($newval->total_case == 0)?1:$newval->total_case;
					$res3[$key] = ($newval->total_solved_case/$tc)*100;
				}
				
				foreach($res1 as $finalKey=>$finalval){
					foreach($res3 as $k3=>$val3){
						if($finalKey==$k3):
							$finalval->success_rate=$val3;
						endif;
					}
				}
				return $res1;
			}
			/*end*/
			function get_manager($id)
			{
				  $this->db->select('*');
				  $this->db->from('register_user');
				  $this->db->where('UserID',$id);
				  $query=$this->db->get();
				  return $query->result();
			}
			
			function delete_manager($id)
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
			
			public function get_Active_case_list($id)
			{
				
				$session_data = $this->session->userdata('logged_in');
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',2);
				$this->db->where('tblcase.ManagerAssigned', $id);
				$query = $this->db->get();
				return $query->result();
				/* $session_data = $this->session->userdata('logged_in');
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',2);
				$this->db->where('tblcase.ManagerAssigned', $session_data['UserID']);
				$query = $this->db->get();
				return $query->result(); */
				
				
			      /* $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CaseStatus',2);
				  $this->db->where('ManagerAssigned',$id);
				  $query=$this->db->get();
				  return $query->result(); */
				
			}
			
			public function get_close_case_list($id)
			{
			   
                $session_data = $this->session->userdata('logged_in');
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',3);
				$this->db->where('tblcase.ManagerAssigned', $id);
				$query = $this->db->get();
				return $query->result();
				//return $this->db->last_query();

				/* $session_data = $this->session->userdata('logged_in');
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',3);
				$this->db->where('tblcase.ManagerAssigned', $session_data['UserID']);
				$query = $this->db->get();
				return $query->result(); */
				
				
				/*   $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CaseStatus',3);
				  $this->db->where('ManagerAssigned',$id);
				  $query=$this->db->get();
				  return $query->result(); */
			}
			
			// Edit manager profile ------------------
			public function edit_manager_profile(){
				$session_data = $this->session->userdata('logged_in');	
				$data = array(
				'FirstName' => $this->input->post('FirstName'),
				'Address' => $this->input->post('Address'),
				'PhoneNumber' => $this->input->post('PhoneNumber'),
				'Email' => $this->input->post('Email'),
				'biography' => $this->input->post('biography'),
				'areasofexpertise' => $this->input->post('areasofexpertise'),
				  'Password' => $this->input->post('Password'),
				'upload_cv' => $this->input->post('file1'));
				$this->db->where('UserID', $session_data['UserID']);
				$this->db->update('register_user', $data);
			}
			// delete
			function delete_record($id){
				
				$data = array();
				$data['ManagerAssigned']=0;
				$data['CaseStatus']=1;
				$this->db->where('CaseID', $id);
				$this->db->update('tblcase', $data);
				if($this->db->affected_rows()){
				  return 1;
				}else{return 0;}
			}
			
			public function getadminlist(){
			   $this->db->select('FirstName,Email');
			   $query = $this->db->get_where('register_user',array('User_type'=>1));
			   return $query->result();
			}
       
		  public function Duplicate_email($email)
			{
				$this->db->where('Email', $email);
				$query = $this->db->get('register_user');
				if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
			}

			function uploaddata($file,$userid,$type){
				 if (!empty($_FILES)) {
					$tempFile = $file['tmp_name'];                    
				  // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
					 if($type == 1){
					 $targetPath = getcwd(). '/media/profile_img/manager/';
					 }else if($type == 2){
					   $targetPath = getcwd().'/media/profile_img/manager/manager_cv/';
					 }
				 // Adding timestamp with image's name so that files with same name can be uploaded easily.
					 if($file['name'] !== ''){
					$file_name=time().$userid.uniqid().'-'. $file['name'];
					$refrenceid =  time().$userid.uniqid();
					$fname =  $targetPath.$file_name;  
					$ftype=$file["type"];
					$fsize=($file["size"] / 1024);
					 $arr= array('f_name'=>$file_name,
						'f_size'=>$fsize,
						'f_type'=>$ftype,
						'd_date'=>date('Y-m-d h:i:s'),
						'refrenceid'=>$refrenceid,
						);
					$this->db->insert('file_upload', $arr);
					move_uploaded_file($tempFile,$fname); 
					return $file_name;
					}
				  }
			 }  


	
   }



?>