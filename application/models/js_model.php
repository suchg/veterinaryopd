<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Js_model extends CI_Model {
	
	/*This is to insert data on database*/
	public function addUpdate()
	{
		$data = array(			
						'name'		=> $this->input->post('name'),
						'content1'		=> $this->input->post('fld1'),
						'content2'	=> $this->input->post('fld2')
					 );
			
		$this->db->insert('js',$data);
	}

	
	
}
?>