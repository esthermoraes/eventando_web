<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    $resposta = array();

    if (autenticar($db_con)) {
        // limit - quantidade de eventos a ser entregues
        // offset - indica a partir de qual evento começa a lista
        if (isset($_GET['limit']) && isset($_GET['offset']) && isset($_GET['user_email'])) {
            $limit = $_GET['limit'];
            $offset = $_GET['offset'];
            $user_email = trim($_GET['user_email']);

            // Consulta SQL para obter o ID do criador com base no e-mail usando uma consulta preparada
            $consultaUsuario = $db_con->prepare("SELECT id_usuario FROM USUARIO WHERE email = :user_email");
            $consultaUsuario->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $consultaUsuario->execute();

            if ($consultaUsuario->rowCount() > 0) {
                $linha = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $user_id = $linha['id_usuario'];

                $consultaEventos = $db_con->prepare("SELECT e.id_evento, e.nome, e.data_prevista, e.src_img, 
                ep.FK_buffet_buffet_PK AS evento_presencial, eo.link AS evento_online
                FROM EVENTO e JOIN Favorita ON e.id_evento = Favorita.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
                LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento
                WHERE Favorita.FK_USUARIO_id_usuario = '$user_id' LIMIT " . $limit . " OFFSET " . $offset);

                if ($consultaEventos->execute()) {
                    $resposta["eventos"] = array(); // Inicializa o array eventos

                    while ($linha2 = $consultaEventos->fetch(PDO::FETCH_ASSOC)) {
                        $evento = array();
                        $evento["id"] = $linha2["id_evento"];
                        $evento["nome"] = $linha2["nome"];
                        $evento["data_prevista"] = $linha2["data_prevista"];
                        $evento["img"] = $linha2["src_img"];

                        // Adiciona o formato do evento ao array se presente
                        if (!empty($linha2["evento_presencial"])) {
                            $evento["formato"] = "presencial";
                        } elseif (!empty($linha2["evento_online"])) {
                            $evento["formato"] = "online";
                        }

                        // Adiciona o evento no array de eventos.
                        array_push($resposta["eventos"], $evento);
                    }

                    $resposta["sucesso"] = 1; // Indica sucesso
                } 
                else {
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro no BD: " . $consultaEventos->errorInfo()[2];
                }
            } 
            else {
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "O email do criador do evento não foi encontrado.";
            }
        } 
        else {
            // Se a requisição foi feita incorretamente...
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo requerido não preenchido";
        }
    } 
    else {
        // senha ou usuario nao confere
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "usuario ou senha não confere";
    }

    // fecha conexão com o bd
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>
