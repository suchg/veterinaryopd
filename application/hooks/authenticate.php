<?php
class Authenticate{
	var $CI;

	function __construct(){
		$this->CI =& get_instance();
	}

	function loginCheck() {
		// This function will run after the constructor for the controller is ran
		// Set any initial values here
		$CI = $this->CI;
		$curretnClass = $CI->router->fetch_class();
		$curretnMethod = $CI->router->fetch_method();
		//echo  $CI->session->userdata('logged_in');
		
		$directAccess = array('login', 'verifylogin', 'mailSend', 'status');
		
		if( !in_array($curretnClass, $directAccess))
		{
			if(!$CI->session->userdata('logged_in'))
			{
				redirect('login');
			}
		}
		
	}
}
?>