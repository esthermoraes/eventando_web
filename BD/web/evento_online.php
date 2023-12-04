<?php
    include_once 'evento.php';

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
        protected $table = 'EVENTO_ONLINE';

        /*Dados do online*/
        private $link;
        private $FK_plataforma_plataforma_PK;
        /*Dados do online*/

        /*Dados do tipo contato*/
        private $fk_TIPO_CONTATO_id_tipo_contato;
        private $contato;
        /*Dados do tipo contato*/

        private $evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null, $link = null, $FK_plataforma_plataforma_PK = null, 
        $fk_TIPO_CONTATO_id_tipo_contato = null, $contato = null){

            //cria um evento genérico
            $this->evento = new Evento($nome, $objetivo, $data_prevista, $horario, $src_img, $atracoes, $FK_USUARIO_id_usuario);

            $this->link = $link;
            $this->FK_plataforma_plataforma_PK = $FK_plataforma_plataforma_PK;

            $this->fk_TIPO_CONTATO_id_tipo_contato = $fk_TIPO_CONTATO_id_tipo_contato;
            $this->contato = $contato;
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
    
                $result = $stmt->execute();

                if($result){
                    $sql_contato = "INSERT INTO POSSUI_TIPO_CONTATO_EVENTO (fk_TIPO_CONTATO_id_tipo_contato, fk_EVENTO_id_evento, contato) 
                    VALUES (:fk_TIPO_CONTATO_id_tipo_contato, :id_evento, :contato)";
                    $stmt = Database::prepare($sql_contato);
                    $stmt->bindParam(':fk_TIPO_CONTATO_id_tipo_contato', $this->fk_TIPO_CONTATO_id_tipo_contato);
                    $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                    $stmt->bindParam(':contato', $this->contato);
                    return $stmt->execute();
                }
                    
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