<?php
    require_once('connect_mobile.php');
    require_once('autenticacao.php');

    // array for JSON resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)) {
        if (isset($_GET['id_evento'])) {
            $id_evento = $_GET['id_evento'];

            $consulta = $db_con->prepare("DELETE FROM EVENTO WHERE id_evento = '$id_evento';");
            if($consulta->execute()){
                $consulta2 = $db_con->prepare("DELETE FROM POSSUI_TIPO_CONTATO_EVENTO WHERE fk_evento_id_evento = 
                '$id_evento'");
                if($consulta2->execute()){
                    $resposta["sucesso"] = 1;
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro no delete na tabela POSSUI_TIPO_CONTATO_EVENTO: " 
                    . $consulta2->errorInfo()[2];
                }
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no delete na tabela EVENTO: " . $consulta->errorInfo()[2];
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