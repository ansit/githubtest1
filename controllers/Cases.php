<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cases extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('case_model');
		$this->load->model('notification_model');
		$sesson_data = $this->session->userdata('logged_in');
		$UserID = $sesson_data['UserID'];
		$User_type = $sesson_data['User_type'];	
		
     }

	public function index()
	{
		$data = array();
		$sesson_data = $this->session->userdata('logged_in');
		$UserID = $sesson_data['UserID'];
		$User_type = $sesson_data['User_type'];
		$data['active_case_list']=$this->case_model->get_Active_case_list($UserID,$User_type);
		//print_r($data['active_case_list']);
		//exit;
		$data['new_case_list']=$this->case_model->get_new_case_list($UserID,$User_type);	
		$data['close_case_list']=$this->case_model->get_close_case_list($UserID,$User_type);		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('case',$data);
	}
	
	    /* public function delete_vec()
		  {
			$vid = $this->input->get('vecId');
			$uid = $this->input->get('uid');
			$this->Dashboard_model->delete_vechicle($vid,$uid);
			redirect('dashboard');
	     }*/
		 
		 public function addManager()
		 {
				$data = array();
				$data['user_data'] = '';
				$data['title'] = 'Add User';
				$data['heading'] = 'Add User';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('addManager',$data);
			
			
	     }
		 
		 public function editUser($id='')
		 {
				$data = array();
				$user_data = $this->user_model->get_user($id);
				$data['user_data'] = $user_data;
				$data['title'] = 'Edit User';
				$data['heading'] = 'Edit User';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('addUser',$data);
			
			
	     }
		 
		  public function add_edit_user($id='')
		 {
				$now = date('Y-m-d');
				$user_info = array();
				$user_info['FirstName']               = strip_tags($this->input->post('first_name'));
				$user_info['LastName']                = strip_tags($this->input->post('last_name'));
				$user_info['Position']                = strip_tags($this->input->post('position'));
				$user_info['Address']                 = strip_tags($this->input->post('address'));
				$user_info['City']                    = strip_tags($this->input->post('city'));
				$user_info['State']                   = strip_tags($this->input->post('state'));
				$user_info['Zip']                     = strip_tags($this->input->post('zip'));
				$user_info['Country']                 = strip_tags($this->input->post('country'));
				$user_info['Email']                   = strip_tags($this->input->post('email_id'));
				$user_info['Password']                = strip_tags($this->input->post('password'));
				$user_info['PhoneNumber']             = strip_tags($this->input->post('phone'));
				$user_info['Firm_CompanySize']        = strip_tags($this->input->post('firm_size'));
				$user_info['HowDidYouHearAboutUs']    = strip_tags($this->input->post('aboutus'));
				$user_info['User_type']    = '3';
				$user_info['UserJoinedOn']    = $now;
				
				if($id == '')
				{
					$inserted_id = $this->user_model->add_user($user_info);
					if($inserted_id!='')
					{
						$this->session->set_flashdata('msg', 'Add successfully');
						redirect('user');
					}
				}
				else
				{
					$rss = $this->user_model->update_user($user_info,$id);
					if($rss!='')
					{
						$this->session->set_flashdata('msg', 'Update successfully');
						redirect('user');
					}
					
				}
			         
			
	     }
		 
		  public function addcase()
		  {
				$data = array();
				$data['caseItem'] ='';
				$data['manager_list']=$this->case_model->get_manager_list();
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('add_case',$data);
			
			
	      }
		  
		   public function editcase($id='')
		   {
				if($id == ''){
					redirect('login');
				}
				
				$sesson_data = $this->session->userdata('logged_in');
				$UserID = $sesson_data['UserID'];
				if($sesson_data['User_type']==3){
					$this->case_model->allowaccess($id,$UserID);
					//exit;
				}
				
			  if(isset($_REQUEST['btn_update']))
				{
					$data = array();
					$now = date('Y-m-d');
					if ($this->session->userdata('logged_in'))
				    {
				      $session_data = $this->session->userdata('logged_in');
				    }
					$UserID = $session_data['UserID'];
					//first party
					$data['firstparty_represnt']        = strip_tags($this->input->post('firstparty_represnt'));
					$data['firstpartyPlain_defendant']  = strip_tags($this->input->post('firstpartyPlain_defendant'));
					$data['CaseTitle']                  = strip_tags($this->input->post('CaseTitle'));
					$data['CategoryofDispute']          = strip_tags($this->input->post('CategoryofDispute'));
					$data['DateCommenced']              = strip_tags($this->input->post('DateCommenced'));
					$data['EndDate']                    = strip_tags($this->input->post('EndDate'));
					$data['FirstParty']                 = strip_tags($this->input->post('FirstParty'));
					$data['FirstPartyEmail']            = strip_tags($this->input->post('FirstPartyEmail'));
					$data['AddressOfFirstParty']        = strip_tags($this->input->post('AddressOfFirstParty'));
					$data['FirstPArtyPhone']            = strip_tags($this->input->post('FirstPArtyPhone'));
					$data['AttorneyName']               = strip_tags($this->input->post('AttorneyNameFirst_party'));
					$data['AmountInDispute']            = strip_tags($this->input->post('AmountInDisputeFirst_party'));
					$data['first_party_firm_name']      = strip_tags($this->input->post('FirstParty_firm_name'));
					$data['AttorneyEmail']              = strip_tags($this->input->post('FirstParty_attorney_email'));
					$data['AttorneyAddress']            = strip_tags($this->input->post('FirstPartyAttorney_address'));
					$data['AttorneyPhone']              = strip_tags($this->input->post('FirstPartyAttorney_phone'));
					$data['CaseType']                   = strip_tags($this->input->post('FirstPartyCase_type'));
					$data['CaseDescription']            = strip_tags($this->input->post('FirstPartyCase_desctiption'));
					
					//second party
					$data['secondparty_represnt']       = strip_tags($this->input->post('secondparty_represnt'));
					$data['secondpartyPlain_defendant'] = strip_tags($this->input->post('secondpartyPlain_defendant'));
					$data['SecondParty']                = strip_tags($this->input->post('SecondParty'));
					$data['AddressOfSecondParty']       = strip_tags($this->input->post('AddressOfSecondParty'));
					$data['SocendPartyEmail']           = strip_tags($this->input->post('SecondPartyEmail'));
					$data['SocendPArtyPhone']           = strip_tags($this->input->post('SecondPartyPhone'));
					$data['second_party_attorney']      = strip_tags($this->input->post('SecondPartyAttorneyName'));
					$data['second_party_firm_name']      = strip_tags($this->input->post('SecondParty_firm_name'));
					$data['second_party_attorney_email'] = strip_tags($this->input->post('SecondParty_attorney_email'));
					$data['second_party_attorney_address'] = strip_tags($this->input->post('AddressOfSecondParty_attorney'));
					$data['second_party_attorney_phone'] = strip_tags($this->input->post('SecondParty_attorney_phone'));
					$data['CaseStatus']                  = '1';
					$data['UpdatedBy']                  = $UserID;
					$data['UpdatedDate']                = $now;
					$this->case_model->update_case($id,$data);
					
					$comment = 'User '.$session_data['FirstName'].' updated a case <strong>CaseId:'.$id.'</strong>';
					$this->notification_model->addnotification($session_data['UserID'],3,$id,$session_data['User_type'],2,$comment);
					$this->session->set_flashdata('msg', 'Update successfully');
					redirect('cases');
					 exit;	
					
			    }
				else
				{	
						
					$data = array();
					$data['manager_list']=$this->case_model->get_manager_list();
					$data['caseItem']=$this->case_model->get_case($id);
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('edit_case',$data);
				}
			
			
	      }
		 public function viewcase($id='')
         {
			$data = array();
			$data['manager_list']=$this->case_model->get_manager_list();
			$data['caseItem']=$this->case_model->get_case($id);
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('view_case',$data);
		 }
		  
		  
		  public function case_delete()
	     {
			$case_id = $this->input->post('case_id');  
			$res = $this->case_model->delete_case($case_id);
			$session_data = $this->session->userdata('logged_in');
			if($res==1)
			{
				echo '1';
				$this->case_model->delcasenotification($session_data['FirstName'],$session_data['UserID'],$session_data['User_type'],$case_id);
				
				exit;
				$this->session->set_flashdata('msg', 'Deleted successfully');
			}
			else
			{
				echo '0';
				exit;
			}
			
	   } 
		  
		  
		  
		  
		  
		  public function addcases()
		  {
				if(isset($_REQUEST['btn_submit']))
				{
					//print_r($_POST);
					$sesson_data = $this->session->userdata('logged_in');
		            $UserID = $sesson_data['UserID'];
		            $User_type = $sesson_data['User_type'];
					$data = array();
					$now = date('Y-m-d');
					
					//first party
					$data['firstparty_represnt']        = strip_tags($this->input->post('firstparty_represnt'));
					$data['firstpartyPlain_defendant']  = strip_tags($this->input->post('firstpartyPlain_defendant'));
					$data['CaseTitle']                  = strip_tags($this->input->post('CaseTitle'));
					$data['DateCommenced']              = strip_tags($this->input->post('DateCommenced'));
					$data['CategoryofDispute']          = strip_tags($this->input->post('CategoryofDispute'));
					//$data['EndDate']                    = $this->input->post('EndDate');
					$data['FirstParty']                 = strip_tags($this->input->post('FirstParty'));
					$data['FirstPartyEmail']            = strip_tags($this->input->post('FirstPartyEmail'));
					$data['AddressOfFirstParty']        = strip_tags($this->input->post('AddressOfFirstParty'));
					$data['FirstPArtyPhone']            = strip_tags($this->input->post('FirstPArtyPhone'));
					$data['AttorneyName']               = strip_tags($this->input->post('AttorneyNameFirst_party'));
					$data['AmountInDispute']            = strip_tags($this->input->post('AmountInDisputeFirst_party'));
					$data['first_party_firm_name']      = strip_tags($this->input->post('FirstParty_firm_name'));
					$data['AttorneyEmail']              = strip_tags($this->input->post('FirstParty_attorney_email'));
					$data['AttorneyAddress']            = strip_tags($this->input->post('FirstPartyAttorney_address'));
					$data['AttorneyPhone']              = strip_tags($this->input->post('FirstPartyAttorney_phone'));
					$data['CaseType']                   = strip_tags($this->input->post('FirstPartyCase_type'));
					$data['CaseDescription']            = strip_tags($this->input->post('FirstPartyCase_desctiption'));
					
					//second party
					$data['secondparty_represnt']       = strip_tags($this->input->post('secondparty_represnt'));
					$data['secondpartyPlain_defendant'] = strip_tags($this->input->post('secondpartyPlain_defendant'));
					$data['SecondParty']                = strip_tags($this->input->post('SecondParty'));
					$data['AddressOfSecondParty']       = strip_tags($this->input->post('AddressOfSecondParty'));
					$data['SocendPartyEmail']           = strip_tags($this->input->post('SecondPartyEmail'));
					$data['SocendPArtyPhone']           = strip_tags($this->input->post('SecondPartyPhone'));
					$data['second_party_attorney']      = strip_tags($this->input->post('SecondPartyAttorneyName'));
					$data['second_party_firm_name']      = strip_tags($this->input->post('SecondParty_firm_name'));
					$data['second_party_attorney_email'] = strip_tags($this->input->post('SecondParty_attorney_email'));
					$data['second_party_attorney_address'] = strip_tags($this->input->post('AddressOfSecondParty_attorney'));
					$data['second_party_attorney_phone'] = strip_tags($this->input->post('SecondParty_attorney_phone'));
					$data['CaseStatus']                 = '1';
					$data['CreatedBy']                  = $UserID;
					$data['User_type']                  = $User_type;
					$data['CreatedDate']                = $now;
					$data['UpdatedBy']                  = $UserID;
					$data['UpdatedDate']                = $now;
					$data['IsActive']                   = '1';
					//$this->case_model->insert_cases($data);
					//$q=$this->case_model->insert_cases($data);
					
					//echo $q;
					$this->load->model('user_model');
					/* check party represent, check other party existance and relate case to other party */
					if($data['firstparty_represnt'] == '1'){
						$data['fpid'] = $UserID;
						$data['spid'] = $this->user_model->checkExistance($data['SocendPartyEmail']);
					}else{
						$data['spid'] = $UserID;
						$data['fpid'] = $this->user_model->checkExistance($data['FirstPartyEmail']);
					}
					
					$insertedId =$this->case_model->insert_cases($data);
						
					if($insertedId!='')
					{
						$comment = 'User '.$sesson_data['FirstName'].' added a case <strong>CaseID'.$insertedId.'</strong>';
						$this->notification_model->addnotification($sesson_data['UserID'],3,$insertedId,$sesson_data['User_type'],1,$comment);
						$this->session->set_flashdata('msg', 'Insert successfully');
						redirect('cases');
						
					}
					
			    }
			
	      }
		  
		   
	public function checkemail($email){
		$this->load->model('user_model');
		$stat = $this->user_model->checkExistance($userEmail);
		echo $stat;
	}
	 
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */