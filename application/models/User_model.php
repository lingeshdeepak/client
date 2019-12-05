<?php
class User_model extends CI_Model{
 
    
    	function __construct(){
        // Call the Model constructor
        parent::__construct();        
       
    	}    


	public function get_user($user_id){
		$this->db->select('*');
		$this->db->where('id',$user_id);
		return $this->db->get('user')->row_array();
	}
    
    //register function
	public function register($enc_password){

		$data = array('name' => $this->input->post('name'),
		'email' => $this->input->post('email'),
		'username' => $this->input->post('username'),
		'password' => $enc_password,
		);

		return $this->db->insert('user', $data);
	}

    //login function
	public function login($username, $password){

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('user');

		if($result->num_rows() == 1){
			return $result->row(0)->id;
		} 
		else {
			return false;
		}
	}

    //check_username_exixts
	public function check_username_exists($username){
		$query = $this->db->get_where('user', array('username' => $username));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}

	// Check email exists
	public function check_email_exists($email){
		$query = $this->db->get_where('user', array('email' => $email));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}

	public function get_email($email){
		$this->db->select('*');
		$this->db->where('email',$email);
		$query=$this->db->get('user');
		return $query->result_array();
	}

	public function set_tokan($enc_token,$email){

		$query=$this->db->query("update user set password='".$enc_token."' where email='".$email."'");
		return $query;
	}

	public function reset_password($password = false, $tokan = false){
		$query= $this->db->query("update user set password='".$password."' where password='".$tokan."'");
		return $query;
	}
	
	public function update_user($newpass,$user_id)
    	{
        $this->db->where('id', $user_id);
	  $query=$this->db->update('user', array('password'=>$newpass));
	  return $query;
    	}
}
?>
