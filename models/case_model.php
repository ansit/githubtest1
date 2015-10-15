<?php

   class Case_model extends CI_Model {
	var $Question_ids=array();
	var $point=array();
	var $t_a=array();
	var $test_id=0;
    function __construct()
    {
        parent::__construct();
		//error_reporting(0);
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
			
			function checkExistance($userEmail)
			{
		
				$this -> db -> select('user_id');
				$this -> db -> from('users');
				$this -> db -> where('user_email = ' . "'" . $userEmail . "'");
				$this -> db -> where('status = 1');
				$query = $this -> db -> get();
				if($query -> num_rows() == 1)
				{
				return $query->row()->user_id;
				}
				else
				{
				return false;
				}
			}
			
	       function insertActivationcode($userEmail,$activation_id)
		    {
				 $data = array('pswd_reset_code' => $activation_id);
				 $this -> db -> where('user_email = ' . "'" . $userEmail . "'");
				 $res= $this->db->update('users', $data); 
				 if($res)
				 {
					 return 1;
				 }
				  else 
				  {
					  return 0;
				  }
		   }
		   
		    public function resetpass($pass,$resetcode)
			{
				$data = array('user_password ' => $pass,'pswd_reset_code ' => '');
				$this -> db -> where('pswd_reset_code = ' . "'" . $resetcode . "'");
				$res= $this->db->update('users', $data); 
			    if($res)
				 {
					 return 1;
				 }
				  else 
				  {
					  return 0;
				  }
			}
			
			
			public function get_case_sequence_list()
			{
			    $this -> db -> select('CaseSequenceID,SequenceName');
				$this -> db -> from('tblcasesequence');
				$query = $this -> db -> get();
				return $query->result();
			}
			
			public function get_edit_module($id){
				$this->db->select('*');
				$this->db->from('tblcasesequence');
				$this ->db->where('CaseSequenceID',$id );
				$query = $this->db->get();
				return $query->result();
			}
			
			public function update_module($id){
				$data = array();
				$data['SequenceName'] = $this->input->post('case_sequence_name');
				$this->db->where('CaseSequenceID',$id );
				$this->db->update('tblcasesequence',$data); 
			}
			
			public function get_input_module()
			{
			    $this -> db -> select('*');
				$this -> db -> from('case_sequence');
				$query = $this -> db -> get();
				return $query->result();
			}
			
			//public function get_case($id='')
			//{
			//    $this -> db -> select('*');
			//	$this -> db -> from('tblcase');
			//	 $this -> db -> where('CaseID',$id );
			//	$query = $this -> db -> get();
			//	return $query->result();
			//}

		public function get_case($caseid='',$userid='')
			{
			   if($userid == ''){
			    $this -> db -> select('*');
				$this -> db -> from('tblcase');
				 $this -> db -> where('CaseID',$caseid );
				$query = $this -> db -> get();
				return $query->result();
			   }else{
				  $this->db->select('fpid,spid');
				  $query = $this->db->get_where('tblcase',array('CaseID'=>$caseid));
				  $row = $query->row();
				  if($query->num_rows()> 0){
					 if($userid == $row->fpid){
						$partycolumns = 'CaseTitle,CaseType,AmountInDispute,DateCommenced, FirstParty as partyname, AddressOfFirstParty as address, FirstPArtyPhone as phone,FirstPartyEmail as email ,AttorneyName as attname,AttorneyEmail as attemail, first_party_firm_name as firmname,AttorneyAddress as attaddress,AttorneyPhone as attphone';
					 }else if($userid == $row->spid) {
						 $partycolumns = 'CaseTitle,CaseType,AmountInDispute,DateCommenced,SecondParty as partyname, AddressOfSecondParty as address,SocendPArtyPhone as phone, SocendPartyEmail as email, second_party_attorney as attname, second_party_attorney_email as attemail,second_party_firm_name as firmname,second_party_attorney_address as attaddress,second_party_attorney_phone as attphone';
					 }
					 $this->db->select($partycolumns);
					 $query = $this->db->get_where('tblcase',array('CaseID'=>$caseid));
					 return $query->result();
				  }else{
					 return 0;
				  }
			   }
			}			


			
			public function insert_case_sequence($data)
			{
			
			    $this->db->set($data);
                $result = $this->db->insert('tblcasesequence');
				return $insert_id = $this->db->insert_id();
				
			}
			
			public function insert_claim($data)
			{
			
			    $this->db->set($data);
                $result = $this->db->insert('tbl_claim');
				return $insert_id = $this->db->insert_id();
				
			}
			
			public function update_claim($id,$data)
			{
			    $this -> db -> where('claim_id',$id );
				$res = $this->db->update('tbl_claim',$data); 
			  
			}
			
			public function update_qustion($id,$data)
			{
			    $this -> db -> where('QuestionID',$id );
				$res = $this->db->update('tblquestion_step_casesequence',$data); 
			  
			}
			
			
			
			
			public function insert_qustion($data)
			{
			
			    $this->db->set($data);
                $result = $this->db->insert('tblquestion_step_casesequence');
				return $insert_id = $this->db->insert_id();
				
			}
			
			
			
			public function insert_case_module($data)
			{
			
			    $this->db->set($data);
                $result = $this->db->insert('tblstep_casesequence');
				return $insert_id = $this->db->insert_id();
				
			}
			
			public function update_case_module($id,$data)
			{
			    $this -> db -> where('StepID',$id );
				$res = $this->db->update('tblstep_casesequence',$data);
				//echo $this->db->last_query();	
			}
			
			
			
			
			public function get_module_list()
			{
			    $this -> db -> select('*');
				$this -> db -> from('case_sequence');
				$query = $this -> db -> get();
				return $query->result();
		   	 
			}
			
			public function get_module_data($id)
			{
			    $this -> db -> select('*');
				$this -> db -> from('tblstep_casesequence');
				$this -> db -> where('StepID',$id);
				$query = $this -> db -> get();
				return $query->result();
		   	  
				
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
				  $this->db->order_by('UserJoinedDate','DESC');
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
			
			
			function delete_question($id)
			{
				 $rss = $this->db->delete('tblquestion_step_casesequence', array('QuestionID' => $id));	
				 if($rss)
				 {
					 return 1;
				 }
				 else
				 {
					 return 0;
				 }
				 
			}
			
			function get_manager_list()
			{
				  $this->db->select('UserID,FirstName');
				  $this->db->from('register_user');
				  $this->db->where('User_type',2);
				  $this->db->where('IsActive',1);
				  $this->db->order_by('UserJoinedDate','DESC');
				  $query=$this->db->get();
				  return $query->result();
			}
			
			public function insert_cases($data)
			{
			    $this->db->set($data);
                $result = $this->db->insert('tblcase');
				//echo $this->db->last_query();
				return $insert_id = $this->db->insert_id();
				
			}
			
			public function update_case($id,$data)
			{
			    $this -> db -> where('CaseID',$id );
				$res = $this->db->update('tblcase',$data); 
				//echo $this->db->last_query();
			}
			public function delete_case($id)
			{
			   $rss = $this->db->delete('tblcase', array('CaseID' => $id));
			   if($rss)
			   {
				 return 1;   
			   }
			   else
			   {
				 return 0;
			   }
			}
			
			
			public function get_Active_case_list($user_id,$user_type)
			{
			   $query = $this->db->query("SELECT * FROM tblcase WHERE IsActive = 1 AND (fpid = '$user_id' OR spid = '$user_id') AND User_type = '$user_type' AND CaseStatus = 2");
			      //$this->db->select('*');
				  //$this->db->from('tblcase');
				  //$this->db->where('IsActive',1);
				  //$this->db->where('fpid',$user_id);
				  //$this->db->or_where('spid',$user_id);				  
				  //$this->db->where('User_type',$user_type);
				  //$this->db->where('CaseStatus',2);
				  //$query=$this->db->get();
				  //return $this->db->last_query();
				  return $query->result();
			}
			public function get_admin_Active_case_list()
			{
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->join('assign_case_sequence', 'tblcase.CaseID = assign_case_sequence.Case_ID','left');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('tblcase.CaseStatus',2);
				$query = $this->db->get();
				return $query->result();



				 /* $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CaseStatus',2);
				  $query=$this->db->get();
				  return $query->result(); */
			}
			
			
			
			public function get_new_case_list($user_id,$user_type)
			{
			   $query = $this->db->query("SELECT * FROM tblcase WHERE IsActive = 1 AND (fpid = '$user_id' OR spid = '$user_id') AND User_type = '$user_type' AND CaseStatus = 1");
			      //$this->db->select('*');
				  //$this->db->from('tblcase');
				  //$this->db->where('IsActive',1);
				  //$this->db->where('fpid',$user_id);
				  //$this->db->or_where('spid',$user_id);
				  //$this->db->where('User_type',$user_type);
				  //$this->db->where('CaseStatus',1);
				  //$query=$this->db->get();
				  return $query->result();
			}
			
			public function get_admin_new_case_list()
			{
			    $this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',1);
				$query = $this->db->get();
				return $query->result(); 

				 /* $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CaseStatus',1);
				  $query=$this->db->get();
				  return $query->result(); */
			}
			/*avnish */
			public function get_manager_Active_case_list($uid)
			{
			   /*  $this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('tblcase.CaseStatus',1);
				$this->db->where('tblcase.ManagerAssigned',$uid);
				$query = $this->db->get();
				return $query->result();  */
				$this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->join('assign_case_sequence', 'tblcase.CaseID = assign_case_sequence.Case_ID','left');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('tblcase.CaseStatus',2);
				$this->db->where('tblcase.ManagerAssigned',$uid);
				$query = $this->db->get();
				return $query->result();

			}
			public function get_manager_close_case_list($uid)
			{
			     /*  $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('ManagerAssigned',$uid);
				  $this->db->where('CaseStatus',3);
				  $query=$this->db->get();
				  return $query->result(); */
				  $this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('ManagerAssigned',$uid);
				$this->db->where('CaseStatus',3);
				$query = $this->db->get();
				return $query->result();
			}
			/*end*/
			public function get_close_case_list($user_id,$user_type)
			{
			      $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CreatedBy',$user_id);
				  $this->db->where('User_type',$user_type);
				  $this->db->where('CaseStatus',3);
				  $query=$this->db->get();
				  return $query->result();
			}
			
			public function get_admin_close_case_list()
			{
			     $this->db->select('*');
				$this->db->from('register_user');
				$this->db->join('tblcase', 'register_user.UserID = tblcase.CreatedBy','inner');
				$this->db->where('tblcase.IsActive', 1);
				$this->db->where('CaseStatus',3);
				$query = $this->db->get();
				return $query->result();

				 /* $this->db->select('*');
				  $this->db->from('tblcase');
				  $this->db->where('IsActive',1);
				  $this->db->where('CaseStatus',3);
				  $query=$this->db->get();
				  return $query->result(); */
			}
			
			// add more submit module ##########################################################################
		
		
			function add_test($id){
			$side = $this->input->post('side_authority');
			$side = implode('@',$side);
			$data = array(
			'Main_case_sequence_ID' => $this->input->post('main_case_sequence'),
			'input_module' => $this->input->post('input_module'),
			'side_authority' =>$side);
			if($id>0){
			  
			$this->db->where("Case_Sequence_ID",$id);
			$this->db->update("case_sequence",$data);
			$this->test_id=$id;
			}else{
				
			$this->db->insert("case_sequence",$data);
			$this->test_id=$this->db->insert_id();;
			}
			$this->add_question($this->test_id);

			}


			function add_question($id){

			$question=$this->get_array_value($this->input->post("question",TRUE));
			$IDQuest=$this->get_array_value($this->input->post("IDQuest",TRUE));
			for($r=0;$r<count($question);$r++)
			{
			$data['Case_Sequence_ID']=$id;
			$data['Question']=$question[$r];

			if($IDQuest[$r]>0){
			$this->db->where("IDQuest",$IDQuest[$r]);
			$this->db->update("test_quest",$data);
			$this->Question_ids[]=$IDQuest[$r];
			}
			else{
			$this->db->insert("test_quest",$data);
			$this->Question_ids[]=$this->db->insert_id();
			}
			}
			$this->add_test_alternatives();
			}
			
			
			function get_array_value($post_valeu){
				$array_value=array();
					foreach($post_valeu as $data){
						$array_value[]= $data;
					}
					return  $array_value;
			}

			function add_test_alternatives() {
			   $i = 0;
				$t_a=$this->get_array_value($_POST["t_a"]);
				//$options=$this->get_array_value($_POST["options"]);
				$iDAlternativa=$this->get_array_value($_POST["iDAlternativa"]);
				$options  = $this->input->post('options');
				$t=1;
				for($r=0;$r<count($this->Question_ids);$r++){
					$s['IDQuest']=$this->Question_ids[$r];
					$s['Case_Sequence_ID'] =$this->test_id;
					$s['t_a'] =$t_a[$r];
					//$s['option_list'] =$options[$r][0]."@".$options[$r][1]."@".$options[$r][2]."@".$options[$r][3];
					$s['option_list'] =$options[$s['IDQuest']][0]."@".$options[$s['IDQuest']][1]."@".$options[$s['IDQuest']][2]."@".$options[$s['IDQuest']][3];

				if($iDAlternativa[$r]>0){
					
					$this->db->where("iDAlternativa",$iDAlternativa[$r]);
					$this->db->update("test_alternatives",$s);
				}else{
					$options=$this->get_array_value($this->input->post("opt"));
					$options=array_chunk($options, 4);
					if($s['t_a'] == "Checkbox" || $s['t_a'] == "Radio"){
					$s['option_list'] =$options[$i][0]."@".$options[$i][1]."@".$options[$i][2]."@".$options[$i][3];
					$i++;
					}else{
					 $s['option_list'] = "@@@";
					}
					$this->db->insert("test_alternatives",$s);
					//echo $this->db->last_query();
				}
				$t++;
				}
			}
			
			public function get_case_sequence_all($id){
				$this->db->select('*');
				$this->db->from('case_sequence');
				$this->db->where('Case_Sequence_ID', $id);
				$query = $this->db->get();
				return $query->result();
			
			}
			// question
			public function get_qustion($id){
				$role1="";
				$query = $this->db->query("select * from test_quest 
				inner join  test_alternatives on test_alternatives.IDQuest = test_quest.IDQuest  
				where   test_quest.Case_Sequence_ID='".$id."'");
				foreach($query->result() as $role)
				{
				$role1[]=$role;
				}

				return $role1;
			
			}
			
			public function get_input($q){
				$role1="";
				$q = intval($_GET['q']);
				$query = $this->db->query("select * from test_quest 
				inner join  test_alternatives on test_alternatives.IDQuest = test_quest.IDQuest  
				where test_quest.Case_Sequence_ID='".$q."'");
				
				foreach($query->result() as $role)
				{
				$role1[]=$role;
				}

				return $role1;
			
			}
			
			public function get_value($q){
				//$role1="";
				//$q = intval($_GET['q']);
				//$query = $this->db->query("select * from tblcasesequence 
				//inner join  case_sequence on tblcasesequence.CaseSequenceID = case_sequence.Main_case_sequence_ID  
				//where tblcasesequence.CaseSequenceID='".$q."'");
				$query = $this->db->select('Case_Sequence_ID,input_module')->from('case_sequence')->where('Main_case_sequence_ID',$q)->get();
			   $json_respose = array();
			   foreach($query->result() as $row):
			   $res['Case_Sequence_ID'] = $row->Case_Sequence_ID;
			   $res['input_module'] = $row->input_module;
			   array_push($json_respose,$res);
			   endforeach;
			   
			   return json_encode($json_respose);
			
			}
			
			// responce tab start here .............
			public function add_responce($id){
				
				$side = $this->input->post('side_authority');
				$side = implode('@',$side);
				$data = array(
				'Main_case_sequence_ID' => $this->input->post('main_case_sequence'),
				'input_module' => $this->input->post('input_module'),
				'side_authority' =>$side);
				if($id>0){
				  
				$this->db->where("responce_ID",$id);
				$this->db->update("responce_sequence",$data);
				$this->test_id=$id;
				}else{
				$this->db->insert("responce_sequence",$data);
				$this->test_id=$this->db->insert_id();;
				}
				$this->responce_question($this->test_id);
			}
			public function responce_question($id){
				$question=$this->get_array_value($_POST["question"]);
				$IDQuest=$this->get_array_value($_POST["IDQuest"]);
				for($r=0;$r<count($question);$r++)
				{
				$data->responce_ID=$id;
				$data->Question=$question[$r];

				if($IDQuest[$r]>0){
				$this->db->where("IDQuest",$IDQuest[$r]);
				$this->db->update("responce_quest",$data);
				$this->Question_ids[]=$IDQuest[$r];;
				}
				else{
				$this->db->insert("responce_quest",$data);
				$this->Question_ids[]=$this->db->insert_id();;
				}
				}
				$this->responce_alternatives();
				
			}
			
			public function responce_alternatives(){
				$t_a=$this->get_array_value($_POST["t_a"]);
				$options=$this->get_array_value($_POST["options"]);
				$iDAlternativa=$this->get_array_value($_POST["iDAlternativa"]);
				$t=1;
				$options=array_chunk($options, 4);
				for($r=0;$r<count($this->Question_ids);$r++){
					$s->IDQuest=$this->Question_ids[$r];
					$s->responce_ID=$this->test_id;
					$s->t_a =$t_a[$r];
					$s->option_list=$options[$r][0]."@".$options[$r][1]."@".$options[$r][2]."@".$options[$r][3];

				if($responceid[$r]>0){
					$this->db->where("responceid",$responceid[$r]);
					$this->db->update("responce_alternatives",$s);
				}else{
					
					$this->db->insert("responce_alternatives",$s);
				}
				$t++;
				}
				
			}
			
			//ans list case view for module
			
			public function get_ans_list($id){
				
				$query = "SELECT * FROM  assign_case_sequence 
				INNER JOIN  case_sequence ON assign_case_sequence.Main_case_sequence_ID = case_sequence.Main_case_sequence_ID 
				INNER JOIN  test_quest ON case_sequence.Case_Sequence_ID = test_quest.Case_Sequence_ID 
				INNER JOIN  test_alternatives ON test_quest.IDQuest = test_alternatives.IDQuest Where assign_case_sequence.Case_ID='".$id."' and case_sequence.side_authority like '1%'";
				$query = $this->db->query($query);
				return $query->result();
			}
			
			public function get_ans_list_sec($id){
				
				$query = "SELECT * FROM  assign_case_sequence 
				INNER JOIN  case_sequence ON assign_case_sequence.Main_case_sequence_ID = case_sequence.Main_case_sequence_ID 
				INNER JOIN  test_quest ON case_sequence.Case_Sequence_ID = test_quest.Case_Sequence_ID 
				INNER JOIN  test_alternatives ON test_quest.IDQuest = test_alternatives.IDQuest Where assign_case_sequence.Case_ID='".$id."' and case_sequence.side_authority like '%2%'";
				$query = $this->db->query($query);
				return $query->result();
			}
			
			//ans list case view for responce 
			public function get_responce_list($id , $id2){
				$query = "SELECT * FROM  responce_sequence
				INNER JOIN  responce_quest ON responce_sequence.responce_ID = responce_quest.responce_ID 
				INNER JOIN   responce_alternatives ON responce_quest.IDQuest = responce_alternatives.IDQuest
				Where Main_case_sequence_ID='".$id2."' and  responce_sequence.side_authority like '1%'";
				$query = $this->db->query($query);
				return $query->result();
			}
			
			public function get_responce_list_sec($id){
				
				$query = "SELECT * FROM  responce_sequence
				INNER JOIN  responce_quest ON responce_sequence.responce_ID = responce_quest.responce_ID 
				INNER JOIN   responce_alternatives ON responce_quest.IDQuest = responce_alternatives.IDQuest
				Where Main_case_sequence_ID='".$id."' and  responce_sequence.side_authority like '%2%'";
				$query = $this->db->query($query);
				return $query->result();
			}
			
			public function casestat($name,$userid,$type,$caseid,$status,$mid){
			   $this->load->model('notification_model');
			   
			   $obj = 3;
			   $objid= $caseid;
			   $role = $type;
			   if($type== 2 && $status == 1){
				  //$no =1;
				  $action = 2;
				  $comment = "Manager ".$name." has rejected case <strong>CaseID ".$caseid."</strong>";
			   
			   }else if($type == 1 && $status == 2){
				  //$no =2;
				  $action = 2;
				  $comment = "Admin ".$name." has assigned the case <strong>CaseID".$caseid."</strong> to ".$this->notification_model->getnamebyid($mid);
			   
			   }else if($type ==2 && $status == 2){
				 //$no =3;
				  $action = 2;
				  $comment = "Manager ".$name." has update the case <strong>CaseID".$caseid."</strong> to ".$this->notification_model->getnamebyid($mid);				  
			   }else if($type== 1 && $status == 1){
				  //$no =4;
				  $action = 2;
				  $comment = "Admin ".$name." has reverted the case <strong>CaseID ".$caseid."</strong>";
			   
			   }
			   
			   else if($type== 1 && $status == 3){
				  //$no =5;
				  $action = 2;
				  $comment = "Admin ".$name." has Change the case Status <strong>CaseID ".$caseid."</strong>";
			   
			   }
			    else if($type== 1 && $status == ''){
				  //$no =6;
				  $action = 2;
				  $comment = "Admin ".$name." has assigned the case <strong>CaseID ".$caseid."</strong>";
			   
			   }
			   else if($type== 2 && $status == '3'){
				  //$no =7;
				  $action = 2;
				  $comment = "Admin ".$name." has assigned the case <strong>CaseID ".$caseid."</strong>";
			   
			   }
			   
			  else if($type== 2 && $status == ''){
				  //$no =8;
				  $action = 2;
				  $comment = "Admin ".$name." has update the case <strong>CaseID ".$caseid."</strong>";
			   
			   }
				//echo $type;
				//echo $no;
				//exit;
			   $this->notification_model->addnotification($userid,$obj,$caseid,$type,$action,$comment);
			   
			}
			
			public function delcasenotification($name,$userid,$role,$case_id){
			   $comment= 'Admin '.$name.' deleted the case <strong>CaseID '.$case_id.'</strong>';
			   $this->notification_model->addnotification($userid,3,$case_id,$role,3,$comment);
			   
			}
			
			public function getmanagercomment($caseid,$partyno){
			   $this->db->select('*');
			   $this->db->from('tab_comment');
			   $this->db->where('caseid',$caseid);
			   $this->db->where('partyno',$partyno);
			   $query = $this->db->get();
			   return $query->result();
			   
			}
			
			public function delmanacom($id){
			   $this->db->delete('tab_comment',array('commentid'=>$id));
			   if($this->db->affected_rows() > 0 ){
				  return 1;
			   }else{return 0;}
			   
			}
			
			public function allcasestat(){
			   $query = $this->db->get_where('tab_status',array('active'=>1));
			   return $query->result();
			}
			
			public function chgcasestate($caseid,$stepno,$partyno,$status,$review){
			   $query = $this->db->get_where('tab_casestep',array('caseid'=>$caseid,'stepno'=>$stepno,'partyno'=>$partyno));
			   if($query->num_rows() > 0){
				  $row = $query->row();
				  if($status == $row->status &&  $review == $row->is_reviewed){
					 $res = 2;
				  }else{
					 $data = array('status'=>$status,'is_reviewed'=>$review);
					 $this->db->update('tab_casestep',$data,array('caseid'=>$caseid,'stepno'=>$stepno,'partyno'=>$partyno));
					 if($this->db->affected_rows() > 0){$res = 1;}else{$res = 0;}
				  }
			   }else{
				  $data = array('caseid'=>$caseid,'stepno'=>$stepno,'partyno'=>$partyno,'status'=>$status);
				  $this->db->insert('tab_casestep',$data);
				  if($this->db->affected_rows() > 0){$res =1;}else{$res =0;}
			   }
			   echo $res;
			   
			}
			
			public function stepdata($caseid,$partyno,$stepno){
			   //$query = $this->db->get_where('tab_casestep',array('caseid'=>$caseid,'stepno'=>$stepno,'partyno'=>$partyno));
			   $query = $this->db->query('SELECT tab_casestep.is_reviewed, tab_casestep.status, tab_status.status_text FROM tab_casestep JOIN tab_status ON tab_casestep.status = tab_status.id AND tab_casestep.caseid = "'.$caseid.'" AND partyno ="'.$partyno.'" AND  tab_casestep.stepno ="'.$stepno.'" ');
			   if($query->num_rows() > 0 ){
			   return $query->row();
			   
			   }
			}
			
			public function getpartyemail($caseid,$partyno){
			   if($partyno == 1){
				  $partemail = 'FirstPartyEmail AS email';
			   }else{
				  $partemail = 'SocendPartyEmail AS email';
			   }
			   $this->db->select($partemail)->from('tblcase')->where('CaseID',$caseid);
			   $query = $this->db->get();
			   return $query->row();
			}
			
			public function getcasestat($caseid,$userid){
			   //return "caseid ".$caseid;
			   $sql = $this->db->get_where('tab_casestep',array('caseid'=>$caseid));
			   if($sql->num_rows() > 0){
			   
				  $this->db->select('fpid,spid');
				  $query = $this->db->get_where('tblcase',array('CaseID'=>$caseid));
				  $row =$query->row();
				  if($row->fpid == $userid){
				  $partyno = 1;
				  }else if($row->spid == $userid){
					 $partyno = 2;
				  }
				  $this->db->order_by("stepno", "ASC");
				  $query = $this->db->get_where('tab_casestep',array('caseid'=>$caseid,'partyno'=>$partyno));
				  return $query->result();
			   }else{
				  return 0;
			   }
			}
			
			
			function getlastcaseseqid($caseid){
			   //$query = $this->db->query("SELECT case_sequence.Case_Sequence_ID FROM case_sequence JOIN assign_case_sequence ON case_sequence.Main_case_sequence_ID = assign_case_sequence.Main_case_sequence_ID AND assign_case_sequence.Case_ID ='$caseid' ORDER BY case_sequence.Case_Sequence_ID DESC LIMIT 1");
			   $query = $this->db->query("SELECT case_sequence.Case_Sequence_ID FROM case_sequence JOIN assign_case_sequence ON case_sequence.Main_case_sequence_ID = assign_case_sequence.Main_case_sequence_ID AND assign_case_sequence.Case_ID ='$caseid' ORDER BY case_sequence.Case_Sequence_ID DESC");
			//   if($query->num_rows() > 0 ){
			//   $row = $query->row();
			//   return $row->Case_Sequence_ID;
			//   }else{
			//	  return false;
			//   }
			return $query->result();
			
			}
			
			
			public function getquesbycaseid($caseid){
			   $caseseqid = $this->getlastcaseseqid($caseid);
			   //print_r($caseseqid);
			   //exit;
			   $getqu = array();
			   foreach($caseseqid as $caseseqid){
			   $cqid = $caseseqid->Case_Sequence_ID;
			   $query = $this->db->query("select * from test_quest inner join test_alternatives on test_alternatives.IDQuest = test_quest.IDQuest where test_quest.Case_Sequence_ID= '$cqid'");
			   //echo $this->db->last_query();
			   $json_respose = array();
			   foreach($query->result() as $row):
			   $res['IDQuest'] = $row->IDQuest;
			   $res['Case_Sequence_ID'] = $row->Case_Sequence_ID;
			   $res['side_auth'] = $this->getside($row->Case_Sequence_ID);
			   $res['Question'] = $row->Question;
			   $res['iDAlternativa'] = $row->iDAlternativa;
			   $res['option_list'] = $row->option_list;
			   $res['t_a'] = $row->t_a;
			   array_push($json_respose,$res);
			   
			   //print_r($json_respose);
			   endforeach;
			   array_push($getqu,$json_respose);
			   }
			   
			   
			   //return $json_respose;
			   return $getqu;
			}
			
			function getside($id){
			   $query = $this->db->select('side_authority')->where('Case_Sequence_ID',$id)->get('case_sequence');
			   return $query->row();
			}
			
			public function get_manager_comment_for_admin($caseid,$partyno){
			   $this->db->select('*');
			   $this->db->from('tab_comment');
			   $this->db->where('caseid',$caseid);
			   $this->db->where('partyno',$partyno);
			   $query = $this->db->get();
			  //echo $this->db->last_query();
			   
			   return $query->result();
			   
			}
			
			
			public function getmychkbox($ind,$data){
			   $input = preg_quote($ind, '~'); // don't forget to quote input string!
			   //echo "data<br>";
			   //print_r($data);
			   $result = preg_grep('~' . $input . '~', $data);
			   return str_replace($input.'q','',implode($result,"@"));
			}
			
			
			public function getansbycaseid($caseid){
			   $query = $this->db->get_where('caseanswer',array('caseid'=>$caseid));
			   if($query->num_rows() > 0){
			   return $query->result();
			   }else{
				  return 0;
			   }
			}
			
			public function getfileans($caseid,$userid){
			   $query = $this->db->query("SELECT caseanswer.anstxt, file_upload.f_name from caseanswer LEFT JOIN file_upload ON caseanswer.anstxt = file_upload.refrenceid WHERE caseanswer.caseid = '$caseid' AND caseanswer.userid='$userid'  ORDER BY caseanswer.IDQuest ASC");
			   if($query->num_rows() > 0){
			   return $query->result();
			   }else{
				  return 0;
			   }
			}   


			function delete_case_sequence($id){
                 $rss = $this->db->delete('tblcasesequence', array('CaseSequenceID' => $id));
                
                 if($rss)
                 {
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }
                 
            }

      function get_manager_list_for_admin($id)
			{
			   //error_reporting(0);
				 
			   $this->db->select('FirstName');
				$this->db->from('register_user');
				$this->db->join('tblcase','tblcase.ManagerAssigned = register_user.UserID','inner');
				$this->db->where('tblcase.CaseID',$id);
				$query = $this->db->get();
				
				return $query->result();
   				 
			}
			
			public function stepdata_for_admin($caseid){
			   //$query = $this->db->get_where('tab_casestep',array('caseid'=>$caseid,'stepno'=>$stepno,'partyno'=>$partyno));
			   $query = $this->db->query('SELECT tab_casestep.is_reviewed, tab_casestep.status, tab_status.status_text FROM tab_casestep JOIN tab_status ON tab_casestep.status = tab_status.id where tab_casestep.caseid = "'.$caseid.'" ');
			 
			//echo $this->db->last_query();
			 return $query->row();
			}

	  public function addresponse($userid,$caseid){
			   $alldata = $this->input->post();
			   $idqust = array();
			   $idalternative = array();
			   $optionlist = array();
			   $ta = array();
			   $anstxt = array();
			   $idqust = $this->input->post('IDQuest');
			   $idalternative = $this->input->post('iDAlternativa');
			   $optionlist = $this->input->post('option_list');
			   $ta = $this->input->post('ta');
			   $anstxt = $this->input->post('anstxt');
			   $ansrad = $this->input->post('ansrad');
			   $i = 0;
			   $this->db->trans_begin();
			   foreach($idqust as $idqust){
				  if($ta[$i] == "Checkbox"){
					$atxt = $this->getchkbox($alldata['anschk'.$idqust]);
				  }else if($ta[$i] == "Radio"){
					$atxt = $alldata['ansrad'.$idqust];
				  }else if($ta[$i] == "file"){
					 $atxt = $this->uploadimg($userid,$caseid,$idqust,$_FILES['file'.$idqust]);
				  }else if($ta[$i] == "Text"){
					$atxt = $alldata['anstxt'.$idqust][0];
				  }

				  $data = array('userid'=>$userid,'caseid'=>$caseid,'IDQuest'=>$idqust,'t_a'=>$ta[$i],'iDAlternativa'=>$idalternative[$i],'optionlist'=>$optionlist[$i],'anstxt'=>$atxt);

				  $op = $this->checkans($caseid,$idqust,$userid);
				  if($op == 0){
				  $this->db->insert('caseanswer',$data);
				  }else{
					 $this->db->update('caseanswer',$data,array('caseid'=>$caseid,'userid'=>$userid,'IDQuest'=>$idqust));
				  }
				  $i++;
			   }
			   if ($this->db->trans_status() === FALSE){
					  $this->db->trans_rollback();
					  return 0;
				  }else{
					  $this->db->trans_commit();
					  return 1;
				  }
			   
			}


			public function getchkbox($arr){
			   return implode($arr,"@");
			}
			
			
			function checkans($caseid,$idqust,$userid){
			   $query = $this->db->get_where('caseanswer',array('caseid'=>$caseid,'IDQuest'=>$idqust,'userid'=>$userid));
				  if($query->num_rows() > 0){
					 return 1;
				  }else{
					 return 0;
				  }
			}
			
			
			
   

function uploadimg($userid,$caseid,$qid,$file){
	 if (!empty($_FILES)) {
	    $tempFile = $file['tmp_name'];
		//checking extension
		$array = explode('.', $file['name']);
		$extension = end($array);
		$allow_ext = array('jpg','png','jpeg','gif','bmp');
		if(in_array($extension,$allow_ext)){
		
         // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
		   $targetPath = getcwd(). '/uploads/';  
		 // Adding timestamp with image's name so that files with same name can be uploaded easily.
		 if($file['name'] !== ''){
		$file_name=time().$userid.$caseid.$qid.'.'.$extension;
		$refrenceid =  $userid.$caseid.$qid.uniqid();
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
		return $refrenceid;
		}
		}

	 }else{
		 return null;
	 }
 }  
  
  
   function casequesans($id){
	  
   //$query = $this->db->get_where('test_alternatives',array('Case_Sequence_ID'=>$id));
   $query = $this->db->query("SELECT test_alternatives.IDQuest, test_alternatives.option_list,test_alternatives.t_a, test_quest.Question FROM `test_alternatives` JOIN test_quest ON test_alternatives.IDQuest = test_quest.IDQuest WHERE test_alternatives.Case_Sequence_ID = '$id'");
   return $query->result();
   
  }

  function getuserbyparty($caseid,$partyno){
   if($partyno == "1"){
	  $cp = 'fpid';
   }else{
	  $cp = 'spid';
   }
   $query = $this->db->select($cp)->get_where('tblcase',array('CaseID'=>$caseid));
    //$query = $this->db->query("select ".$cp."  from tblcase where CaseID = '$caseid'");
	$row = $query->row();
	if($query->num_rows() > 0){
	return $row->$cp;
	}else{
	  return 0;
	}
  }
  
  function hiddenpartyno($caseid,$userid){
	  $query = $this->db->select('fpid,spid')->get_where('tblcase',array('CaseID'=>$caseid));
	  $row = $query->row();
	  if($query->num_rows() > 0 ){
		 if($userid ==  $row->fpid){
			return 2;
		 }elseif ($userid ==  $row->spid){
			return 1;
		 }
	  }
	  
  }
  
  
  function getunregisteredemail(){
	  $query = $this->db->query("SELECT CaseID, CaseType,FirstParty,SecondParty,DateCommenced,CaseStatus,fpid,spid,FirstPartyEmail, SocendPartyEmail FROM tblcase WHERE fpid IS NULL || spid IS NULL || spid = '0' || fpid = '0'");
	  return $query->result();
  }
  
  public function getunregisterpartydata($caseid,$party){
   if($party == 1){
	  $this->db->select('CaseID, FirstParty as name, AddressOfFirstParty as address, FirstPartyEmail as email, FirstPArtyPhone as phone');
   }elseif($party == 2){
	  $this->db->select('CaseID, SecondParty as name, AddressOfSecondParty as address, SocendPartyEmail as email, SocendPArtyPhone as phone');
   }
   $query = $this->db->get_where('tblcase',array('CaseID'=>$caseid));
   return $query->row();
  }
  
  public function updfpspid($email,$inserted_id){
	  $query = $this->db->query("SELECT CaseID, fpid,spid FROM tblcase WHERE (fpid IS NULL OR spid IS NULL OR fpid = '0' OR spid = '0') AND (FirstPartyEmail = '$email' OR SocendPartyEmail = '$email')");
	  foreach($query->result() as $row){
	  if($row->fpid == '' || $row->fpid == '0'){
		 $data = array('fpid'=>$inserted_id);
		 $this->db->update('tblcase',$data,array('CaseID'=>$row->CaseID));
	  }elseif($row->spid == '' || $row->spid == '0'){
		 $data = array('spid'=>$inserted_id);
		 $this->db->update('tblcase',$data,array('CaseID'=>$row->CaseID));
		 
	  }
	  
	  }
  }

  
   public function sendintromail($insid){
	  $this->db->select('FirstName,LastName,Email,Password');
	  $this->load->library('email');
	  $this->load->helper('email');
	  $query = $this->db->get_where('register_user',array('UserID'=>$insid));
	  $row = $query->row();
	  if($query->num_rows() > 0 ){
	   $data['password'] = $row->Password;
	   $data['email'] = $row->Email;
	   $data['fn'] = $row->FirstName;
	   $data['ln'] = $row->LastName;
	  $this->email->from('dev@ansitdev.com', 'CaseManagerApp');
	  $this->email->to($data['email']);
	  $this->email->subject('Account Created for Legal Case');
	  $mailbody = $this->load->view('email/accountcreated', $data, true);
	  $this->email->message($mailbody);
	  if(!$this->email->send()){
		 show_error($this->email->print_debugger());
	  }
	  }
   }  
  
  
  
}?>