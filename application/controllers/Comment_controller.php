<?php
class Comment_controller extends CI_Controller 
{
	   public function __construct()
        {
               parent::__construct();
        }

/**

*/
/*
* This Function Get All Comments From Comment Model that bring them from the database and convert them to Json Format
*/
		public function  getComments()
		{
			 $this->load->model("Comment");
             echo json_encode($this->Comment->get_Comments());
		}
		
}