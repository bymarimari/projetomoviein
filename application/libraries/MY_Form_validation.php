<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Form_validation extends CI_Form_validation {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_error_prefix = '';
		$this->_error_suffix = '';
	}
}