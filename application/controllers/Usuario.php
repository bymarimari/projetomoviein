<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function inserir(){
		$this->load->model('Usuario_model');
		$result = $this->Usuario_model->inserir($this->input->post());
		echo json_encode($result);
	}
	
	public function login()
	{
		$email = $this->input->post('email', true);
		$senha = $this->input->post('senha', true);
		
		$this->load->model('Usuario_model');
		
		if($this->Usuario_model->autentica($email, $senha)){
			echo json_encode(array('tipo' => 'ok', 'mensagem' => 'Logado com sucesso!'));
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'E-mail ou senha incorretos'));
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('usuario');
		header('location: '.base_url());
	}
}
