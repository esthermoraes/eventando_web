<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array for JSON resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)) {
        // limit - quantidade de eventos a ser entregues
        // offset - indica a partir de qual evento começa a lista
        if (isset($_GET['limit']) && isset($_GET['offset']) && isset($_GET['criador_evento'])) {
            $limit = $_GET['limit'];
            $offset = $_GET['offset'];
            $criador_email = trim($_GET['criador_evento']);
            
            // Consulta SQL para obter o ID do criador com base no e-mail
            $sql = "SELECT id_usuario FROM USUARIO WHERE login = '$criador_email'";
            $consulta = $db_con->prepare($sql);
            $consulta->execute();
            
            if ($consulta->rowCount() > 0) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $criador_id = $linha ['id_usuario'];
    
                // Realiza uma consulta ao BD e obtem todos os eventos.
                $consulta2 = $db_con->prepare("SELECT * FROM EVENTO WHERE FK_USUARIO_id_usuario = '$criador_id' 
                LIMIT " . $limit . " OFFSET " . $offset);
                if($consulta2->execute()) {
                    // Caso existam eventos no BD, eles sao armazenados na 
                    // chave "eventos". O valor dessa chave e formado por um 
                    // array onde cada elemento e um evento.
                    $resposta["eventos"] = array();
                    $resposta["sucesso"] = 1;

                    if ($consulta2->rowCount() > 0) {
                        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                            // Para cada evento, sao retornados somente o 
                            // pid (id do evento), o nome do evento e o preço. Nao ha necessidade 
                            // de retornar nesse momento todos os campos dos eventos 
                            // pois a app cliente, inicialmente, so precisa do nome e preço do mesmo para 
                            // exibir na lista de eventos. O campo id e usado pela app cliente 
                            // para buscar os detalhes de um evento especifico quando o usuario 
                            // o seleciona. Esse tipo de estrategia poupa banda de rede, uma vez 
                            // os detalhes de um evento somente serao transferidos ao cliente 
                            // em caso de real interesse.
                            $evento = array();
                            $evento["id"] = $linha2["id"];
                            $evento["nome"] = $linha2["nome"];
                            $evento["data_prevista"] = $linha2["data_prevista"];
                            $evento["img"] = $linha2["img"];
                    
                            // Adiciona o evento no array de eventos.
                            array_push($resposta["eventos"], $evento);
                        }
                    }
                }
                else {
                    // Caso ocorra falha no BD, o cliente 
                    // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
                    // motivo da falha.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
                }
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "O email do criador do evento não foi encontrado.";
            }
        }
        else {
            // Se a requisicao foi feita incorretamente, ou seja, os parametros 
            // nao foram enviados corretamente para o servidor, o cliente 
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
            // motivo da falha.
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