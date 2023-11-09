<?php

    require_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com o usuario.

    Atributos:
    $nome- nome do usuario
    $data_nasc - data de nascimento do usuario
    $FK_ESTADO_id_estado - estado do usuario
    $telefone - telefone do usuario
    $email - email do usuario
    $senha - senha do usuario

    Métodos:
    insert - insere um usuario na tabela usuario
    update - atualiza um usuario na tabela usuario
    *************************************************************/

    class Evento extends CRUD{
        protected $table = 'EVENTO';
        private $nome;
        private $objetivo;
        private $data_prevista;
        private $horario;
        private $src_img;
        private $atracoes;
        private $FK_USUARIO_id_usuario;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null){
            $this->nome = $nome;
            $this->objetivo = $objetivo;
            $this->data_prevista = $data_prevista;
            $this->horario = $horario;
            $this->src_img = $src_img;
            $this->atracoes = $atracoes;
            $this->FK_USUARIO_id_usuario = $FK_USUARIO_id_usuario;
        }

        public function insert(){
        }

        public function update(){
        }
    }
?>