<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout 
{
	public function __construct($layout = '')
	{
		$this->obj =& get_instance();
		$this->layout = $layout;
		$this->js = $this->css = $this->placeholder = array();
	}

    public function load($view, $viewParam = null)
    {    	
    	$string = $this->obj->load->view($view, $viewParam, true);
    	$param['content'] = $string;
    	
    	//$param = array_merge($param);
    	
    	$this->obj->load->view('layout/default', $param);
    }
}

?>