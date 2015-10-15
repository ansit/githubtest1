<?php

class jquery_pop extends CI_Controller {
var $lang="";

    function __construct() {
        parent::__construct();
       // $this->load->model("question_model");
   }

 
	function Test($id = "") {
           $this->load->view('test_pop'); 
		
    }
    
    function option_radio($id = "") {
           $this->load->view('option_radio'); 
		
    }
    
    function option_checkbox($id = "") {
           $this->load->view('option_checkbox'); 
		
    }
    
	function option_fileupl($id=""){
		$this->load->view('option_upload');
	}
    

}

?>
