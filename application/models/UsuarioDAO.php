<?php

class UsuarioDAO extends CI_Model{
    private $tabela;
    private $id_tabela;
    private $campos;
    
    public function __construct(){
        $this->tabela = 'usuario';
        $this->id_tabela = 'id_'.$this->tabela;
        $this->campos = array();
    }
    
    public function set($dados){
        $this->campos['nome'] = !empty($dados['nome']) ? $dados['nome'] : $this->campos['nome'];
        $this->campos['email'] = !empty($dados['email']) ? $dados['email'] : $this->campos['email'];
        $this->campos['senha'] = !empty($dados['senha']) ? $dados['senha'] : $this->campos['senha'];
    }
