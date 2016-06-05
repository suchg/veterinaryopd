<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('invoice_model');
        $this->load->helper('url');
    }
    
	public function viewStatus()
	{
		$statusBy = $this->input->get('statusBy');
		if($this->input->get())
		{
			$param = "";
			if($statusBy == "invoiceId")
			{
				$param['invoiceData'] = $this->invoice_model->statusGetInvoice();
			}elseIf($statusBy == "coontainerId")
			{
				$param['invoiceData'] = $this->invoice_model->getInvoiceByContainerId();
			}elseif($statusBy == "billNo")
			{
				$param['invoiceData'] = $this->invoice_model->getInvoiceByBillNo();
			}
			
			//print_r($param['invoiceData']);
			//echo $param['invoiceData']->invoiceId;	
			
			if($param['invoiceData']->invoiceId){
				$param['rootData'] = $this->invoice_model->getRoots($param['invoiceData']->invoiceId);
			}
			
			//print_r($param);
			//exit(); return false;
			
			echo json_encode($param);
		}
	}
	
}
