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

            //DELETE FROM Favorita WHERE fk_EVENTO_id_evento = 1;
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