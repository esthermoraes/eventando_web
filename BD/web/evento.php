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
    $FK_USUARIO_id_usuario - FK_USUARIO_id_usuario do user do evento

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
        private $email_user;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $email_user = null){
            $this->nome = $nome;
            $this->objetivo = $objetivo;
            $this->data_prevista = $data_prevista;
            $this->horario = $horario;
            $this->src_img = $src_img;
            $this->atracoes = $atracoes;
            $this->email_user = $email_user;
        }

        public function insert(){
            $sql_user = "SELECT id_usuario FROM $this->table WHERE email = (:email)";

            echo($sql_user);

            // $stmt_user = Database::prepare($sql_user);
            // $stmt_user->bindParam(":email", $this->email_user);
            // $stmt_user->execute();
            // $id_user = $stmt_user->fetchColumn();
        
            if($id_user) {
                $sql = "INSERT INTO $this->table (nome, objetivo, data_prevista, horario, src_img, atracoes, FK_USUARIO_id_usuario) 
                VALUES (:nome, :objetivo, :data_prevista, :data_nasc, :horario, :src_img, :atracoes, :FK_USUARIO_id_usuario)";
                // $stmt = Database::prepare($sql);
                // $stmt->bindParam(':nome', $this->nome);
                // $stmt->bindParam(':objetivo', $this->objetivo);
                // $stmt->bindParam(':data_prevista', $this->data_prevista);
                // $stmt->bindParam(':horario', $this->horario);
                // $stmt->bindParam(':src_img', $this->src_img);
                // $stmt->bindParam(':atracoes', $this->atracoes);
                // $stmt->bindParam(':FK_USUARIO_id_usuario', $id_user, PDO::PARAM_INT);

                // if ($stmt->execute()){
                //     // Recupere o ID inserido
                //     $this->id_evento = Database::getInstance()->lastInsertId();
                //     return true;
                // }
                // return false;
                echo($sql);
            }
        }

        public function getId(){
            return $this->id_evento;
        }

        public function selectEventosR(){
            $sql_user = "SELECT id_usuario FROM $this->table WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $this->email_user);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
        
            if($id_user) {
                $sql_eR = " SELECT id_evento, img_src FROM $this->table WHERE FK_USUARIO_id_usuario != (:id_user) ORDER BY 
                data_prevista DESC LIMIT 10";
                $stmt_eR = Database::prepare($sql_eR);
                $stmt_eR->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_eR->execute();
            }
        }

        public function selectMyEventos(){
            $sql_user = "SELECT id_usuario FROM $this->table WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $this->email_user);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
            
            if($id_user) {
                $sql_myE = "SELECT id_evento, img_src FROM $this->table WHERE FK_USUARIO_id_usuario = (:id_user) LIMIT 8";
                $stmt_myE = Database::prepare($sql_myE);
                $stmt_myE->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_myE->execute();
            }  
        }

        public function selectCalendar(){
            $sql_user = "SELECT id_usuario FROM $this->table WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $this->email_user);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
        
            if($id_user) {
                $sql_eR = " SELECT id_evento, data_prevista, nome, horario FROM $this->table WHERE FK_USUARIO_id_usuario != (:id_user) ORDER BY 
                data_prevista LIMIT 10";
                $stmt_eR = Database::prepare($sql_eR);
                $stmt_eR->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_eR->execute();
            }
        }

        public function favorita(){

        }

        public function selectFavoritos(){
            
        }

        public function update($id){
        }
    }
?>