<?php

class Curiosidades_model extends CI_Model{
    private $nome;
    
     public function __construct(){
        $this->load->model('CuriosidadesDAO');
    }