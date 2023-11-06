<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_GET['evento_id']) && isset($_GET["formato"])){
            $evento_id = $_GET['evento_id'];
            $formato = $GET['formato'];

            if (isset($_POST['atracoes_evento'])){
                $atracoes_evento = trim($_POST['atracoes_evento']);

                //$consulta = $db_con->prepare("INSERT INTO EVENTO(atracoes) VALUES('$atracoes_evento') WHERE id_evento = '$evento_id'");
                $consulta = $db_con->prepare("UPDATE EVENTO SET atracoes = '$atracoes_evento' WHERE id_evento = '$evento_id'");
                if ($consulta->execute()) {
                    $resposta["sucesso"] = 1;
                } 
                else {
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela EVENTO: " . $consulta->errorInfo()[2];
                }
            }
            else{
                $consulta = $db_con->prepare("UPDATE EVENTO SET atracoes = '' WHERE id_evento = '$evento_id'");
                if ($consulta->execute()) {
                    $resposta["sucesso"] = 1;
                }
                else {
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela EVENTO: " . $consulta->errorInfo()[2];
                }
            }

            if (isset($_POST['tipo_contato_evento']) && isset($_POST['contato_evento'])){
                $tipo_contato_evento = trim($_POST['tipo_contato_evento']);
                $contato_evento = trim($_POST['contato_evento']);

                $consulta2 = $db_con->prepare("INSERT INTO POSSUI_TIPO_CONTATO_EVENTO(fk_TIPO_CONTATO_id_tipo_contato, fk_EVENTO_id_evento, 
                descricao) VALUES('$tipo_contato_evento', '$evento_id', '$contato_evento')");
                if($consulta2->execute()){
                    $resposta["sucesso"] = 1;
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela POSSUI_TIPO_CONTATO_EVENTO: " . $consulta2->errorInfo()[2];
                }
            }
            else{
                $consulta2 = $db_con->prepare("INSERT INTO POSSUI_TIPO_CONTATO_EVENTO(fk_TIPO_CONTATO_id_tipo_contato, fk_EVENTO_id_evento, 
                descricao) VALUES('', '$evento_id', '')");
                if ($consulta2->execute()) {
                    $resposta["sucesso"] = 1;
                }
                else {
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela POSSUI_TIPO_CONTATO_EVENTO: " . $consulta2->errorInfo()[2];
                }
            }

            if($formato === 'presencial'){
                if (isset($_POST['buffet_evento'])){
                    $buffet_evento = trim($_POST['buffet_evento']);

                    $consulta_buffet = $db_con->prepare("INSERT INTO buffet (buffet) VALUES('$buffet_evento')");
                    if ($consulta_buffet->execute()) {
                        $buffet_id = $db_con->lastInsertId();

                        $consulta3 = $db_con->prepare("UPDATE EVENTO_PRESENCIAL SET FK_buffet_buffet_PK = '$buffet_id' WHERE id_evento = 
                        '$evento_id'");
                        if ($consulta3->execute()) {
                            $resposta["sucesso"] = 1;
                        } 
                        else {
                            $resposta["sucesso"] = 0;
                            $resposta["erro"] = "Erro na atualizacao da tabela EVENTO_PRESENCIAL: " . $consulta3->errorInfo()[2];
                        }
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro na insercao da tabela buffet: " . $consulta_buffet->errorInfo()[2];
                    }
                }
                else{
                    $consulta_buffet = $db_con->prepare("INSERT INTO buffet (buffet) VALUES('')");
                    if ($consulta_buffet->execute()) {
                        $buffet_id = $db_con->lastInsertId();

                        $consulta3 = $db_con->prepare("UPDATE EVENTO_PRESENCIAL SET FK_buffet_buffet_PK = '' WHERE id_evento = 
                        '$evento_id'");
                        if ($consulta3->execute()) {
                            $resposta["sucesso"] = 1;
                        } 
                        else {
                            $resposta["sucesso"] = 0;
                            $resposta["erro"] = "Erro na atualizacao da tabela EVENTO_PRESENCIAL: " . $consulta3->errorInfo()[2];
                        }
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro na insercao da tabela buffet: " . $consulta_buffet->errorInfo()[2];
                    }
                }
            }
            else {
                // Caso 'formato' não seja 'presencial', defino um sucesso padrão
                $resposta["sucesso"] = 1; 
            }
        }
        else{
            // Se a requisicao foi feita incorretamente, ou seja, os parametros 
            // nao foram enviados corretamente para o servidor, o usuario 
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo requerido nao preenchido";
        }
    }
    else{
        // senha ou email nao confere
        $resposta["sucesso"] = 0;
        $resposta["error"] = "Email ou senha nao confere";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);

?>