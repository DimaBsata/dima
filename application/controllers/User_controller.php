  <?php
  class User_controller extends CI_Controller
  {
    
    public function __construct()
    {
          parent::__construct(); 
    }

/**

*/
/*
* This Function Get All Users From User Model that bring them from the database and convert them to Json Format
*/
    public function  getUsers()
    {
               $this->load->model("User");
               echo  json_encode($this->User->get_users());
    }

/**

*/
/*
* This Function recieve Json object of one User Object And decode it in order to add it to the database with help of User Model
* then it Get All Users From User Model that bring them from the database and convert them to Json Format
*/
    public function AddUser()
    {
            $input_data = json_decode(trim(file_get_contents('php://input')), true);
            $this->load->model("User");
            $this->User->add_user($input_data);
            echo json_encode($this->User->get_users());   
    }

/**

*/
/*
* This Function recieve Json object of one User Object And decode it in order to EDit it to the database with help of User Model
* then it Get All Users From User Model that bring them from the database and convert them to Json Format
*/
    public function EditUser()
    {
            $input_data = json_decode(trim(file_get_contents('php://input')), true);   
            $this->load->model("User");
            $this->User->update_user($input_data);
            echo json_encode($this->User->get_users());   
    }

/**

*/
/**
* @param  $id integer User Id for the user to be deleted
* This Function delete user by his id 
* then it Get All Users From User Model that bring them from the database and convert them to Json Format
*/
    public function delete_user($id)
    {
            $this->load->model("User");
            $this->User->delete_user($id);
            echo json_encode($this->User->get_users());   
    }

}