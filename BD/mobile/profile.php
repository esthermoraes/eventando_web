<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();
    
    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)){
     
        // Verifica se o parametro email foi enviado na requisicao
        if (isset($_GET["email"])){
            
            // Aqui sao obtidos os parametros
            $email = $_GET['email'];

            $consulta = $db_con->prepare("SELECT id_usuario, nome, email, data_nasc, FK_ESTADO_id_estado FROM USUARIO WHERE email 
            ='$email'");
            if ($consulta->execute()) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $linha['id_usuario'];
                $nome = $linha['nome'];
                $email = $linha['email'];
                $data_nasc = $linha['data_nasc'];
                $FK_ESTADO_id_estado = $linha['fk_estado_id_estado'];
                error_log("linha = ", 0);
                var_dump($linha);
                // var_dump($FK_ESTADO_id_estado);
                // var_dump($linha['fk_estado_id_estado']);

                $consulta2 = $db_con->prepare("SELECT descricao FROM TEM_TIPO_CONTATO_USUARIO WHERE fk_USUARIO_id_usuario = '$id_usuario'");
                if($consulta2->execute()){
                    $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
                    $telefone = $linha2['descricao'];
                    error_log("linha 2 = ", 0);
                    var_dump($linha2);

                    $consulta3 = $db_con->prepare("SELECT descricao FROM ESTADO WHERE id_estado = '$FK_ESTADO_id_estado'");
                    if($consulta3->execute()){
                        $linha3 = $consulta3->fetch(PDO::FETCH_ASSOC);
                        $estado = $linha3['descricao'];                
                        error_log("linha 3 = ", 0);
                        var_dump($linha3);
                        
                        $resposta["sucesso"] = 1;
                        $resposta["nome"] = $nome;
                        $resposta["email"] = $email;
                        $resposta["data_nasc"] = $data_nasc;
                        $resposta["telefone"] = $telefone;
                        $resposta["estado"] = $estado;
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro no BD: " . $consulta3->errorInfo()[2];
                    }
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro no BD: " . $consulta2->errorInfo()[2];
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
    error_log("resposta = ", 0);
    var_dump($resposta);
?>