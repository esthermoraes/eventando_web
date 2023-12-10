<?php

    include_once 'crud.php';

    /*************************************************************
    Objetivo: Classe responsável por representar todas as operações com evento.

    Atributos:
    $nome- nome do evento
    $objetivo - objetivo do evento
    $data_prevista - data_prevista do evento
    $horario - horario do evento
    $src_img - src_img do evento
    $atracoes - atracoes do evento
    $FK_USUARIO_id_usuario - FK_USUARIO_id_usuario do user do evento

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
        private $email_user;
        private $id_evento;

        public function __construct($nome = null, $objetivo = null, $data_prevista = null, $horario = null, 
        $src_img = null, $atracoes = null, $email_user = null){
            $this->nome = $nome;
            $this->objetivo = $objetivo;
            $this->data_prevista = $data_prevista;
            $this->horario = $horario;
            $this->src_img = $src_img;
            $this->atracoes = $atracoes;
            $this->email_user = $email_user;
        }

        public function insert(){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $this->email_user);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
        
            if($id_user !== false) {
                $sql = "INSERT INTO $this->table (nome, objetivo, data_prevista, horario, src_img, atracoes, 
                FK_USUARIO_id_usuario) VALUES (:nome, :objetivo, :data_prevista, :horario, :src_img, :atracoes, 
                :FK_USUARIO_id_usuario)";
                $stmt = Database::prepare($sql);
                $stmt->bindParam(':nome', $this->nome);
                $stmt->bindParam(':objetivo', $this->objetivo);
                $stmt->bindParam(':data_prevista', $this->data_prevista);
                $stmt->bindParam(':horario', $this->horario);
                $stmt->bindParam(':src_img', $this->src_img);
                $stmt->bindParam(':atracoes', $this->atracoes);
                $stmt->bindParam(':FK_USUARIO_id_usuario', $id_user, PDO::PARAM_INT);
        
                if ($stmt->execute()){
                    // Recupere o ID inserido
                    $this->id_evento = Database::getInstance()->lastInsertId();
                    return true;
                }
            }
            return false;
        }

        public function getId(){
            return $this->id_evento;
        }

        public function selectEventosRindex(){
            $sql_eR = "SELECT src_img FROM EVENTO LIMIT 14";
            $stmt_eR = Database::prepare($sql_eR);
            $stmt_eR->execute();
            
            // Construir a resposta
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            // Verificar se $stmt_eR não é nulo antes de usar
            if ($stmt_eR && $stmt_eR->rowCount() > 0) {
                while ($linha = $stmt_eR->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["img"] = $linha["src_img"];

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Nenhum evento encontrado.";
            }

            return $resposta;
        }

        public function renderCarrosselIndex($eventos) {
            // Verifica se há eventos para exibir
            if ($eventos["sucesso"] == 1 && !empty($eventos["eventos"])) {
                ?>
                    <?php
                    foreach ($eventos["eventos"] as $evento) {
                        ?>
                        <img src="<?= $evento['img'];?>" class="img-fluid evento" alt="Imagem do Evento">
                        <?php
                    }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                echo "<div> <center> Nenhum evento encontrado. </center> </div>";
            }
        }
        
        public function selectEventosR(){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
        
            // Inicialize $stmt_eR fora do bloco condicional
            $stmt_eR = null;
            if ($id_user) {
                $sql_eR = "SELECT e.id_evento, e.src_img, 
                ep.FK_LOCALIZACAO_id_localizacao AS evento_presencial, eo.link AS evento_online FROM EVENTO e
                LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento
                WHERE e.FK_USUARIO_id_usuario != (:id_user) ORDER BY data_prevista DESC LIMIT 14";
                $stmt_eR = Database::prepare($sql_eR);
                $stmt_eR->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_eR->execute();
            }

            // Construir a resposta
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            // Verificar se $stmt_eR não é nulo antes de usar
            if ($stmt_eR && $stmt_eR->rowCount() > 0) {
                while ($linha = $stmt_eR->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["id"] = $linha["id_evento"];
                    $evento["img"] = $linha["src_img"];

                    // Adiciona a informação se o evento é presencial ou online
                    if (!empty($linha["evento_presencial"])) {
                        $evento["formato"] = "presencial";
                    } elseif (!empty($linha["evento_online"])) {
                        $evento["formato"] = "online";
                    }

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Nenhum evento encontrado.";
            }

            return $resposta;
        }
        public function renderCarrossel($eventos) {
            // Verifica se há eventos para exibir
            if ($eventos["sucesso"] == 1 && !empty($eventos["eventos"])) {
                ?>
                    <?php
                    foreach ($eventos["eventos"] as $evento) {
                        if($evento['formato'] == 'presencial'){

                        ?>
                            <a href="./visualizarEventoP.php?id=<?php echo $evento["id"]?>">
                                <img src="<?= $evento['img']; ?>" class="evento" alt="Imagem do Evento">
                            </a>
                        <?php
                        }
                        else{
                        ?>
                            <a href="./visualizarEventoO.php?id=<?php echo $evento["id"]?>">
                                <img src="<?= $evento['img']; ?>" class="evento" alt="Imagem do Evento">
                            </a>
                        <?php
                        }
                    }
                    ?>
                <?php
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                echo "<div> <center> Nenhum evento encontrado. </center> </div>";
            }
        }

        public function selectMyEventos(){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
            
            $stmt_myE = null;
            if($id_user) {
                $sql_myE = "SELECT e.id_evento, e.src_img, 
                ep.FK_buffet_buffet_PK AS evento_presencial, eo.link AS evento_online FROM EVENTO e
                LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento
                WHERE e.FK_USUARIO_id_usuario = (:id_user) LIMIT 8";
                $stmt_myE = Database::prepare($sql_myE);
                $stmt_myE->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_myE->execute();
            }

            // Construir a resposta
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            if ($stmt_myE && $stmt_myE->rowCount() > 0) {
                while ($linha = $stmt_myE->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["id"] = $linha["id_evento"];
                    $evento["img"] = $linha["src_img"];

                    // Adiciona a informação se o evento é presencial ou online
                    if (!empty($linha["evento_presencial"])) {
                        $evento["formato"] = "presencial";
                    } elseif (!empty($linha["evento_online"])) {
                        $evento["formato"] = "online";
                    }

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                // Por exemplo, definindo um erro ou enviando uma mensagem específica
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Nenhum evento encontrado.";
            }

            return $resposta;
        }

        public function selectCalendar(){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();
        
            if($id_user) {
                $sql_cl = "SELECT e.id_evento, e.nome, e.horario, e.data_prevista, 
                ep.FK_buffet_buffet_PK AS evento_presencial, eo.link AS evento_online FROM EVENTO e
                LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento
                WHERE e.FK_USUARIO_id_usuario != (:id_user) ORDER BY 
                data_prevista LIMIT 10";
                $stmt_cl = Database::prepare($sql_cl);
                $stmt_cl->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $stmt_cl->execute();
            }

            // Construir a resposta
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            if ($stmt_cl && $stmt_cl->rowCount() > 0) {
                while ($linha = $stmt_cl->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["id"] = $linha["id_evento"];
                    $evento["nome"] = $linha["nome"];
                    $evento["horario"] = $linha["horario"];
                    $evento["data_prevista"] = $linha["data_prevista"];

                    // Adiciona a informação se o evento é presencial ou online
                    if (!empty($linha["evento_presencial"])) {
                        $evento["formato"] = "presencial";
                    } elseif (!empty($linha["evento_online"])) {
                        $evento["formato"] = "online";
                    }

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                // Por exemplo, definindo um erro ou enviando uma mensagem específica
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Nenhum evento encontrado.";
            }

            return $resposta;
        }

        public function favoritar($id_evento){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();

            if($id_user) {
                $sql_favoritar = "INSERT INTO Favorita(fk_EVENTO_id_evento, fk_USUARIO_id_usuario) 
                VALUES(:id_evento, :id_user)";
                $stmt_favoritar = Database::prepare($sql_favoritar);
                $stmt_favoritar->bindParam(":id_evento", $id_evento, PDO::PARAM_INT);
                $stmt_favoritar->bindParam(":id_user", $id_user, PDO::PARAM_INT);

                return $stmt_favoritar->execute();
            }
            return false;
        }

        public function selectFavoritos(){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();

            if($id_user) {
                $sql_sf = "SELECT
                e.id_evento,
                e.src_img,
                ep.FK_buffet_buffet_PK AS evento_presencial,
                eo.link AS evento_online
                FROM EVENTO e JOIN Favorita ON e.id_evento = Favorita.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento
                WHERE Favorita.FK_USUARIO_id_usuario = (:id_user)";
                $stmt_sf = Database::prepare($sql_sf);
                $stmt_sf->bindParam(":id_user", $id_user, PDO::PARAM_INT);
                $stmt_sf->execute();
            }

            // Construir a resposta
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            if ($stmt_sf && $stmt_sf->rowCount() > 0) {
                while ($linha = $stmt_sf->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["id"] = $linha["id_evento"];
                    $evento["img"] = $linha["src_img"];

                    // Adiciona a informação se o evento é presencial ou online
                    if (!empty($linha["evento_presencial"])) {
                        $evento["formato"] = "presencial";
                    } elseif (!empty($linha["evento_online"])) {
                        $evento["formato"] = "online";
                    }

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            } 
            else {
                // Caso não haja eventos, você pode lidar com isso conforme necessário
                // Por exemplo, definindo um erro ou enviando uma mensagem específica
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Nenhum evento encontrado.";
            }

            return $resposta;
        }

        public function desfavoritar($id_evento){
            $sql_user = "SELECT id_usuario FROM USUARIO WHERE email = (:email)";
            $stmt_user = Database::prepare($sql_user);
            $stmt_user->bindParam(":email", $_SESSION['email_txt']);
            $stmt_user->execute();
            $id_user = $stmt_user->fetchColumn();

            if($id_user) {
                $sql_desfavoritar = "DELETE FROM Favorita WHERE fk_EVENTO_id_evento = (:id_evento) and 
                fk_USUARIO_id_usuario = (:id_user)";
                $stmt_desfavoritar = Database::prepare($sql_desfavoritar);
                $stmt_desfavoritar->bindParam(":id_evento", $id_evento, PDO::PARAM_INT);
                $stmt_desfavoritar->bindParam(":id_user", $id_user, PDO::PARAM_INT);

                return $stmt_desfavoritar->execute();
            }
            return false;
        }

        public function update($id_evento){
        }
        
    }
?>