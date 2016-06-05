<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function update()
 {
 	$data = array(
 			'username' => $this->input->post('txtUserName'),
 			'password' => md5( $this->input->post('txtNewPassword') ),
 			'emailId' => $this->input->post('txtEmailAddress')
 	);
 	
 	$loginData = $this->session->userdata('logged_in');
 	
 	if( isset($loginData['id']) && $loginData['id'])
 	{
	 	$this->db->where('id', $loginData['id']);
	 	$this->db->update('users',$data);
 	}
 }
 
 function getUser()
 {
 	 
 	$loginData = $this->session->userdata('logged_in');
 
 	if( isset($loginData['id']) && $loginData['id'])
 	{
 		$query = $this->db->query("SELECT * FROM users WHERE id = ".$loginData['id'] );
	 	$result = $query->result();
	 	return $result[0];
 	}
 	
 }
 
}
?>