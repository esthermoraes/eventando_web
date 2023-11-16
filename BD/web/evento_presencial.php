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
        private $FK_buffet_buffet_PK;
        
        /* Dados da localização */
        private $FK_LOCALIZACAO_id_localizacao;
        private $cep;
        

        /* Dados da localização */

        private $FK_EVENTO_id_evento;

        public function __construct($FK_buffet_buffet_PK = null, $FK_LOCALIZACAO_id_localizacao = null, 
        $FK_EVENTO_id_evento = null, $cep =null){
            $this->FK_buffet_buffet_PK = $FK_buffet_buffet_PK;
            $this->FK_LOCALIZACAO_id_localizacao = $FK_LOCALIZACAO_id_localizacao;
            $this->FK_EVENTO_id_evento = $FK_EVENTO_id_evento;
        }

        public function insert(){

            try{

                $sqllocalizaca= 'insert into localizacao(cep,logradouro) value'


                $sql = "INSERT INTO $this->table (FK_buffet_buffet_PK, FK_LOCALIZACAO_id_localizacao, FK_EVENTO_id_evento) 
                VALUES (:FK_buffet_buffet_PK, :FK_LOCALIZACAO_id_localizacao, :id_evento)";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':FK_buffet_buffet_PK', $this->FK_buffet_buffet_PK);
                $stmt->bindParam(':FK_LOCALIZACAO_id_localizacao', $this->FK_LOCALIZACAO_id_localizacao);
                $stmt->bindParam(':id_evento', $this->FK_EVENTO_id_evento, PDO::PARAM_INT); // Obtém o ID do evento
                
                return $stmt->execute();
                    
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