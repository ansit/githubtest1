<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time_tracking extends CI_Controller {
	
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
		
		$this->load->model('user_model');
		error_reporting(0);
     }

	public function index()
	{
		$data = array();	
		$manager_list = $this->manager_model->get_manager_list();
		$data['manager_list'] = $manager_list;
		$data['title'] = 'Time Tracking';
		$data['heading'] = 'Time Tracking';
		$data['right_panel'] = $this->load->view('common/right_panel', '', true);
		$data['common_header'] = $this->load->view('common/header', '', true);
		$data['common_footer'] = $this->load->view('common/footer', '', true);
		$this->load->view('time_tracking',$data);
	}
	
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
		 
		  public function add_edit_Manager($id='')
		 {
			if(isset($_POST['btnmanager']))
			{
			     $config['upload_path'] = FILE_ROOT_PATH.'\media\profile_img\manager';
				 $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|swf|pdf|doc|docx|xml';
				 $config['max_size']    = '1024';
				 $config['max_width']  = '1024';
				 $config['max_height']  = '768';
				 $this->load->library('upload', $config);
			 
			  $this->load->library('form_validation');
			  $this->form_validation->set_error_delimiters('<div class="error">','</div>');
			  $this->form_validation->set_rules('Name','First Name','required|xss_clean');
			  $this->form_validation->set_rules('Address','Address','required|xss_clean');
			  $this->form_validation->set_rules('Phone','Phone Number','required|xss_clean|numeric|max_length[10]');
			   if($this->input->post('email_id')=='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			     $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			   }
			   elseif($this->input->post('email_id')!='' && $this->input->post('email_id')!= $this->input->post('Email'))
			   {
			      $this->form_validation->set_rules('Email','Email','required|xss_clean|valid_emails|callback_exist_email');
			   }
			  $this->form_validation->set_rules('Biography','Biography','required|xss_clean');
			  $this->form_validation->set_rules('Areasofexpertise','Areas of expertise','required|xss_clean');
			  $this->form_validation->set_rules('Passsword','Password','required|xss_clean');
			 

			  if($this->form_validation->run()==false)
			  {
				 if($this->input->post('manager_id')=='')
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
				  else
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
				
			  }
			 else
			 { 
			 
			 if ($_FILES['profile_img']['name']!='')
		     {
				$dirPath = FILE_ROOT_PATH.'/media/profile_img/manager/'.$this->input->post('old_profile_img');
	  		    if($this->input->post('old_profile_img')!='')
				{
				  unlink(realpath($dirPath));
				}
				 
				
			   if ( ! $this->upload->do_upload($field='profile_img'))
			   {
				   $error = array('error' => $this->upload->display_errors());
				   $this->session->set_flashdata('msg', $error['error']);
					redirect('manager/addManager');
			   }
			  else
			  {
			    $data = $this->upload->data();
				//$this->thumb($data);
			    $image_name = $data['file_name'];
			  }
			}
			else
			{
				$image_name= $this->input->post('old_profile_img');
			}
			
			// for resume upload
			
			if ($_FILES['file1']['name']!='')
		     {
				$dirPath = FILE_ROOT_PATH.'/media/profile_img/manager/manager_cv/'.$this->input->post('old_cv');
	  		    if($this->input->post('old_cv')!='')
				{
				  unlink(realpath($dirPath));
				}
				 
				
			   if ( ! $this->upload->do_upload($field='file1'))
			   {
				   $error = array('error' => $this->upload->display_errors());
				   $this->session->set_flashdata('msg', $error['error']);
					redirect('manager/addManager');
			   }
			   else
			   {
			      $data = $this->upload->data();
				  //$this->thumb($data);
			      $upload_cv = $data['file_name'];
			   }
			}
			else
			{
				$upload_cv = $this->input->post('old_cv');
			}
			
			
			//end
			
				$now = date('Y-m-d');
				$session_data = array();
				$manager_info = array();
				if ($this->session->userdata('logged_in'))
				{
				  $session_data = $this->session->userdata('logged_in');
				}
				$manager_info['FirstName']               = $this->input->post('Name');
				$manager_info['Email']                   = $this->input->post('Email');
				$manager_info['Address']                 = $this->input->post('Address');
				$manager_info['PhoneNumber']             = $this->input->post('Phone');
				$manager_info['Password']                = $this->input->post('Passsword');
			    $manager_info['biography']               = $this->input->post('Biography');
				$manager_info['areasofexpertise']        = $this->input->post('Areasofexpertise');
				$manager_info['upload_cv']               = $upload_cv;
				$manager_info['ProfilePic']              = $image_name;
				$manager_info['User_type']               = '2';
				$manager_info['UserJoinedDate']          = $now;   
				$manager_info['parient_id']              = $session_data['UserID'];
				
 				if($id == '')
				{
					$inserted_id = $this->manager_model->add_manager($manager_info);
					if($inserted_id!='')
					{
						$this->session->set_flashdata('msg', 'Add successfully');
						redirect('manager');
					}
				}
				else
				{
					$rss = $this->manager_model->update_manager($manager_info,$id);
					if($rss!='')
					{
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
			$uid = $this->input->post('userid');
			$result = $this->manager_model->get_image_name($uid);
			if($result->ProfilePic!='notfound')
			{
				$dirPath = FILE_ROOT_PATH.'/media/profile_img/manager/'.$result->ProfilePic;
	  		    unlink(realpath($dirPath));
			}
			$result = $this->manager_model->delete_manager($uid);
			echo $result;
			exit;
			
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
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */