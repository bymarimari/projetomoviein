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
     public function find($id){
        $this->campos = (array) $this->db->get_where($this->tabela, array($this->id_tabela => $id))->row();
    }

    public function get(){
        return $this->campos;
    }

    public function listar(){
        return $this->db->get_where($this->tabela)->result();
    }

    public function salvar(){
        $this->db->set(array('nome' => $this->campos['nome'], 'email' => $this->campos['email'], 'senha' => $this->campos['senha']));
        return empty($this->campos[$this->id_tabela]) ? $this->db->insert($this->tabela) : $this->db->update($this->tabela);
    }

    public function deletar(){
        return $this->db->delete($this->tabela, array($this->id_tabela => $this->campos[$this->id_tabela]));
    }
}
