  <?php
  class TEST extends CI_Controller
  {
    
    public function __construct()
    {
          parent::__construct();      
    }

    public function index()
    {  
         $this->load->view("header"); 
         $this->load->view("test"); 
         $this->load->view("footer"); 
    }
}