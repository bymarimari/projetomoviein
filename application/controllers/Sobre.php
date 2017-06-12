<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre extends CI_Controller {
	public $public;
	
	public function __construct(){
		parent::__construct();
		$this->public = base_url().'public/';
	}
	
	public function index()
	{
		$dados = array();
		$dados['pagina'] = 'sobre';
		
		$this->load->view('base', $dados);
	}
}
