<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array for JSON resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)) {
        if (isset($_GET['criador_evento']) &&isset($_GET['id_evento'])) {
            $criador_email = trim($_GET['criador_evento']);
            $id_evento = $_GET['id_evento'];

            $sql = "SELECT id_usuario FROM USUARIO WHERE email = '$criador_email'";
            $consulta = $db_con->prepare($sql);
            $consulta->execute();
            
            if ($consulta->rowCount() > 0) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $criador_id = $linha ['id_usuario'];

                $consulta2 = $db_con->prepare("INSERT INTO Favorita(fk_EVENTO_id_evento, fk_USUARIO_id_usuario) 
                VALUES('$id_evento', '$criador_email')");

                if ($consulta2->execute()) {
                    $resposta["sucesso"] = 1;
                } 
                else {
                    // se houve erro na consulta para a tabela de tem_tipo_contato_usuario, indicamos que não houve sucesso
                    // na operação e o motivo no campo de erro.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela Favorita: " . $consulta2->errorInfo()[2];
                }
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