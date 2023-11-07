<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_GET['evento_id']) && isset($_GET['convite_id'])){
            $evento_id = $_GET['evento_id'];
            $convite_id = $_GET['convite_id'];

            $consulta = $db_con->prepare("SELECT nome FROM EVENTO WHERE id_evento = '$evento_id'");
            if ($consulta->execute()) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                $nome = $linha['nome'];

                if(isset($_POST['nome_convidado']) && isset($_POST['email_convidado'])){
                    $nome_convidado = trim($_POST['nome_convidado']);
                    $email_convidado = trim($_POST['email_convidado']);

                    $consulta2 = $db_con->prepare("INSERT INTO LISTA_CONVIDADOS(nome_convidado, email_convidado, FK_CONVITE_id_convite) 
                    VALUES('$nome_convidado', '$email_convidado', '$convite_id')");
                    if($consulta2->execute()){
                        $resposta["sucesso"] = 1;
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro na inserção na tabela LISTA_CONVIDADOS: " . $consulta2->errorInfo()[2];
                    }
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Campos requeridos não preenchidos";
                }
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
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