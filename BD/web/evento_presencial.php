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

                $sql_estado_check = "SELECT id_estado FROM ESTADO WHERE estado = (:estado)";
                $stmt_estado_check = Database::prepare($sql_estado_check);
                $stmt_estado_check->bindParam(':estado', $this->estado);
                $stmt_estado_check->execute();
                $result_estado = $stmt_estado_check->fetch(PDO::FETCH_ASSOC);
                //var_dump($result_estado);

                $sql_cidade_check = "SELECT id_cidade FROM CIDADE WHERE cidade = (:cidade)";
                $stmt_cidade_check = Database::prepare($sql_cidade_check);
                $stmt_cidade_check->bindParam(':cidade', $this->cidade);
                $stmt_cidade_check->execute();
                $result_cidade = $stmt_cidade_check->fetch(PDO::FETCH_ASSOC);
                //var_dump($result_cidade);

                if($result_cidade == false){
                    $sql_insert_cidade = "INSERT INTO CIDADE(cidade) VALUES(:cidade) RETURNING id_cidade";
                    $stmt_insert_cidade = Database::prepare($sql_insert_cidade);
                    $stmt_insert_cidade->bindParam(':cidade', $this->cidade);
                    $stmt_insert_cidade->execute();
                    $result_cidade = $stmt_insert_cidade->fetch(PDO::FETCH_ASSOC);
                    //var_dump($result_cidade);
                }

                $sql_bairro_check = "SELECT id_bairro FROM BAIRRO WHERE bairro = (:bairro)";
                $stmt_bairro_check = Database::prepare($sql_bairro_check);
                $stmt_bairro_check->bindParam(':bairro', $this->bairro);
                $stmt_bairro_check->execute();
                $result_bairro = $stmt_bairro_check->fetch(PDO::FETCH_ASSOC);
                //var_dump($result_bairro);

                if($result_bairro == false){
                    $sql_insert_bairro = "INSERT INTO BAIRRO(bairro) VALUES(:bairro) RETURNING id_bairro";
                    $stmt_insert_bairro = Database::prepare($sql_insert_bairro);
                    $stmt_insert_bairro->bindParam(':bairro', $this->bairro);
                    $stmt_insert_bairro->execute();
                    $result_bairro = $stmt_insert_bairro->fetch(PDO::FETCH_ASSOC);
                    //var_dump($result_bairro);
                }

                $sql_tpLogradouro_check = "SELECT id_tipo_logradouro FROM TIPO_LOGRADOURO WHERE tipo_logradouro = (:tipo_logradouro)";
                $stmt_tpLogradouro_check = Database::prepare($sql_tpLogradouro_check);
                $stmt_tpLogradouro_check->bindParam(':tipo_logradouro', $this->tipo_logradouro);
                $stmt_tpLogradouro_check->execute();
                $result_tpLogradouro = $stmt_tpLogradouro_check->fetch(PDO::FETCH_ASSOC);
                //var_dump($result_tpLogradouro);

                $sql_cidade_estado = "INSERT INTO POSSUI_CIDADE_ESTADO(fk_CIDADE_id_cidade, 
                fk_ESTADO_id_estado) VALUES(:fk_CIDADE_id_cidade, :fk_ESTADO_id_estado)";
                $stmt_cidade_estado = Database::prepare($sql_cidade_estado);
                $stmt_cidade_estado->bindParam(':fk_CIDADE_id_cidade', $result_cidade['id_cidade'], PDO::PARAM_INT);
                $stmt_cidade_estado->bindParam(':fk_ESTADO_id_estado', $result_estado['id_estado'], PDO::PARAM_INT);
                $stmt_cidade_estado->execute();

                $sql_bairro_cidade = "INSERT INTO POSSUI_BAIRRO_CIDADE(FK_BAIRRO_id_bairro, 
                fk_CIDADE_id_cidade) VALUES(:FK_BAIRRO_id_bairro, :fk_CIDADE_id_cidade)";
                $stmt_bairro_cidade = Database::prepare($sql_bairro_cidade);
                $stmt_bairro_cidade->bindParam(':FK_BAIRRO_id_bairro', $result_bairro['id_bairro'], PDO::PARAM_INT);
                $stmt_bairro_cidade->bindParam(':fk_CIDADE_id_cidade', $result_cidade['id_cidade'], PDO::PARAM_INT);
                $stmt_bairro_cidade->execute();

                $sql_localizacao = "INSERT INTO LOCALIZACAO(numero, logradouro, cep, FK_TIPO_LOGRADOURO_id_tipo_logradouro, 
                FK_BAIRRO_id_bairro) VALUES 
                (:numero, :logradouro, :cep, :FK_TIPO_LOGRADOURO_id_tipo_logradouro, :FK_BAIRRO_id_bairro) RETURNING id_localizacao";
                $stmt_localizacao = Database::prepare($sql_localizacao);
                $stmt_localizacao->bindParam(':numero', $this->numero);
                $stmt_localizacao->bindParam(':logradouro', $this->logradouro);
                $stmt_localizacao->bindParam(':cep', $this->cep);
                $stmt_localizacao->bindParam(':FK_TIPO_LOGRADOURO_id_tipo_logradouro', $result_tpLogradouro['id_tipo_logradouro'], PDO::PARAM_INT);
                $stmt_localizacao->bindParam(':FK_BAIRRO_id_bairro', $result_bairro['id_bairro'], PDO::PARAM_INT);
                $stmt_localizacao->execute();
                $result_localizacao = $stmt_localizacao->fetch(PDO::FETCH_ASSOC);
                //var_dump($result_localizacao);

                $sql_buffet = "INSERT INTO buffet (buffet) VALUES (:buffet) RETURNING buffet_pk";
                $stmt_buffet = Database::prepare($sql_buffet);
                $stmt_buffet->bindParam(':buffet', $this->buffet);
                $stmt_buffet->execute();
                $result_buffet = $stmt_buffet->fetch(PDO::FETCH_ASSOC);

                $sql_presencial = "INSERT INTO $this->table (FK_buffet_buffet_PK, FK_LOCALIZACAO_id_localizacao, 
                FK_EVENTO_id_evento) 
                VALUES (:FK_buffet_buffet_PK, :FK_LOCALIZACAO_id_localizacao, :id_evento)";
                $stmt_presencial = Database::prepare($sql_presencial);
                $stmt_presencial->bindParam(':FK_buffet_buffet_PK', $result_buffet['buffet_pk'], PDO::PARAM_INT);
                $stmt_presencial->bindParam(':FK_LOCALIZACAO_id_localizacao', $result_localizacao['id_localizacao'], PDO::PARAM_INT);
                $stmt_presencial->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                $stmt_presencial->execute();

                $sql_contato = "INSERT INTO POSSUI_TIPO_CONTATO_EVENTO (tipo_contato, fk_EVENTO_id_evento, contato) 
                VALUES (:tipo_contato, :id_evento, :contato)";
                $stmt_contato = Database::prepare($sql_contato);
                $stmt_contato->bindParam(':tipo_contato', $this->tipo_contato);
                $stmt_contato->bindParam(':id_evento', $id_evento, PDO::PARAM_INT);
                $stmt_contato->bindParam(':contato', $this->contato);
                return $stmt_contato->execute();
            }
            catch (PDOException $e) {
            // Lidar com exceções de banco de dados, se necessário
            return $e->getMessage();
            } 
        }

        public function update($id){
        }

        public function select($id) {
            $sql = 'SELECT 
                E.id_evento,
                E.nome,
                E.privacidade_restrita,
                E.src_img,
                E.data_prevista,
                E.horario,    
                E.objetivo,   
                E.atracoes,   
                EP.FK_LOCALIZACAO_id_localizacao AS evento_presencial,
                L.logradouro,
                L.numero,
                TL.tipo_logradouro,
                BC.bairro,
                C.cidade,
                ES.estado,
                PTC.FK_TIPO_CONTATO_id_tipo_contato AS tipo_contato_id,
                B.buffet,
                L.cep,
                PTC.contato
            FROM 
                EVENTO E
            LEFT JOIN 
                EVENTO_PRESENCIAL EP ON E.id_evento = EP.FK_EVENTO_id_evento
            LEFT JOIN 
                POSSUI_TIPO_CONTATO_EVENTO PTC ON E.id_evento = PTC.FK_EVENTO_id_evento
            LEFT JOIN 
                LOCALIZACAO L ON EP.FK_LOCALIZACAO_id_localizacao = L.id_localizacao
            LEFT JOIN 
                TIPO_LOGRADOURO TL ON L.FK_TIPO_LOGRADOURO_id_tipo_logradouro = TL.id_tipo_logradouro
            LEFT JOIN 
                POSSUI_BAIRRO_CIDADE PBC ON L.FK_BAIRRO_id_bairro = PBC.FK_BAIRRO_id_bairro
            LEFT JOIN 
                BAIRRO BC ON PBC.FK_BAIRRO_id_bairro = BC.id_bairro
            LEFT JOIN 
                POSSUI_CIDADE_ESTADO PCE ON PBC.FK_CIDADE_id_cidade = PCE.FK_CIDADE_id_cidade
            LEFT JOIN 
                CIDADE C ON PCE.FK_CIDADE_id_cidade = C.id_cidade
            LEFT JOIN 
                ESTADO ES ON PCE.FK_ESTADO_id_estado = ES.id_estado
            LEFT JOIN 
                BUFFET B ON EP.fk_buffet_buffet_pk = B.buffet_pk
            WHERE 
                E.id_evento = ?';
        
            $stmt = Database::prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $evento = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Verifica se o evento foi encontrado.
            if ($evento === false) {
                return false;
            }
        
            // Adiciona as informações do buffet à resposta.
            $resposta['id_evento'] = $evento['id_evento'];
            $resposta["nome"] = $evento['nome'];
            $resposta["privacidade_restrita"] = $evento['privacidade_restrita'];
            $resposta["src_img"] = $evento['src_img'];
            $resposta["data_prevista"] = $evento['data_prevista'];
            $resposta["horario"] = isset($evento['horario']) ? $evento['horario'] : null;
            $resposta["objetivo"] = isset($evento['objetivo']) ? $evento['objetivo'] : null;
            $resposta["atracoes"] = isset($evento['atracoes']) ? $evento['atracoes'] : null;
            $resposta['buffet'] = isset($evento['buffet']) ? $evento['buffet'] : null;
            $resposta['cep'] = $evento['cep'];
            $resposta['estado'] = $evento['estado'];
            $resposta['cidade'] = $evento['cidade'];
            $resposta['bairro'] = $evento['bairro'];
            $resposta['tipo_logradouro'] = $evento['tipo_logradouro'];
            $resposta['logradouro'] = $evento['logradouro'];
            $resposta['numero'] = $evento['numero'];
            $resposta['tipo_contato_evento'] = isset($evento['tipo_contato']) ? $evento['tipo_contato'] : null;
            $resposta["contato"] = isset($evento['contato']) ? $evento['contato'] : null;
        
            return $resposta;
        }
                
    }
?>