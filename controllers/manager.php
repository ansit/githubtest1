<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		 
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
		$this->load->library('imagic_resize');
		$this->load->model('manager_model');	
		$this->load->model('register_model');	
		$this->load->model('Dashboard_model');	
		$this->load->model('user_model');
		$this->load->model('notification_model');
		//error_reporting(0);
     }

	public function index()
	{
		$this->user_model->roleaccess();
		$data = array();	
		$manager_list = $this->manager_model->get_manager_list();
		$data['manager_list'] = $manager_list;
		$data['title'] = 'Manager';
		$data['heading'] = 'Manager';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager',$data);
	}
	//Added by avnish 25/07/15
	public function manager_cases()
	{
		$this->user_model->roleaccess();
		$data = array();	
		$manager_list = $this->manager_model->get_manager_list();
		$data['manager_list'] = $manager_list;
		$data['title'] = 'Cases Manager';
		$data['heading'] = 'Cases Manager';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager_cases',$data);
	}
	public function manager_details($id){
	//echo $id;
	$data = array();	
		if ($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
		}
		//print_r($session_data);
		//exit;
		$data['managerid'] = $id;
		$data['active_case_list']=$this->manager_model->get_Active_case_list($id);
		//$data['no_of_manager'] = $this->Dashboard_model->count_manager($id);
		$data['no_of_users'] = $this->Dashboard_model->count_user_manager($id);
		$data['no_of_cases_assign'] = $this->Dashboard_model->count_cases_assgin_manager($id);
		$data['case_id']=$id;	
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager_details',$data);
		
	}
	public function assign_cases($id){
	//echo $id;
	//die;
		$data = array();
		if ($this->session->userdata('logged_in'))
		{
		  $session_data = $this->session->userdata('logged_in');
		}
		$data['active_case_list']=$this->manager_model->get_Active_case_list($id);
		$data['close_case_list']=$this->manager_model->get_close_case_list($id);		
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		
		
		$this->load->view('assign_case',$data);
	}
