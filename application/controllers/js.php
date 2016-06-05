<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Js extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('js_model');        
        $this->load->helper('url');
    }
	
	public function index()
	{
		$this->load->view('js');
		if($this->input->post())
		{
			$this->js_model->addUpdate();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */