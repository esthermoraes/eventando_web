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

    class evento extends Evento{
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

                // Check if estado already exists
                $sql_estado_check = "SELECT id_estado FROM ESTADO WHERE estado = (:estado)";
                $stmt_estado_check = Database::prepare($sql_estado_check);
                $stmt_estado_check->bindParam(':estado', $this->estado);
                $result_estado_check = $stmt_estado_check->execute();

                if ($result_estado_check !== false) {
                    if ($stmt_estado_check->rowCount() > 0) {
                        // Estado already exists, retrieve its ID
                        $result_estado = $stmt_estado_check->fetch(PDO::FETCH_ASSOC);
                        $id_estado = $result_estado['id_estado'];
                    } 
                    else {
                        // Estado doesn't exist, insert and retrieve ID
                        $sql_insert_estado = "INSERT INTO ESTADO(estado) VALUES(:estado) RETURNING id_estado";
                        $stmt_insert_estado = Database::prepare($sql_insert_estado);
                        $stmt_insert_estado->bindParam(':estado', $this->estado);
                        $result_insert_estado = $stmt_insert_estado->execute();

                        if ($result_insert_estado) {
                            $id_estado = $stmt_insert_estado->fetchColumn();
                        } else {
                            // Handle the error or return an error message
                            echo "Error inserting estado";
                            return;
                        }
                    }

                    // Check if cidade already exists
                    $sql_cidade_check = "SELECT id_cidade FROM CIDADE WHERE cidade = (:cidade)";
                    $stmt_cidade_check = Database::prepare($sql_cidade_check);
                    $stmt_cidade_check->bindParam(':cidade', $this->cidade);
                    $result_cidade_check = $stmt_cidade_check->execute();

                    if ($result_cidade_check !== false) {
                        if ($stmt_cidade_check->rowCount() > 0) {
                            // Cidade already exists, retrieve its ID
                            $result_cidade = $stmt_cidade_check->fetch(PDO::FETCH_ASSOC);
                            $id_cidade = $result_cidade['id_cidade'];
                        } 
                        else {
                            // Cidade doesn't exist, insert and retrieve ID
                            $sql_insert_cidade = "INSERT INTO CIDADE(cidade) VALUES(:cidade) RETURNING id_cidade";
                            $stmt_insert_cidade = Database::prepare($sql_insert_cidade);
                            $stmt_insert_cidade->bindParam(':cidade', $this->cidade);
                            $result_insert_cidade = $stmt_insert_cidade->execute();

                            if ($result_insert_cidade) {
                                $id_cidade = $stmt_insert_cidade->fetchColumn();
                            } else {
                                // Handle the error or return an error message
                                echo "Error inserting cidade";
                                return;
                            }
                        }
                    }

                    // Check if bairro already exists
                    $sql_bairro_check = "SELECT id_bairro FROM BAIRRO WHERE bairro = (:bairro)";
                    $stmt_bairro_check = Database::prepare($sql_bairro_check);
                    $stmt_bairro_check->bindParam(':bairro', $this->bairro);
                    $result_bairro_check = $stmt_bairro_check->execute();

                    if ($result_bairro_check !== false) {
                        if ($stmt_bairro_check->rowCount() > 0) {
                            // Bairro already exists, retrieve its ID
                            $result_bairro = $stmt_bairro_check->fetch(PDO::FETCH_ASSOC);
                            $id_bairro = $result_bairro['id_bairro'];
                        } 
                        else {
                            // Bairro doesn't exist, insert and retrieve ID
                            $sql_insert_bairro = "INSERT INTO BAIRRO(bairro) VALUES(:bairro) RETURNING id_bairro";
                            $stmt_insert_bairro = Database::prepare($sql_insert_bairro);
                            $stmt_insert_bairro->bindParam(':bairro', $this->bairro);
                            $result_insert_bairro = $stmt_insert_bairro->execute();

                            if ($result_insert_bairro) {
                                $id_bairro = $stmt_insert_bairro->fetchColumn();
                            } else {
                                // Handle the error or return an error message
                                echo "Error inserting bairro";
                                return;
                            }
                        }
                    }

                    // Check if tipo_logradouro already exists
                    $sql_tpLogradouro_check = "SELECT id_tipo_logradouro FROM TIPO_LOGRADOURO WHERE tipo_logradouro = (:tipo_logradouro)";
                    $stmt_tpLogradouro_check = Database::prepare($sql_tpLogradouro_check);
                    $stmt_tpLogradouro_check->bindParam(':tipo_logradouro', $this->tipo_logradouro);
                    $result_tpLogradouro_check = $stmt_tpLogradouro_check->execute();

                    if ($result_tpLogradouro_check !== false) {
                        if ($stmt_tpLogradouro_check->rowCount() > 0) {
                            // Tipo Logradouro already exists, retrieve its ID
                            $result_tipo_logradouro = $stmt_tpLogradouro_check->fetch(PDO::FETCH_ASSOC);
                            $id_tipo_logradouro = $result_tipo_logradouro['id_tipo_logradouro'];
                        } 
                        else {
                            // Tipo Logradouro doesn't exist, insert and retrieve ID
                            $sql_insert_tpLogradouro = "INSERT INTO TIPO_LOGRADOURO(tipo_logradouro) VALUES(:tipo_logradouro) RETURNING id_tipo_logradouro";
                            $stmt_insert_tpLogradouro = Database::prepare($sql_insert_tpLogradouro);
                            $stmt_insert_tpLogradouro->bindParam(':tipo_logradouro', $this->tipo_logradouro);
                            $result_insert_tpLogradouro = $stmt_insert_tpLogradouro->execute();

                            if ($result_insert_tpLogradouro) {
                                $id_tipo_logradouro = $stmt_insert_tpLogradouro->fetchColumn();
                            } else {
                                // Handle the error or return an error message
                                echo "Error inserting tipo_logradouro";
                                return;
                            }
                        }
                    }

                    // After all checks and insertions, proceed with localizacao
                    $sql_localizacao = "INSERT INTO LOCALIZACAO(numero, logradouro, cep, tipo_logradouro, FK_BAIRRO_id_bairro) VALUES (:numero, :logradouro, :cep, :tipo_logradouro, :FK_BAIRRO_id_bairro)";
                    $stmt_localizacao = Database::prepare($sql_localizacao);
                    $stmt_localizacao->bindParam(':numero', $this->numero);
                    $stmt_localizacao->bindParam(':logradouro', $this->logradouro);
                    $stmt_localizacao->bindParam(':cep', $this->cep);
                    $stmt_localizacao->bindParam(':tipo_logradouro', $id_tipo_logradouro, PDO::PARAM_INT);
                    $stmt_localizacao->bindParam(':FK_BAIRRO_id_bairro', $id_bairro, PDO::PARAM_INT);
                    $result_localizacao = $stmt_localizacao->execute();

                    if ($result_localizacao) {
                        $id_localizacao = $this->id_localizacao = Database::getInstance()->lastInsertId();
                        echo "Localizacao inserted with ID: " . $id_localizacao;
                    } 
                    else {
                        // Handle the error or return an error message
                        echo "Error inserting localizacao";
                        return;
                    }

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
            }
            catch (PDOException $e) {
            // Lidar com exceções de banco de dados, se necessário
            return $e->getMessage();
            } 
        }

        public function update($id){
        }

        public function select($id) {
            $sql = 'SELECT * FROM EVENTO_PRESENCIAL
                    INNER JOIN EVENTO ON EVENTO_PRESENCIAL.FK_EVENTO_id_evento = EVENTO.id_evento
                    INNER JOIN POSSUI_TIPO_CONTATO_EVENTO ON EVENTO.id_evento = POSSUI_TIPO_CONTATO_EVENTO.FK_EVENTO_id_evento
                    INNER JOIN LOCALIZACAO ON EVENTO_PRESENCIAL.FK_LOCALIZACAO_id_localizacao = LOCALIZACAO.id_localizacao
                    LEFT JOIN POSSUI_BAIRRO_CIDADE ON LOCALIZACAO.FK_BAIRRO_id_bairro = POSSUI_BAIRRO_CIDADE.FK_BAIRRO_id_bairro
                    LEFT JOIN BAIRRO ON POSSUI_BAIRRO_CIDADE.FK_BAIRRO_id_bairro = BAIRRO.id_bairro
                    LEFT JOIN POSSUI_CIDADE_ESTADO ON POSSUI_BAIRRO_CIDADE.FK_CIDADE_id_cidade = POSSUI_CIDADE_ESTADO.FK_CIDADE_id_cidade
                    LEFT JOIN CIDADE ON POSSUI_CIDADE_ESTADO.FK_CIDADE_id_cidade = CIDADE.id_cidade
                    LEFT JOIN ESTADO ON POSSUI_CIDADE_ESTADO.FK_ESTADO_id_estado = ESTADO.id_estado
                    INNER JOIN TIPO_LOGRADOURO ON LOCALIZACAO.FK_TIPO_LOGRADOURO_id_tipo_logradouro = TIPO_LOGRADOURO.id_tipo_logradouro
                    LEFT JOIN BUFFET ON EVENTO_PRESENCIAL.fk_buffet_buffet_pk = BUFFET.buffet_pk
                    INNER JOIN TIPO_CONTATO ON POSSUI_TIPO_CONTATO_EVENTO.FK_TIPO_CONTATO_id_tipo_contato = TIPO_CONTATO.id_tipo_contato
                    WHERE EVENTO_PRESENCIAL.FK_EVENTO_id_evento = ?';

            $stmt = Database::prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o evento foi encontrado.
            if ($evento === false) {
                return false;
            }

            // Obtém informações adicionais.
            $logradouro = $evento['logradouro'];
            $numero = $evento['numero'];
            $cep = $evento['cep'];
            $tipoLogradouro = $evento['tipo_logradouro'];
            $bairro = $evento['bairro'];
            $cidade = $evento['cidade'];
            $estado = $evento['estado'];
            $idBuffet = $evento['buffet_pk']; // Alterado para a coluna correta
            $tipoContato = $evento['tipo_contato'];

            // Adiciona informações do buffet.
            $buffet['buffet'] = $idBuffet['buffet'];

            // Adiciona as informações do buffet ao array de resposta.
            $resposta['id_evento'] = $evento['id_evento'];
            $resposta["nome"] = $evento['nome'];
            $resposta["privacidade_restrita"] = $evento['privacidade_restrita'];
            $resposta["src_img"] = $evento['src_img'];
            $resposta["data_prevista"] = $evento['data_prevista'];
            $resposta["horario"] = $evento['horario'];
            $resposta["objetivo"] = $evento['objetivo'];
            $resposta["atracoes"] = $evento['atracoes'];
            $resposta['buffet'] = $buffet;
            $resposta['cep'] = $cep;
            $resposta['estado'] = $estado;
            $resposta['cidade'] = $cidade;
            $resposta['bairro'] = $bairro;
            $resposta['tipo_logradouro'] = $tipoLogradouro;
            $resposta['logradouro'] = $logradouro;
            $resposta['numero'] = $numero;
            $resposta['tipo_contato_evento'] = $tipoContato;
            $resposta["contato"] = $evento['contato'];

            return $resposta;
        }
    }
?>