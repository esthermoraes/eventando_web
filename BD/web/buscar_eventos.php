<?php
    include_once 'BD/web/evento.php';

    function buscarEventos($termo) {
        $sql_buscar = "SELECT e.id_evento, e.nome, e.objetivo, e.data_prevista, e.src_img, 
        ep.FK_localizacao_id_localizacao AS evento_presencial, eo.link AS evento_online FROM EVENTO e
        LEFT JOIN EVENTO_PRESENCIAL ep ON e.id_evento = ep.FK_EVENTO_id_evento
        LEFT JOIN EVENTO_ONLINE eo ON e.id_evento = eo.FK_EVENTO_id_evento 
        WHERE UNACCENT(LOWER(e.nome)) LIKE UNACCENT(LOWER(:pesquisa))";
        $stmt_buscar = Database::prepare($sql_buscar);
        $stmt_buscar->bindValue(':pesquisa', "%$termo%", PDO::PARAM_STR);
        $stmt_buscar->execute();

        // Construir a resposta
        $resposta["eventos"] = array();
        $resposta["sucesso"] = 1;

        if ($stmt_buscar && $stmt_buscar->rowCount() > 0) {
            while ($linha = $stmt_buscar->fetch(PDO::FETCH_ASSOC)) {
                $evento = array();
                $evento["id"] = $linha["id_evento"];
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
        else {
            // Caso não haja eventos, você pode lidar com isso conforme necessário
            // Por exemplo, definindo um erro ou enviando uma mensagem específica
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Nenhum evento encontrado.";
        }

        return $resposta;
    }

    // Verifica se o termo de busca foi enviado
    if(isset($_POST['buscar'])) {
        $termo = $_POST['buscar'];
        $resultados = buscarEventos($termo);
    }
?>