//End	
	
	public function addManager()
		 {
			 
				$data = array();
				$data['manager_data'] = '';
				$data['title'] = 'Add Manager';
				$data['heading'] = 'Add Manager';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('addManager',$data);
			
			
	     }
		 
		 public function editManager($id='')
		 {
				$data = array();
				$manager_data = $this->manager_model->get_manager($id);
				$data['manager_data'] = $manager_data;
				$data['title'] = 'Edit Manager';
				$data['heading'] = 'Edit Manager';
				$data['right_panel'] = $this->load->view('common/right_panel', '', true);
				$data['common_header'] = $this->load->view('common/header', '', true);
				$data['common_footer'] = $this->load->view('common/footer', '', true);
				$this->load->view('addManager',$data);
			
			
	     }

		  public function add_edit_Manager($id=''){
			if(isset($_POST['btnmanager']))	{
			     $config['upload_path'] = FILE_ROOT_PATH.'\media\profile_img\manager';
				 $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|swf|pdf|doc|docx|xml|txt';
			 
			  $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('Name','First Name','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Phone','Phone Number','required|xss_clean|numeric|max_length[10]');
			   if($this->input->post('email_id')=='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			     $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email|strip_tags');
			   }
			   elseif($this->input->post('email_id')!='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			      $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			   }
			  $this->form_validation->set_rules('Biography','Biography','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Areasofexpertise','Areas of expertise','required|xss_clean|strip_tags');
			  $this->form_validation->set_rules('Passsword','Password','required|xss_clean');
			  if(!empty($_FILES['profile_img']['name'])){
				$this->form_validation->set_rules('profile_img','profile_img','callback_checkdp');
			  }
			  if(!empty($_FILES['file1']['name'])){
				$this->form_validation->set_rules('profile_img','profile_img','callback_checkcv');
			  }
			  
			  if($this->form_validation->run()==false){
				 if($this->input->post('manager_id')==''){
					$data['manager_data'] = '';
					$data['title'] = 'Add Manager';
					$data['heading'] = 'Add Manager';
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('addManager',$data);
				  }else{
					$data = array();
					$manager_data = $this->manager_model->get_manager($id);
					$data['manager_data'] = $manager_data;
					$data['title'] = 'Edit Manager';
					$data['heading'] = 'Edit Manager';
					$data['right_panel'] = $this->load->view('common/right_panel', '', true);
					$data['common_header'] = $this->load->view('common/header', '', true);
					$data['common_footer'] = $this->load->view('common/footer', '', true);
					$this->load->view('addManager',$data);
					  
				  }
				
			  }else{
                

				$now = date('Y-m-d');
				if ($this->session->userdata('logged_in')){
					$session_data = $this->session->userdata('logged_in');
				}
				$manager_info['FirstName']               = strip_tags($this->input->post('Name'));
				$manager_info['Email']                   = strip_tags($this->input->post('Email'));
				$manager_info['Address']                 = strip_tags($this->input->post('Address'));
				$manager_info['PhoneNumber']             = strip_tags($this->input->post('Phone'));
				$manager_info['Password']                = $this->input->post('Passsword');
			    $manager_info['biography']               = strip_tags($this->input->post('Biography'));
				$manager_info['areasofexpertise']        = strip_tags($this->input->post('Areasofexpertise'));
				//$manager_info['upload_cv']               = $upload_cv;
				$manager_info['User_type']               = '2';
				$manager_info['UserJoinedDate']          = $now;   
				$manager_info['parient_id']              = $session_data['UserID'];
				$dp = $_FILES['profile_img'];
				$cv = $_FILES['file1'];
			//	print_r($_FILES);
			//print_r($this->input->post());
				if(!empty($dp['name'])){
					$image_name= $this->manager_model->uploaddata($dp,$session_data['UserID'],1);
				}else{
					$image_name= $this->input->post('old_profile_img');
				}
				if(!empty($cv['name'])){
					$upload_cv= $this->manager_model->uploaddata($cv,$session_data['UserID'],2);
				}else{
					$upload_cv= $this->input->post('old_cv');
				}
				$manager_info['upload_cv'] = $upload_cv;
				$manager_info['ProfilePic']  = $image_name;
 				if($id == ''){
					$inserted_id = $this->manager_model->add_manager($manager_info);
					if($inserted_id!=''){
						$action = 1;
						$utype = $session_data['User_type'];
						if($utype == 1){$role = 'Admin';}
						elseif($utype == 2){$role = 'Manager';}
						else{$role = 'User';}
						
						$comment = $role.':'.$session_data['FirstName'].' added a new manager '.$manager_info['FirstName'];
						$this->notification_model->addnotification($session_data['UserID'],1,$inserted_id,$session_data['User_type'],$action,$comment);
						$this->session->set_flashdata('msg', 'Add successfully');
						
						redirect('manager');
					}
				}else{
					//print_r($manager_info);
					$rss = $this->manager_model->update_manager($manager_info,$id);
					if($rss!='')
					{
						$mname = $this->notification_model->getnamebyid($id);
						$action = 2;
						$comment = $session_data['FirstName'].' updated profile of '.$mname;
						$this->notification_model->addnotification($session_data['UserID'],1,$id,$session_data['User_type'],$action,$comment);
						//exit;
						$this->session->set_flashdata('msg', 'Update successfully');
						redirect('manager');
					}
					
				}
                
                
                
              }
            }
			 
			 
			
	     
        }
         		 
		function thumb($data)
		{
				$config['image_library'] = 'gd2';
				$config['source_image'] =$data['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 275;
				$config['height'] = 250;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
		}
		
		public function delete_Manager()
		{
			$this->user_model->roleaccess();
			$uid = $this->input->post('userid');
			$result = $this->manager_model->get_image_name($uid);
			
			if($result->ProfilePic != '' || $result->ProfilePic!=='noimage.jpg'){
				$dirPath = FILE_ROOT_PATH.'/media/profile_img/manager/'.$result->ProfilePic;
	  		    unlink($dirPath);
			}
			
			$result = $this->manager_model->delete_manager($uid);
			
			echo $result;
			//exit;
			
	    }	
		 
		 
		
		public function exist_email()
		{
			$emailId=$this->input->post('Email');	
			$result = $this->register_model->exist_email($emailId);
			if($result=='')
			{
			 return true;	
			}
			else
			{
			$this->form_validation->set_message('exist_email', 'Email Id Already Exits ! try another');
			return false;	
			}
			
		}
		
		public function checkdp(){
			$supported_image = array('jpg','jpeg','png','bmp','gif');
			
			$ext = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);
			if(in_array($ext,$supported_image)){
				return true;
			}else{
				$this->form_validation->set_message('checkdp', 'Only image format supported!');
				return false;
			}
			
		}

		public function checkcv(){
			$supported_doc = array('doc','docx','pdf','odt');
			$ext = pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION);
			if(in_array($ext,$supported_doc)){
				return true;
			}else{
				$this->form_validation->set_message('checkcv', 'Only doc supported!');
				return false;
			}
			
		}		
		
		
		// Manager profile -----------------
		public function manager_profile(){
			
		if(isset($_POST['btnmanager'])){
			
			$this->manager_model->edit_manager_profile();
			
		} 
		
		$session_data = $this->session->userdata('logged_in');
		$data = array();
		$data['list'] = $this->user_model->get_profile_data($session_data['UserID']);
		$data['title'] = 'Manager';
		$data['heading'] = 'Manager';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('manager_profile',$data);
		}
		
	public function email_exists()
	{
	 
	$result=$this->manager_model->Duplicate_email($this->input->post('Email'));
	if($result)
	{
		echo 1;
	}else
	{ echo 0; }
	
	
	}
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */