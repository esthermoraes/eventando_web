<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)) {
        // Se sim, indica que o login foi realizado com sucesso.
        $resposta["sucesso"] = 1;
    }
    else {
        // senha ou usuario nao confere
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Email ou senha não confere";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>