<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();
    
    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)){
     
        // Verifica se o parametro id foi enviado na requisicao
        if (isset($_GET["email"])){
            
            // Aqui sao obtidos os parametros
            $email = $_GET['email'];

            $consulta = $db_con->prepare("SELECT id_usuario, nome, email, data_nasc, FK_ESTADO_id_estado FROM USUARIO WHERE email ='$email'");
            $consulta->execute();

            $linha = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $linha['id_usuario'];
            $nome = $linha['nome'];
            $email = $linha['email'];
            $data_nasc = $linha['data_nasc'];
            $FK_ESTADO_id_estado = $linha['FK_ESTADO_id_estado'];

            if ($consulta->execute()) {
                $consulta2 = $db_con->prepare("SELECT descricao FROM TEM_TIPO_CONTATO_USUARIO WHERE fk_USUARIO_id_usuario = '$id_usuario'");
                $consulta2->execute();

                $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
                $descricao = $linha2['descricao'];
                
                if($consulta2->execute()){
                    $resposta["sucesso"] = 1;
                    $resposta["nome"] = $nome;
                    $resposta["email"] = $email;
                    $resposta["data_nasc"] = $data_nasc;
                    $resposta["estado"] = $descricao;
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro no BD: " . $consulta->error;
                }
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no BD: " . $consulta->error;
            }
        }
        else{
            // Se a requisicao foi feita incorretamente, ou seja, os parametros 
            // nao foram enviados corretamente para o servidor, o cliente 
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo requerido não preenchido";
        }
    }
    else{
        // senha ou usuario nao confere
        $resposta["sucesso"] = 0;
        $resposta["error"] = "Email ou senha não confere";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>