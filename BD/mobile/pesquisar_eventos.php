<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array for JSON resposta
    $resposta = array();

    if (autenticar($db_con)) {
        $pesquisa = $_GET['pesquisa'];

        $consulta = $db_con->prepare("SELECT e.id_evento, e.nome, e.objetivo, e.data_prevista, e.src_img, 
        ep.FK_buffet_buffet_PK AS evento_presencial, eo.link AS evento_online FROM EVENTO e
        LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
        LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento 
        WHERE UNACCENT(LOWER(e.nome)) LIKE UNACCENT(LOWER("%$pesquisa%"))");

        if ($consulta->execute()) {
            // Caso existam eventos no BD, eles sao armazenados na 
            // chave "eventos". O valor dessa chave e formado por um 
            // array onde cada elemento e um evento.
            $resposta["eventos"] = array();
            $resposta["sucesso"] = 1;

            if ($consulta->rowCount() > 0) {
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $evento = array();
                    $evento["id"] = $linha["id_evento"];
                    $evento["nome"] = $linha["nome"];
                    $evento["objetivo"] = $linha["objetivo"];
                    $evento["data_prevista"] = $linha["data_prevista"];
                    $evento["img"] = $linha["src_img"];

                    // Adiciona a informação se o evento é presencial ou online
                    if (!empty($linha["evento_presencial"])) {
                        $evento["formato"] = "presencial";
                    } 
                    elseif (!empty($linha["evento_online"])) {
                        $evento["formato"] = "online";
                    }

                    // Adiciona o evento no array de eventos.
                    array_push($resposta["eventos"], $evento);
                }
            }
        } 
        else {
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Email ou senha não conferem";
            $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
        }
    } 
    else {
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Email ou senha não conferem";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>