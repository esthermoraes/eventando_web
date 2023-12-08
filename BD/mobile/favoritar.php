<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array for JSON resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_GET['criador_evento']) && isset($_GET['id_evento'])) {
            $criador_email = trim($_GET['criador_evento']);
            $id_evento = $_GET['id_evento'];

            // Consulta para obter o ID do usuário a partir do e-mail
            $consultaUsuario = $db_con->prepare("SELECT id_usuario FROM USUARIO WHERE email = ?");
            $consultaUsuario->execute([$criador_email]);

            if ($consultaUsuario->rowCount() > 0) {
                $linhaUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $criador_id = $linhaUsuario['id_usuario'];

                // Inserção na tabela Favorita usando o ID do usuário obtido
                $consulta2 = $db_con->prepare("INSERT INTO Favorita(fk_EVENTO_id_evento, fk_USUARIO_id_usuario) 
                VALUES('$id_evento', '$criador_id')");

                if ($consulta2->execute()) {
                    $resposta["sucesso"] = 1;
                } 
                else {
                    // Se houve erro na consulta, indicamos que não houve sucesso
                    // na operação e o motivo no campo de erro.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela Favorita: " . $consulta2->errorInfo()[2];
                }
            } 
            else {
                // Se não encontrou o usuário com o e-mail fornecido
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Usuário não encontrado para o e-mail fornecido";
            }
        } 
        else {
            // Se a requisição foi feita incorretamente, ou seja, os parâmetros
            // não foram enviados corretamente para o servidor, o cliente
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo requerido não preenchido";
        }
    } 
    else {
        // Se usuário ou senha não confere
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Usuário ou senha não confere";
    }

    // Fecha conexão com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>
