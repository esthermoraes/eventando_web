<?php

    include_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com evento.

    Atributos:
    $nome- nome do evento
    $objetivo - objetivo do evento
    $data_prevista - data_prevista do evento
    $horario - horario do evento
    $src_img - src_img do evento
    $atracoes - atracoes do evento
    $FK_USUARIO_id_usuario - FK_USUARIO_id_usuario do criador do evento

    Métodos:
    insert - insere um evento na tabela evento
    update - atualiza um evento na tabela evento
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
            $sql = "INSERT INTO $this->table (nome, objetivo, data_prevista, horario, src_img, atracoes, FK_USUARIO_id_usuario) 
            VALUES (:nome, :objetivo, :data_prevista, :data_nasc, :horario, :src_img, :atracoes, :FK_USUARIO_id_usuario)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':objetivo', $this->objetivo);
            $stmt->bindParam(':data_prevista', $this->data_prevista);
            $stmt->bindParam(':horario', $this->horario);
            $stmt->bindParam(':src_img', $this->src_img);
            $stmt->bindParam(':atracoes', $this->atracoes);
            $stmt->bindParam(':FK_USUARIO_id_usuario', $this->FK_USUARIO_id_usuario);

            if ($stmt->execute()){
                // Recupere o ID inserido
                $this->id_evento = Database::getInstance()->lastInsertId();
                return true;
            }
            return false;
        }

        public function getId(){
            return $this->id_evento;
        }

        public function update($id){
        }
    }
?>