<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();
    
    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)){

        if (isset($_GET["evento_id"])){

            $evento_id = $_GET['evento_id'];

            if($formato === 'online'){
                $consulta = $db_con->prepare("SELECT * FROM EVENTO_ONLINE
                INNER JOIN EVENTO ON EVENTO_ONLINE.FK_EVENTO_id_evento = EVENTO.id_evento
                WHERE EVENTO_ONLINE.FK_EVENTO_id_evento = '$evento_id';");
                if ($consulta->execute()) {
                    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                    $nome = $linha['nome'];
                    $privacidade_restrita = $linha['privacidade_restrita'];
                    $src_img = $linha['src_img'];
                    $data_prevista = $linha['data_prevista'];
                    $horario = $linha['horario'];
                    $objetivo = $linha['objetivo'];
                    $link = $linha['link'];
                    $FK_plataforma_plataforma_PK = $linha['FK_plataforma_plataforma_PK'];

                    $consulta2 = $db_con->prepare("SELECT plataforma FROM plataforma WHERE plataforma_PK = '$FK_plataforma_plataforma_PK'");
                    if($consulta2->execute()){
                        $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
                        $plataforma = $linha2['plataforma'];

                        $resposta["sucesso"] = 1;
                        $resposta["nome"] = $nome;
                        $resposta["privacidade_restrita"] = $privacidade_restrita;
                        $resposta["src_img"] = $src_img;
                        $resposta["data_prevista"] = $data_prevista;
                        $resposta["horario"] = $horario;
                        $resposta["objetivo"] = $objetivo;
                        $resposta["link"] = $link;
                        $resposta["plataforma"] = $plataforma;
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