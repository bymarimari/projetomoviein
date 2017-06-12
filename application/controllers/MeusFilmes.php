<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeusFilmes extends CI_Controller {
	public $public;
	
	public function __construct(){
		parent::__construct();
		$this->public = base_url().'public/';
	}
	
	public function index()
	{
		if ($this->session->has_userdata('usuario')) {
			$usuario = $this->session->userdata('usuario');
			
			if ($usuario['tipo'] == 1) {
				
				$dados = array();
				$dados['pagina'] = 'meusfilmes';
				
				$this->load->model('Filmes_model');
				$dados['assistes'] = $this->Filmes_model->listar_assiste();
				
				$this->load->view('base', $dados);
			
			} else {
				header('location: '.base_url());
			}
		} else {
			header('location: '.base_url());
		}
	}
	
	
	
	public function excluir()
	{
		if ($this->session->has_userdata('usuario')) {

			$this->load->model('Filmes_model');
			
			if ($this->Filmes_model->excluir_assiste($this->input->post('id'))) {
				echo json_encode(array('tipo' => 'ok', 'mensagem' => 'Excluído com sucesso!'));
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Houve algum erro ao excluir este filme.'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado para realizar esta ação! :P'));
		}
	}
}