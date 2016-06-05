<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('invoice_model');
        $this->load->model('customer_model');
        $this->load->helper('url');
    }
    
	public function addUpdate()
	{
		$custList = $this->customer_model->get_customers();
		
		if($this->input->post())
		{
			$invoiceId = $this->input->post('invoiceId');
			$this->invoice_model->addUpdate($invoiceId);
			redirect($this->config->base_url().'invoice/listing');
		}
		else if($this->input->get())
		{
			$param['invoiceData'] = $this->invoice_model->get_invoice();
			$param['custList'] = $custList;
			$param['rootList'] = $this->invoice_model->get_roots();
			$this->layout->load('invoice/addUpdate', $param);
		}
		else
		{
			$param['custList'] = $custList;
			$this->layout->load('invoice/addUpdate', $param);
		}
	}
	
	public function listing()
	{	
		$parse['invoiceList'] = $this->invoice_model->get_invoices();
		$this->layout->load('invoice/listing', $parse);
	}
	
	public function delete()
	{
		$invoiceId = $this->input->post('invoiceId');
		$this->invoice_model->deleteInvoice($invoiceId);
		redirect($this->config->base_url().'invoice/listing');
	}
}
