<?php
class Post_controller extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
    }
        
/**

*/
/*
* This Function Get All Posts From Post Model that bring them from the database and convert them to Json Format
*/
 public function get_posts()
    {
         $this->load->model("Post");
         echo json_encode($this->Post->get_posts());
    }    
}