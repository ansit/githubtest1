<?php

   class question_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	/* function get_info_test_quest($id)
{
$role1="";


$query = $this->db->query("select * from test_quest 
    inner join  test_alternatives on test_alternatives.IDQuest 	=test_quest.IDQuest
     
where   test_quest.IDAvaliacao='".$id."'");
foreach($query->result() as $role)
{
$role1[]=$role;

}

return $role1;}


function get_info_test($id)
{
$role1="";

$query = $this->db->query("select * from tests where   IDAvaliacao='".$id."'");
foreach($query->result() as $role)
{
$role1[]=$role;

}
return $role1;
} */
	
	
	
	
	
  }



?>