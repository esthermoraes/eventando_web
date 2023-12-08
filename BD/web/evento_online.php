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

        public function select($id) {
            $sql = 'SELECT * FROM EVENTO_ONLINE
                    INNER JOIN EVENTO ON EVENTO_ONLINE.FK_EVENTO_id_evento = EVENTO.id_evento INNER JOIN 
                    POSSUI_TIPO_CONTATO_EVENTO ON EVENTO.id_evento = POSSUI_TIPO_CONTATO_EVENTO.FK_EVENTO_id_evento
                    WHERE EVENTO_ONLINE.FK_EVENTO_id_evento =  ?';
            $stmt = Database::prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Verifica se o evento foi encontrado.
            if ($evento === false) {
                return false;
            }
        
            // Obtém o ID da plataforma e o ID do tipo de contato.
            $plataforma_id = isset($evento['fk_plataforma_plataforma_pk']) ? $evento['fk_plataforma_plataforma_pk'] : null;
            $tipo_contato_id = isset($evento['fk_tipo_contato_id_tipo_contato']) ? $evento['fk_tipo_contato_id_tipo_contato'] : null;
        
            // Consulta para obter a plataforma.
            $plataforma = null;
            if ($plataforma_id !== null) {
                $sqlPlataforma = 'SELECT plataforma FROM plataforma WHERE plataforma_PK = ?';
                $stmtPlataforma = Database::prepare($sqlPlataforma);
                $stmtPlataforma->bindParam(1, $plataforma_id);
                $stmtPlataforma->execute();
                $plataforma = $stmtPlataforma->fetch(PDO::FETCH_ASSOC);
            }
        
            // Consulta para obter o tipo de contato.
            $tipo_contato = null;
            if ($tipo_contato_id !== null) {
                $sqlTipoContato = 'SELECT tipo_contato FROM TIPO_CONTATO WHERE id_tipo_contato = ?';
                $stmtTipoContato = Database::prepare($sqlTipoContato);
                $stmtTipoContato->bindParam(1, $tipo_contato_id);
                $stmtTipoContato->execute();
                $tipo_contato = $stmtTipoContato->fetch(PDO::FETCH_ASSOC);
            }
        
            // Monta um array com as informações do evento e retorna.
            $resposta = array();
            
            $resposta['id_evento'] = $evento['id_evento'];
            $resposta["nome"] = $evento['nome'];
            $resposta["privacidade_restrita"] = $evento['privacidade_restrita'];
            $resposta["src_img"] = $evento['src_img'];
            $resposta["data_prevista"] = $evento['data_prevista'];
            $resposta["horario"] = $evento['horario'];
            $resposta["objetivo"] = $evento['objetivo'];
            $resposta["atracoes"] = $evento['atracoes'];
            $resposta["link"] = $evento['link']; 
            $resposta['plataforma_evento'] = isset($plataforma['plataforma']) ? $plataforma['plataforma'] : null;
            $resposta['tipo_contato_evento'] = isset($tipo_contato['tipo_contato']) ? $tipo_contato['tipo_contato'] : null;
            $resposta["contato"] = $evento['contato'];
        
            return $resposta;
        }
        
        
    }
?>