<?php
class User extends CI_Model
{     
        public function __construct()
        {
            // Call the CI_Model constructor
            parent::__construct();
        }

/**
* This Add User To the database
* @param  object $data contain user information
*
*/
        public function add_user($data)
        {
             return $this->db->insert('User',$data);
        }
 
 /**

 */
/**
* This Delete a User which specific id
* @param  int $id contain user ID
*/
        public function delete_user($id)
        {
             $this->db->delete('User',array('id' => $id));
        }    
        
 /**

 */
 /**
* This Delete a User which specific id
* @param  object       $user         user Object
*/
     public function update_user($user)
        {
               $this->db->update('User',$user,array ('id' => $user["id"]));
        }

 /**

 */
/**
* This  a User which specific id
* @param      string         $username      username
* @return     object         return row containg user information with specific username
*/
        public function get_user($username)
        {
                 $query = $this->db->get_where('User',array('username' => $username)); 
                 return $query->row();
        }

 /**

 */
/**
* This  a User which specific id
* @return     array of objects         return array of User objects containg ALL users information
*/
        public function get_users()
        {
                 $query = $this->db->get('User'); 
                 return $query->result();
        }

}