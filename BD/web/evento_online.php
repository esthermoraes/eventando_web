<?php

    include_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com evento online.

    Atributos:
    $link- link do evento online
    $FK_plataforma_plataforma_PK - FK_plataforma_plataforma_PK do evento online
    $FK_evento_id_evento - FK_evento_id_evento do evento online

    Métodos:
    insert - insere um evento online na tabela evento online
    update - atualiza um evento online na tabela evento online
    *************************************************************/

    class EventoOnline extends Evento{
        protected $table = 'EVENTO ONLINE';
        private $link;
        private $FK_plataforma_plataforma_PK;
        private $FK_EVENTO_id_evento;
        private $evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null, $link = null, $FK_plataforma_plataforma_PK = null, 
        $FK_EVENTO_id_evento = null){

            //cria um evento genérico
            $this->evento = new Evento($nome, $objetivo, $data_prevista, $horario, $src_img, $atracoes, $FK_USUARIO_id_usuario);

            $this->link = $link;
            $this->FK_plataforma_plataforma_PK = $FK_plataforma_plataforma_PK;
            $this->FK_EVENTO_id_evento = $FK_EVENTO_id_evento;
        }

        public function insert(){
            try {
                //insere um evento genérico e retorna o id 
                if($this->evento->insert()){
                    $id_evento = $this->evento->getId();
                }

                // Tenta inserir os dados específicos de evento online
                $sql = "INSERT INTO $this->table (link, FK_plataforma_plataforma_PK, FK_EVENTO_id_evento) 
                VALUES (:link, :FK_plataforma_plataforma_PK, :id_evento)";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':link', $this->link);
                $stmt->bindParam(':FK_plataforma_plataforma_PK', $this->FK_plataforma_plataforma_PK);
                $stmt->bindParam(':id_evento', $id_evento , PDO::PARAM_INT); // Obtém o ID do evento
    
                return $stmt->execute();
                    
            } 
            catch (PDOException $e) {
                // Lidar com exceções de banco de dados, se necessário
                return $e->getMessage();
            } 
        }

        public function update($id){
        }
    }
?>