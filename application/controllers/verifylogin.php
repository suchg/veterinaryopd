<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('welcome', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
 function update()
 {	
 	$result = $this->user->getUser();
 	$params = array(
 			'username' => $result->username,
 			'password' => $result->password,
 			'emailId' => $result->emailId
 	);
 	
 	
 	if($this->input->post('txtUserName'))
 	{
 		$this->user->update();
 		
 		$config = array();
 		$config['protocol'] = 'sendmail';
 		$config['mailpath'] = '/usr/sbin/sendmail';
 		$config['charset'] = 'iso-8859-1';
 		$config['wordwrap'] = TRUE;
 		
 		//$this->email->initialize($config);
 		
 		$config['mailtype'] = 'html';
 		$config['charset']  = 'utf-8';
 		$config['newline']  = "\r\n";
 		$config['wordwrap'] = TRUE;
 		 
 		$this->load->library('email');
 		$this->email->initialize($config);
 		
 		 
 		$this->email->from('info@chetan-traders.com', 'CHETAN TRADERS');
 		$this->email->to($result->emailId);
 		 		
 		$this->email->subject('Your updated profile details');
 		
 		$mailHtml = 'Your updated profile details are as follows <br />';
 		$mailHtml .= 'Username: '.$this->input->post('txtUserName') . '<br />';
 		$mailHtml .= 'Email ID: '.$this->input->post('txtEmailAddress') . '<br />';
 		$mailHtml .= 'Password: '.$this->input->post('txtNewPassword') . '<br />';
 		$mailHtml .= '<div style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#878686;line-height:15px;text-align:center">Note: For your privacy and protection, please do not forward this mail to anyone as it allows you to get automatically logged into your account.</div>';
 		
 		$this->email->message($mailHtml);
 		
 		if($this->email->send())
 		{
 			$params['msgMailSend'] = '<div style="color:green;" class="msgFrm">Profile updated successfully, mail sent on your email ID.</div>';
 		}
 		
 	}
 	
 	$this->layout->load('user_setting', $params);
 	
 }
 
 
}
?>