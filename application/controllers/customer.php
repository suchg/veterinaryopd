<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->helper('url');
    }
    
	public function addUpdate()
	{
		if($this->input->post())
		{
			$custId = $this->input->post('custId');
			$this->customer_model->addUpdate($custId);
			//redirect($this->config->base_url().'customer/listing');
			header("Location:".$this->config->base_url().'customer/listing');
			return false;
		}
		else if($this->input->get())
		{
			$param['custData'] = $this->customer_model->get_customer();
			$this->layout->load('customer/addUpdate', $param);
		}
		else
		{
			$this->layout->load('customer/addUpdate');
		}
	}
	
	public function listing()
	{	
		$parse['custList'] = $this->customer_model->get_customers();
		$this->layout->load('customer/listing', $parse);
	}
}
