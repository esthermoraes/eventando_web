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
        protected $table = 'EVENTO_PRESENCIAL';

        /* Dados do buffet */
        private $buffet;
        /* Dados do buffet */
        
        /* Dados da localização */
        private $cep;
        private $numero;
        private $logradouro;
        private $tipo_logradouro;
        private $bairro;
        private $cidade;
        private $estado;
        /* Dados da localização */

        /*Dados do tipo contato*/
        private $tipo_contato;
        private $contato;
        /*Dados do tipo contato*/

        private $evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $FK_USUARIO_id_usuario = null, $buffet = null, $cep =null, $numero = null, 
        $logradouro = null, $tipo_logradouro = null, $bairro = null, $cidade = null, $estado = null, 
        $tipo_contato = null, $contato = null){

            $this->evento = new Evento($nome, $objetivo, $data_prevista, $horario, $src_img, $atracoes, 
            $FK_USUARIO_id_usuario);

            $this->buffet = $buffet;
            
            $this->cep = $cep;
            $this->numero = $numero;
            $this->logradouro = $logradouro;
            $this->tipo_logradouro = $tipo_logradouro;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->estado = $estado;

            $this->tipo_contato = $tipo_contato;
            $this->contato = $contato;
        }


        public function insert(){
            try{
                //insere um evento genérico e retorna o id 
                if($this->evento->insert()){
                    $id_evento = $this->evento->getId();
                }

                $sql_estado = "SELECT id_estado FROM ESTADO WHERE estado = (:estado)";
                $stmt_estado = Database::prepare($sql_estado);
                $stmt_estado->bindParam(':estado', $this->estado);
                $result_estado = $stmt_estado->execute();

                if($result_estado !== false){
                    if ($stmt_estado->rowCount() > 0) {
                        $result = $stmt_estado->fetch(PDO::FETCH_ASSOC);
                        $id_estado = $result['id_estado'];

                        $sql_cidade = "INSERT INTO CIDADE(cidade) VALUES(:cidade) RETURNING id_cidade";
                        $stmt_cidade = Database::prepare($sql_cidade);
                        $stmt_cidade->bindParam(':cidade', $this->cidade);
                        $result_cidade = $stmt_cidade->execute();

                        if($result_cidade){
                            // Obtem o ID retornado
                            $id_cidade = $stmt_cidade->fetchColumn();
                    
                            $sql_cidade_estado = "INSERT INTO POSSUI_CIDADE_ESTADO(fk_CIDADE_id_cidade, 
                            fk_ESTADO_id_estado) VALUES(:FK_CIDADE_id_cidade, :FK_ESTADO_id_estado)";
                            $stmt_cidade_estado = Database::prepare($sql_cidade_estado);
                            $stmt_cidade_estado->bindParam(':FK_CIDADE_id_cidade', $id_cidade, PDO::PARAM_INT);
                            $stmt_cidade_estado->bindParam(':FK_ESTADO_id_estado', $id_estado, PDO::PARAM_INT);
                            $result_cidade_estado = $stmt_cidade_estado->execute();

                            if($result_cidade_estado){
                                $sql_bairro = "INSERT INTO BAIRRO(bairro) VALUES(:bairro) RETURNING id_bairro";
                                $stmt_bairro = Database::prepare($sql_bairro);
                                $stmt_bairro->bindParam(':bairro', $this->bairro);
                                $result_bairro = $stmt_bairro->execute();

                                if($result_bairro){
                                    $id_bairro = $stmt_bairro->fetchColumn();
                
                                    $sql_bairro_cidade = "INSERT INTO POSSUI_BAIRRO_CIDADE(fk_BAIRRO_id_bairro, 
                                    fk_CIDADE_id_cidade) VALUES(:FK_BAIRRO_id_bairro, :FK_CIDADE_id_cidade)";
                                    $stmt_bairro_cidade = Database::prepare($sql_bairro_cidade);
                                    $stmt_bairro_cidade->bindParam(':FK_BAIRRO_id_bairro', $id_bairro, PDO::PARAM_INT);
                                    $stmt_bairro_cidade->bindParam(':FK_CIDADE_id_cidade', $id_cidade, PDO::PARAM_INT);
                                    $result_bairro_cidade = $stmt_bairro_cidade->execute();

                                    if($result_bairro_cidade){
                                        $sql_tpLogradouro = "SELECT id_tipo_logradouro FROM TIPO_LOGRADOURO WHERE tipo_logradouro = (:tipo_logradouro)";
                                        $stmt_tpLogradouro = Database::prepare($sql_tpLogradouro);
                                        $stmt_tpLogradouro->bindParam(':tipo_logradouro', $this->tipo_logradouro);
                                        $result_tpLogradouro = $stmt_tpLogradouro->execute();
    
                                        if($result_tpLogradouro !== false){
                                            if ($stmt_tpLogradouro->rowCount() > 0) {
                                                // Obtem o ID retornado
                                                $result = $stmt_tpLogradouro->fetch(PDO::FETCH_ASSOC);
                                                $id_tipo_logradouro = $result['id_tipo_logradouro'];

                                                // Tenta inserir os dados de localização
                                                $sql_localizacao = "INSERT INTO LOCALIZACAO(numero, logradouro, cep, tipo_logradouro, 
                                                FK_BAIRRO_id_bairro) VALUES (:numero, :logradouro, :cep, :tipo_logradouro, 
                                                :FK_BAIRRO_id_bairro)";
                                                $stmt_localizacao = Database::prepare($sql_localizacao);
                                                $stmt_localizacao->bindParam(':numero', $this->numero);
                                                $stmt_localizacao->bindParam(':logradouro', $this->logradouro);
                                                $stmt_localizacao->bindParam(':cep', $this->cep);
                                                $stmt_localizacao->bindParam(':tipo_logradouro', $id_tipo_logradouro, PDO::PARAM_INT);
                                                $stmt_localizacao->bindParam(':FK_BAIRRO_id_bairro', $id_bairro, PDO::PARAM_INT);
                                                echo ("numero: " . $this->numero . "<br>");
                                                echo ("logradouro: " . $this->logradouro . "<br>");
                                                echo ("cep: " . $this->cep . "<br>");
                                                echo ("tipo_logradouro: " . $id_tipo_logradouro . "<br>");
                                                echo ("FK_BAIRRO_id_bairro: " . $id_bairro . "<br>");
                                                echo ("fffffff aaaaaaaaa <br>");
                                                $result_localizacao = $stmt_localizacao->execute();
                                                echo ("fffffff aaaaaaaaa <br>");

                                                if ($result_localizacao){
                                                    echo ("fffffff aaaaaaaaa <br>");
                                                    $id_localizacao = $this->id_localizacao = Database::getInstance()->lastInsertId();

                                                    $sql_buffet = "INSERT INTO buffet (buffet) VALUES (:buffet)";
                                                    $stmt_buffet = Database::prepare($sql_buffet);
                                                    $stmt_buffet->bindParam(':buffet', $this->buffet);
                                                    $result_buffet = $stmt_buffet->execute();

                                                    if($result_buffet){
                                                        $id_buffet = $this->id_buffet = Database::getInstance()->lastInsertId();

                                                        $sql_presencial = "INSERT INTO $this->table (FK_buffet_buffet_PK, FK_LOCALIZACAO_id_localizacao, FK_EVENTO_id_evento) 
                                                        VALUES (:id_buffet, :id_localizacao, :id_evento)";
                                                        $stmt_presencial = Database::prepare($sql_presencial);
                                                        $stmt_presencial->bindParam(':FK_buffet_buffet_PK', $id_buffet, PDO::PARAM_INT);
                                                        $stmt_presencial->bindParam(':FK_LOCALIZACAO_id_localizacao', $id_localizacao, PDO::PARAM_INT);
                                                        $stmt_presencial->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                                                        $result_presencial = $stmt_presencial->execute();

                                                        if($result_presencial){
                                                            $sql_contato = "INSERT INTO POSSUI_TIPO_CONTATO_EVENTO (tipo_contato, fk_EVENTO_id_evento, contato) 
                                                            VALUES (:tipo_contato, :id_evento, :contato)";
                                                            $stmt_contato = Database::prepare($sql_contato);
                                                            $stmt_contato->bindParam(':tipo_contato', $this->tipo_contato);
                                                            $stmt_contato->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                                                            $stmt_contato->bindParam(':contato', $this->contato);
                                                            return $stmt_contato->execute();

                                                        }
                                                    }           
                                                } 
                                                else{
                                                    echo ("error aaaaaaaaa <br>");
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