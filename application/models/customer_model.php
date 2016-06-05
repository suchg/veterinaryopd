<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {
	
	/*This is to insert data on database*/
	public function addUpdate($custId)
	{
		/*array('field'=>$this->input->post('name of your input form field'))*/
	
		$data = array(
						'custName' => $this->input->post('txtName'),
		                'custAddress' => $this->input->post('txtAddress'),
						'custMob' => $this->input->post('txtMobile'),
						'emailAddr' => $this->input->post('txtEmailAddress'),
						//'altEmailAddr' => preg_replace('#\s+#',',',trim($this->input->post('txtAltEmails'))),
						'altEmailAddr' => $this->input->post('txtAltEmails'),
						'deleted' => '0',
						'status' => '1'
					 );
		if($custId)
		{
			$this->db->where('custId', $custId);
			$this->db->update('customermaster',$data);
			return false;
		}else
		{
			$this->db->insert('customermaster',$data);
		}
	}

	public function get_customers()
	{
		$query= $this->db->get('customermaster');
		return $query->result();
	}
	
	public function get_customer()
	{
		$query= $this->db->get('customermaster');
		$query = $this->db->query("SELECT * FROM customermaster WHERE custId = ".$this->input->get('custId'));
		$result = $query->result();
		return $result[0];
	}
}

?>