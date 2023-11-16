<?php

    require_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com evento presencial.

    Atributos:
    $FK_buffet_buffet_PK- FK_buffet_buffet_PK do evento presencial
    $FK_LOCALIZACAO_id_localizacao - FK_LOCALIZACAO_id_localizacao do evento presencial
    $FK_evento_id_evento - FK_evento_id_evento do evento presencial

    Métodos:
    insert - insere um evento presencial na tabela evento presencial
    update - atualiza um evento presencial na tabela evento presencial
    *************************************************************/

    class EventoPresencial extends Evento{
        protected $table = 'EVENTO PRESENCIAL';

        /* Dados do buffet */
        private $FK_buffet_buffet_PK;
        private $buffet;
        /* Dados do buffet */
        
        /* Dados da localização */
        private $FK_LOCALIZACAO_id_localizacao;
        private $cep;
        private $numero;
        /* Dados da localização */

        private $FK_EVENTO_id_evento;
        private $evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null, $FK_buffet_buffet_PK = null, $buffet = null, 
        $FK_LOCALIZACAO_id_localizacao = null, $cep =null, $numero = null, $FK_EVENTO_id_evento = null){

            $evento = new Evento($nome, $objetivo, $data_prevista, $horario, $src_img, $atracoes, $FK_USUARIO_id_usuario);

            $this->FK_buffet_buffet_PK = $FK_buffet_buffet_PK;
            $this->buffet = $buffet;
            $this->FK_LOCALIZACAO_id_localizacao = $FK_LOCALIZACAO_id_localizacao;
            $this->cep = $cep;
            $this->numero = $numero;
            $this->FK_EVENTO_id_evento = $FK_EVENTO_id_evento;
        }

        public function insert(){

            try{
                //insere um evento genérico e retorna o id 
                $id_evento = $evento.INSERT();

                // Tenta inserir os dados de localização
                $sql_localizacao = "INSERT INTO LOCALIZACAO (cep, numero) VALUES (:cep, :numero)";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':cep', $this->cep);
                $stmt->bindParam(':numero', $this->numero);
                $result = $stmt->execute();

                if ($result){
                    $id_localizacao = $this->id_localizacao = Database::getInstance()->lastInsertId();

                    $sql_buffet = "INSERT INTO buffet (buffet) VALUES (:buffet)";
                    $stmt = Database::prepare($sql);
                    $stmt->bindParam(':buffet', $this->buffet);
                    $result2 = $stmt->execute();

                    if($result2){
                        $id_buffet = $this->id_buffet = Database::getInstance()->lastInsertId();
                        
                        $sql = "INSERT INTO $this->table (FK_buffet_buffet_PK, FK_LOCALIZACAO_id_localizacao, FK_EVENTO_id_evento) 
                        VALUES (:id_buffet, :id_localizacao, :id_evento)";
                        $stmt = Database::prepare($sql);
                        $stmt->bindParam(':FK_buffet_buffet_PK', id_buffet, PDO::PARAM_INT);
                        $stmt->bindParam(':FK_LOCALIZACAO_id_localizacao', $id_localizacao, PDO::PARAM_INT);
                        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT); // Obtém o ID do evento
                        
                        return $stmt->execute();
                    }
                }
                    
            } 
            catch (PDOException $e) {
                // Lidar com exceções de banco de dados, se necessário
                return $e->getMessage();
            } 
        }

        public function update(){
        }
    }
?>