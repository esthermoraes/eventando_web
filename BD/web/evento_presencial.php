<?php
    include_once 'evento.php';

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
        private $buffet;
        /* Dados do buffet */
        
        /* Dados da localização */
        private $cep;
        private $numero;
        private $logradouro;
        private $FK_TIPO_LOGRADOURO_id_tipo_logradouro;
        private $bairro;
        private $cidade;
        private $estado;
        /* Dados da localização */

        /*Dados do tipo contato*/
        private $fk_TIPO_CONTATO_id_tipo_contato;
        private $contato;
        /*Dados do tipo contato*/

        private $evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null, $buffet = null, $cep =null, $numero = null, 
        $logradouro = null, $FK_TIPO_LOGRADOURO_id_tipo_logradouro = null, $bairro = null, $cidade = null, $estado = null, 
        $fk_TIPO_CONTATO_id_tipo_contato = null, $contato = null, $evento = null){

            $this->evento = new Evento($nome, $objetivo, $data_prevista, $horario, $src_img, $atracoes, $FK_USUARIO_id_usuario);

            $this->buffet = $buffet;
            
            $this->cep = $cep;
            $this->numero = $numero;
            $this->logradouro = $logradouro;
            $this->FK_TIPO_LOGRADOURO_id_tipo_logradouro = $FK_TIPO_LOGRADOURO_id_tipo_logradouro;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->estado = $estado;

            $this->fk_TIPO_CONTATO_id_tipo_contato = $fk_TIPO_CONTATO_id_tipo_contato;
            $this->contato = $contato;
        }

        public function insert(){
            try{
                //insere um evento genérico e retorna o id 
                if($this->evento->insert()){
                    $id_evento = $this->evento->getId();
                }

                $sql_estado = "INSERT INTO INSERT INTO ESTADO(estado) VALUES(:estado) ON CONFLICT 
                (ESTADO) DO NOTHING RETURNING id_cidade";
                $stmt_estado = Database::prepare($sql_estado);
                $stmt_estado->bindParam(':estado', $this->estado);
                $result_estado = $stmt_estado->execute();

                if($result_estado){
                    if ($stmt_estado->rowCount() > 0) {
                        // Obtem o ID retornado
                        $result = $stmt_estado->fetch(PDO::FETCH_ASSOC);
                        $id_estado = $result['id_estado'];

                        $sql_cidade = "INSERT INTO INSERT INTO CIDADE(cidade) VALUES(:cidade) ON CONFLICT 
                        (CIDADE) DO NOTHING RETURNING id_cidade";
                        $stmt_cidade = Database::prepare($sql_cidade);
                        $stmt_cidade->bindParam(':cidade', $this->cidade);
                        $result_cidade = $stmt_cidade->execute();

                        if($result_cidade){
                            if ($stmt_cidade->rowCount() > 0) {
                                // Obtem o ID retornado
                                $result = $stmt_cidade->fetch(PDO::FETCH_ASSOC);
                                $id_cidade = $result['id_cidade'];
                        
                                $sql_cidade_estado = "INSERT INTO POSSUI_CIDADE_ESTADO(fk_CIDADE_id_cidade, 
                                fk_ESTADO_id_estado) VALUES(:FK_CIDADE_id_cidade, :FK_ESTADO_id_estado)";
                                $stmt_cidade_estado = Database::prepare($sql_cidade_estado);
                                $stmt_cidade_estado->bindParam(':FK_CIDADE_id_cidade', $id_cidade, PDO::PARAM_INT);
                                $stmt_cidade_estado->bindParam(':FK_ESTADO_id_estado', $id_estado, PDO::PARAM_INT);
                                $result_cidade_estado = $stmt_cidade_estado->execute();

                                if($result_cidade_estado){
                                    $sql_bairro = "INSERT INTO INSERT INTO BAIRRO(bairro) VALUES(:bairro) ON CONFLICT 
                                    (CIDADE) DO NOTHING RETURNING id_bairro";
                                    $stmt_bairro = Database::prepare($sql_bairro);
                                    $stmt_bairro->bindParam(':bairro', $this->bairro);
                                    $result_bairro = $stmt_bairro->execute();

                                    if($result_bairro){
                                        if ($stmt_bairro->rowCount() > 0) {
                                            // Obtem o ID retornado
                                            $result = $stmt_bairro->fetch(PDO::FETCH_ASSOC);
                                            $id_bairro = $result['id_bairro'];
                    
                                            $sql_bairro_cidade = "INSERT INTO POSSUI_BAIRRO_CIDADE(fk_BAIRRO_id_bairro, 
                                            fk_CIDADE_id_cidade) VALUES(:FK_BAIRRO_id_bairro, :FK_CIDADE_id_cidade)";
                                            $stmt_bairro_cidade = Database::prepare($sql_bairro_cidade);
                                            $stmt_bairro_cidade->bindParam(':FK_BAIRRO_id_bairro', $id_bairro, PDO::PARAM_INT);
                                            $stmt_bairro_cidade->bindParam(':FK_CIDADE_id_cidade', $id_cidade, PDO::PARAM_INT);
                                            $result_bairro_cidade = $stmt_bairro_cidade->execute();

                                            if($result_bairro_cidade){
                                                // Tenta inserir os dados de localização
                                                $sql_localizacao = "INSERT INTO LOCALIZACAO(numero, logradouro, cep, FK_TIPO_LOGRADOURO_id_tipo_logradouro, 
                                                FK_BAIRRO_id_bairro) VALUES (:numero, :logradouro, :cep, :FK_TIPO_LOGRADOURO_id_tipo_logradouro, 
                                                :FK_BAIRRO_id_bairro)";
                                                $stmt = Database::prepare($sql_localizacao);
                                                $stmt->bindParam(':numero', $this->numero);
                                                $stmt->bindParam(':logradouro', $this->logradouro);
                                                $stmt->bindParam(':cep', $this->cep);
                                                $stmt->bindParam(':FK_TIPO_LOGRADOURO_id_tipo_logradouro', $this->FK_TIPO_LOGRADOURO_id_tipo_logradouro);
                                                $stmt->bindParam(':FK_BAIRRO_id_bairro', $id_bairro, PDO::PARAM_INT);
                                                $result = $stmt->execute();

                                                if ($result){
                                                    $id_localizacao = $this->id_localizacao = Database::getInstance()->lastInsertId();

                                                    $sql_buffet = "INSERT INTO buffet (buffet) VALUES (:buffet)";
                                                    $stmt = Database::prepare($sql_buffet);
                                                    $stmt->bindParam(':buffet', $this->buffet);
                                                    $result2 = $stmt->execute();

                                                    if($result2){
                                                        $id_buffet = $this->id_buffet = Database::getInstance()->lastInsertId();
                                                        
                                                        $sql = "INSERT INTO $this->table (FK_buffet_buffet_PK, FK_LOCALIZACAO_id_localizacao, FK_EVENTO_id_evento) 
                                                        VALUES (:id_buffet, :id_localizacao, :id_evento)";
                                                        $stmt = Database::prepare($sql);
                                                        $stmt->bindParam(':FK_buffet_buffet_PK', $id_buffet, PDO::PARAM_INT);
                                                        $stmt->bindParam(':FK_LOCALIZACAO_id_localizacao', $id_localizacao, PDO::PARAM_INT);
                                                        $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                                                        
                                                        $result3 = $stmt->execute();

                                                        if($result3){
                                                            $sql_contato = "INSERT INTO POSSUI_TIPO_CONTATO_EVENTO (fk_TIPO_CONTATO_id_tipo_contato, fk_EVENTO_id_evento, contato) 
                                                            VALUES (:fk_TIPO_CONTATO_id_tipo_contato, :id_evento, :contato)";
                                                            $stmt = Database::prepare($sql_contato);
                                                            $stmt->bindParam(':fk_TIPO_CONTATO_id_tipo_contato', $this->fk_TIPO_CONTATO_id_tipo_contato);
                                                            $stmt->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                                                            $stmt->bindParam(':contato', $this->contato);
                                                            return $stmt->execute();
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
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