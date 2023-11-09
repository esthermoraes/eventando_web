<?php

    require_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com evento.

    Atributos:
    $nome- nome do evento
    $objetivo - objetivo do evento
    $data_prevista - data_prevista do evento
    $horario - horario do evento
    $src_img - src_img do evento
    $atracoes - atracoes do evento
    $FK_evento_id_evento - FK_evento_id_evento do evento

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
        private $FK_evento_id_evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_evento_id_evento = null){
            $this->nome = $nome;
            $this->objetivo = $objetivo;
            $this->data_prevista = $data_prevista;
            $this->horario = $horario;
            $this->src_img = $src_img;
            $this->atracoes = $atracoes;
            $this->FK_evento_id_evento = $FK_evento_id_evento;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table (nome, objetivo, data_prevista, horario, src_img, atracoes, FK_evento_id_evento) 
            VALUES (:nome, :objetivo, :data_prevista, :data_nasc, :horario, :src_img, :atracoes, :FK_evento_id_evento) 
            RETURNING id_evento";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':objetivo', $this->objetivo);
            $stmt->bindParam(':data_prevista', $this->data_prevista);
            $stmt->bindParam(':horario', $this->horario);
            $stmt->bindParam(':src_img', $this->src_img);
            $stmt->bindParam(':atracoes', $this->atracoes);
            $stmt->bindParam(':FK_evento_id_evento', $this->FK_evento_id_evento);
            $stmt->execute();
        }

        public function update(){
        }

        public function select($email) {
            $sql = 'SELECT id_usuario, nome, email, data_nasc, FK_ESTADO_id_estado, senha FROM ' . $this->table . ' WHERE email = ?';
            $stmt = Database::prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {
                return false;
            }
            $user_id = $user['id_usuario'];
            $state_id = $user['fk_estado_id_estado'];

            $sql2 = 'SELECT descricao FROM TEM_TIPO_CONTATO_USUARIO WHERE fk_USUARIO_id_usuario = ' .$user_id;
            $stmt2 = Database::prepare($sql2);
            $stmt2->execute();
            $telefone = $stmt2->fetch(PDO::FETCH_ASSOC);

            $sql3 = 'SELECT descricao FROM ESTADO WHERE id_estado = ' .$state_id;
            $stmt3 = Database::prepare($sql3);
            $stmt3->execute();
            $estado = $stmt3->fetch(PDO::FETCH_ASSOC);

            $resposta = array();
            $resposta['id_usuario'] = $user_id;
            $resposta['nome_usuario'] = $user["nome"];
            $resposta["email_usuario"] = $user["email"];
            $resposta["senha_usuario"] = $user["senha"];
            $resposta["data_nasc_usuario"] = $user["data_nasc"];
            $resposta["telefone_usuario"] = $telefone["descricao"];
            $resposta["estado_usuario"] = $estado["descricao"];

            return $resposta;
        }
    }
?>