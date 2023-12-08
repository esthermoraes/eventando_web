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
                $evento["nome"] = $linha["nome"];

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca</title>
    <style>
        body {
            background-color: #ededed;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #dccce0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .evento-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .evento {
            margin-bottom: 1.5rem;
            text-align: center;
            flex: 0 0 23%; /* Defina a largura da imagem aqui */
        }

        .evento img {
            width: 154px;
            height: 104px;
            height: auto;
            border-radius: 8px;
            border: 3px solid #770089;
        }

        .evento img:hover {
            border: 6px solid #770089;
            transition-duration: all 0.4s;
        }

        .formato-presencial {
            color: #3498db;
            font-weight: bold;
        }

        .formato-online {
            color: #2ecc71;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Resultados da Busca</h2>

        <?php
            if (isset($resultados) && $resultados["sucesso"] === 1) {
                if (!empty($resultados["eventos"])) {
        ?>

                    <div class="evento-container">

                        <?php
                            foreach ($resultados["eventos"] as $evento) {
                                $formatoClass = isset($evento["formato"]) ? 'formato-' . $evento["formato"] : '';
                        ?>

                                <div class="evento mb-3 <?php echo $formatoClass; ?>">
                                    <img src="<?php echo $evento["img"]; ?>" alt="Imagem do Evento">
                                    <center> <p><?php echo $evento["nome"]; ?></p> </center>
                                </div>

                        <?php
                            }
                        ?>

                    </div>

                <?php
                } else {
                    echo "<p>Nenhum evento encontrado.</p>";
                }
            } else {
                echo "<p>Erro: " . $resultados["erro"] . "</p>";
            }
        ?>
    </div>

</body>

</html>

