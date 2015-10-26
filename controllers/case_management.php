<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Case_management extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		
		$this->load->library('imagic_resize');
		$this->load->model('case_model');
		$sesson_data = $this->session->userdata('logged_in');
		$UserID = $sesson_data['UserID'];
		$User_type = $sesson_data['User_type'];	
		if($User_type==3){
			redirect('login');
		}
     }

	public function index()
	{
		$data = array();
		$sesson_data = $this->session->userdata('logged_in');
		$UserID = $sesson_data['UserID'];
		$User_type = $sesson_data['User_type'];
		$data['unregacc'] = $this->case_model->getunregisteredemail();
		$data['active_case_list']=$this->case_model->get_admin_Active_case_list();
		$data['new_case_list']=$this->case_model->get_admin_new_case_list();	
		$data['close_case_list']=$this->case_model->get_admin_close_case_list();		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('case_management',$data);
	}
	/*avnish*/
	public function manager_assigned_case($uid)
	{
		$data = array();
		
		$sesson_data = $this->session->userdata('logged_in');
		$UserID = $sesson_data['UserID'];
		$User_type = $sesson_data['User_type'];
		$data['active_case_list']=$this->case_model->get_manager_Active_case_list($uid);
		//$data['new_case_list']=$this->case_model->get_admin_new_case_list();	
		$data['close_case_list']=$this->case_model->get_manager_close_case_list($uid);		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('assigned_manager_case_view',$data);
	}
	/*end*/
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
		  
		    public function editcase($id='', $id2='')
		   {
			
			
				
				if ($this->session->userdata('logged_in'))
				    {
				      $session_data = $this->session->userdata('logged_in');
				    }
					//print_r($session_data);exit;
					$UserID=$session_data['UserID'];
			  if(isset($_REQUEST['btn_update']))
				{
					//print_r($_POST); exit; 
					
					
					$data = array();
					$now = date('Y-m-d');
					$data['ManagerAssigned']      		=strip_tags($this->input->post('ManagerAssigned'));
					$data['firstparty_represnt']   		=strip_tags($this->input->post('firstparty_represnt'));    
					$data['firstpartyPlain_defendant']  = strip_tags($this->input->post('represnt'));
					$data['CaseTitle']                  = strip_tags($this->input->post('CaseTitle'));
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
					
					$data['SuccessfulResolution']            = strip_tags($this->input->post('SuccessfulResolution'));
					$data['AmmountSettledfor']            = strip_tags($this->input->post('AmmountSettledfor'));
					$data['CategoryofDispute']            = strip_tags($this->input->post('CategoryofDispute'));
					
					
					//second party
					$data['secondparty_represnt']       = strip_tags($this->input->post('secondparty_represnt'));
					$data['secondpartyPlain_defendant'] = strip_tags($this->input->post('secondpartyPlain_defendant'));
					$data['SecondParty']                = strip_tags($this->input->post('SecondParty'));
					$data['AddressOfSecondParty']       = strip_tags($this->input->post('AddressOfSecondParty'));
					$data['SocendPartyEmail']           = strip_tags($this->input->post('SecondPartyEmail'));
					$data['SocendPArtyPhone']           = strip_tags($this->input->post('SecondPartyPhone'));
					$data['second_party_attorney']      = strip_tags($this->input->post('SecondPartyAttorneyName'));
					$data['AmountInDispute_second_party']= strip_tags($this->input->post('SecondPartyAmountInDispute'));
					$data['second_party_firm_name']      = strip_tags($this->input->post('SecondParty_firm_name'));
					$data['second_party_attorney_email'] = strip_tags($this->input->post('SecondParty_attorney_email'));
					$data['second_party_attorney_address'] = strip_tags($this->input->post('AddressOfSecondParty_attorney'));
					$data['second_party_attorney_phone'] = strip_tags($this->input->post('SecondParty_attorney_phone'));
					$data['second_party_case_type'] = strip_tags($this->input->post('SecondParty_case_type'));
					$data['second_party_case_description'] = strip_tags($this->input->post('case_description_SecondParty'));
					$data['PaymentInformation'] = strip_tags($this->input->post('PaymentInformation'));
					//$data['CaseStatus']                  = $this->input->post('CaseStatus');
					if($this->input->post('ManagerAssigned'))
					{
						$data['CaseStatus']='2';
					}
					
					if($this->input->post('ManagerAssigned')!=0 && $this->input->post('EndDate')==0)
					{
						$data['CaseStatus']='2';
					}
					
					if($this->input->post('ManagerAssigned')==0 && $this->input->post('EndDate')==0)
					{
						
						$data['CaseStatus']='1';
						
					}
				
						if($this->input->post('ManagerAssigned')!=0 && $this->input->post('EndDate')!=0)
						{
							$data['CaseStatus'] = '3';
							
						}
				
					$data['UpdatedBy']                  = $UserID;
					$data['UpdatedDate']                = $now;
					$session_data = $this->session->userdata('logged_in');
					
					$this->case_model->casestat($session_data['FirstName'],$session_data['UserID'],$session_data['User_type'],$id,$data['CaseStatus'],$data['ManagerAssigned']);
					$this->case_model->update_case($id,$data);
					$this->session->set_flashdata('msg', 'Update successfully');
					//print_r($data); exit;
					
					
		if($session_data['User_type']==1)
				{
			redirect('case_management');	
			 //redirect('manager/manager_cases');
			}else{
		redirect('assign_cases');
				}
			// //exit;	
					
			    }
				else
				{	
						
					$data = array();
					$data['ans_list']=$this->case_model->get_ans_list($id);
					$data['ans_list_sec']=$this->case_model->get_ans_list_sec($id);
					$data['responce_list']=$this->case_model->get_responce_list($id, $id2);
					$data['responce_list_sec']=$this->case_model->get_responce_list_sec($id);
					$data['manager_list']=$this->case_model->get_manager_list();
					$data['caseItem']=$this->case_model->get_case($id);
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					//$this->load->view('admin_edit_case',$data);
					$this->load->view('testcase',$data);
					//echo "sadasdsad";
				}
			
			
	      }
		  public function viewcase($id='')
         { //error_reporting(0);
			$data = array();
			$data['manager_list']=$this->case_model->get_manager_list_for_admin($id);
		
			$data['caseItem']=$this->case_model->get_case($id);
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('admin_view_case',$data);
		 }
		 public function view($id='')
         {
			$data = array();
			$data['manager_list']=$this->case_model->get_manager_list_for_admin($id);
			$data['caseItem']=$this->case_model->get_case($id);
			$data['firparcom'] = $this->case_model->getmanagercomment($id,1);
			$data['secparcom'] = $this->case_model->getmanagercomment($id,2);
			$data['firstep1'] = $this->case_model->stepdata($id,1,1);
			$data['secstep1'] = $this->case_model->stepdata($id,2,1);
			$data['firstep2'] = $this->case_model->stepdata($id,1,2);
			$data['secstep2'] = $this->case_model->stepdata($id,2,2);
			$data['right_panel'] = $this->load->view('common/right_panel', '', true);
			$data['common_header'] = $this->load->view('common/header', '', true);
			$data['common_footer'] = $this->load->view('common/footer', '', true);
			$this->load->view('view',$data);
		 }
		  
		  
		 public function case_delete()
	     {
			$case_id = $this->input->post('case_id');  
			$res = $this->case_model->delete_case($case_id);
			if($res==1)
			{
				//echo '1';
				
				exit;
			}
			else
			{
				//echo '0';
				exit;
			}
			
	   }
		  
		  
		  
		  
		  
		  
		  public function addcases()
		  {
				if(isset($_REQUEST['btn_submit']))
				{
					
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
					$data['AmountInDispute_second_party']= strip_tags($this->input->post('SecondPartyAmountInDispute'));
					$data['second_party_firm_name']      = strip_tags($this->input->post('SecondParty_firm_name'));
					$data['second_party_attorney_email'] = strip_tags($this->input->post('SecondParty_attorney_email'));
					$data['second_party_attorney_address'] = strip_tags($this->input->post('AddressOfSecondParty_attorney'));
					$data['second_party_attorney_phone'] = strip_tags($this->input->post('SecondParty_attorney_phone'));
					$data['second_party_case_type'] = strip_tags($this->input->post('SecondParty_case_type'));
					$data['second_party_case_description'] = strip_tags($this->input->post('case_description_SecondParty'));
					$data['CaseStatus']                 = '1';
					$data['CreatedBy']                  = $UserID;
					$data['User_type']                  = $User_type;
					$data['CreatedDate']                = $now;
					$data['UpdatedBy']                  = $UserID;
					$data['UpdatedDate']                = $now;
					$data['IsActive']                   = '1'; 
					$insertedId =$this->case_model->insert_cases($data);
					if($insertedId!='')
					{
						$this->session->set_flashdata('msg', 'Insert successfully');
						//redirect('cases');
					}
						
			    }
			
	      }
		  
		   
		 
	 
		 
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */