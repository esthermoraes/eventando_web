<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_POST['nome_evento']) && isset($_POST['objetivo_evento']) && isset($_FILES['img_evento']) && 
            isset($_POST['data_prevista_evento']) && isset($_POST['horario_evento']) && isset($_POST['privacidade_evento']) 
            && isset($_POST['criador_evento'])) {
            
            // Obtenha o e-mail do criador do evento a partir do POST
            $criador_email = trim($_POST['criador_evento']);
            
            // Consulta SQL para obter o ID do criador com base no e-mail
            $sql = "SELECT id_usuario FROM USUARIO WHERE email = '$criador_email'";
            $consulta = $db_con->prepare($sql);
            $consulta->execute();
            
            if ($consulta->rowCount() > 0) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $criador_id = $linha ['id_usuario'];
                $nome_evento = trim($_POST['nome_evento']);
                $objetivo_evento = trim($_POST['objetivo_evento']);

                $filename = $_FILES['img_evento']['tmp_name'];
                $client_id="373a5eedc23ad9b";
                $handle = fopen($filename, "r");
                $data = fread($handle, filesize($filename));
                $pvars = array('image' => base64_encode($data));
                $timeout = 30;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
                curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
                $out = curl_exec($curl);
                curl_close ($curl);
                $pms = json_decode($out,true);
                $img_url=$pms['data']['link'];
                    
                $data_prevista_evento = trim($_POST['data_prevista_evento']);
                $data_prevista_evento2 = str_replace("/", "-", $data_prevista_evento);
                $data_prevista_evento3 = date('Y-m-d', strtotime($data_prevista_evento2));

                $horario_evento = trim($_POST['horario_evento']);
                $privacidade_evento = trim($_POST['privacidade_evento']);

                $consulta2 = $db_con->prepare("INSERT INTO EVENTO(nome, objetivo, src_img, data_prevista, horario, privacidade_restrita, 
                FK_USUARIO_id_usuario) VALUES('$nome_evento', '$objetivo_evento', '$img_url', '$data_prevista_evento3', '$horario_evento', 
                '$privacidade_evento', '$horario_evento', '$criador_id')");

                if ($consulta2->execute()) {
                    $evento_id = $db_con->lastInsertId(); // Obtém o ID do evento inserido

                    // Agora, aqui é onde o tipo de evento (online ou presencial) é determinado pelo usuário.
                    if (isset($_POST['formato_evento'])) {
                        $formato_evento = trim($_POST['formato_evento']);

                        if ($formato_evento === 'online') {
                            if (isset($_POST['link_evento']) && isset($_POST['plataforma_evento'])) {
                                $link_evento = trim($_POST['link_evento']);
                                $plataforma_evento = trim($_POST['plataforma_evento']);

                                $consulta_online = $db_con->prepare("INSERT INTO EVENTO_ONLINE(link, FK_plataforma_plataforma_PK, 
                                FK_EVENTO_id_evento) VALUES('$link_evento', '$plataforma_evento', '$evento_id')");
                                
                                if ($consulta_online->execute()) {
                                    $resposta["sucesso"] = 1;
                                    $resposta["evento_id"] = $evento_id;
                                } 
                                else {
                                    $resposta["sucesso"] = 0;
                                    $resposta["erro"] = "Erro na inserção na tabela EVENTO_ONLINE: " . $consulta_online->errorInfo()[2];
                                }
                            } 
                            else {
                                $resposta["sucesso"] = 0;
                                $resposta["erro"] = "Campos requeridos para evento online não preenchidos";
                            }
                        } 
                        else if ($formato_evento === 'presencial') {
                            if (isset($_POST['numero_evento']) && isset($_POST['logradouro_evento']) && isset($_POST['tipo_logradouro_evento'])
                            && isset($_POST['bairro_evento']) && isset($_POST['cidade_evento']) && isset($_POST['estado_evento'])
                            && isset($_POST['cep_evento'])) {
                                $numero_evento = trim($_POST['numero_evento']);
                                $logradouro_evento = trim($_POST['logradouro_evento']);
                                $tipo_logradouro_evento = trim($_POST['tipo_logradouro_evento']);
                                $bairro_evento = trim($_POST['bairro_evento']);
                                $cidade_evento = trim($_POST['cidade_evento']);
                                $estado_evento = trim($_POST['estado_evento']);
                                $cep_evento = trim($_POST['cep_evento']);

                                $consulta_cidade = $db_con->prepare("INSERT INTO CIDADE(descricao) VALUES('$cidade_evento') ON CONFLICT 
                                (CIDADE) DO NOTHING RETURNING id;");

                                if($consulta_cidade->execute()){
                                    // Usa fetchColumn para obter o valor retornado
                                    $id_cidade = $consulta_cidade->fetchColumn();
                                    
                                    $consulta_estado_cidade = $db_con->prepare("INSERT INTO POSSUI_CIDADE_ESTADO(fk_CIDADE_id_cidade, 
                                    fk_ESTADO_id_estado) VALUES('$id_cidade', '$estado_evento')");

                                    if($consulta_estado_cidade->execute()){
                                        $consulta_bairro = $db_con->prepare("INSERT INTO BAIRRO(descricao) VALUES('$bairro_evento') ON 
                                        CONFLICT (BAIRRO) DO NOTHING RETURNING id;");

                                        if($consulta_bairro->execute()){
                                            // Usa fetchColumn para obter o valor retornado
                                            $id_bairro = $consulta_bairro->fetchColumn();
                                            
                                            $consulta_cidade_bairro = $db_con->prepare("INSERT INTO POSSUI_BAIRRO_CIDADE(fk_BAIRRO_id_bairro, 
                                            fk_CIDADE_id_cidade) VALUES('$id_bairro', '$id_cidade')");

                                            if($consulta_cidade_bairro->execute()){
                                                $consulta_localizacao = $db_con->prepare("INSERT INTO LOCALIZACAO(numero, logradouro, cep, 
                                                FK_TIPO_LOGRADOURO_id_tipo_logradouro, FK_BAIRRO_id_bairro) VALUES('$numero_evento', 
                                                '$logradouro_evento', '$cep_evento', '$tipo_logradouro_evento', '$id_bairro')");

                                                if($consulta_localizacao->execute()){
                                                    $localizacao_id = $db_con->lastInsertId();

                                                    $consulta_presencial = $db_con->prepare("INSERT INTO EVENTO_PRESENCIAL
                                                    (FK_EVENTO_id_evento, FK_LOCALIZACAO_id_localizacao) VALUES('$evento_id',
                                                    '$localizacao_id')");
                                                    if ($consulta_presencial->execute()) {
                                                        $resposta["sucesso"] = 1;
                                                        $resposta["evento_id"] = $evento_id;
                                                    } 
                                                    else {
                                                        $resposta["sucesso"] = 0;
                                                        $resposta["erro"] = "Erro na inserção na tabela EVENTO_PRESENCIAL: " . $consulta_presencial->errorInfo()[2];
                                                    }
                                                }
                                                else{
                                                    $resposta["sucesso"] = 0;
                                                    $resposta["erro"] = "Erro na inserção na tabela LOCALIZACAO: " . $consulta_localizacao->errorInfo()[2];
                                                }
                                            }
                                            else{
                                                $resposta["sucesso"] = 0;
                                                $resposta["erro"] = "Erro na inserção na tabela POSSUI_BAIRRO_CIDADE: " . $consulta_cidade_bairro->errorInfo()[2];
                                            }
                                        }
                                        else{
                                            $resposta["sucesso"] = 0;
                                            $resposta["erro"] = "Erro na inserção na tabela BAIRRO: " . $consulta_bairro->errorInfo()[2];
                                        }
                                    }
                                    else{
                                        $resposta["sucesso"] = 0;
                                        $resposta["erro"] = "Erro na inserção na tabela POSSUI_CIDADE_ESTADO: " . $consulta_estado_cidade->errorInfo()[2];
                                    }
                                }
                                else{
                                    $resposta["sucesso"] = 0;
                                    $resposta["erro"] = "Erro na inserção na tabela CIDADE: " . $consulta_cidade->errorInfo()[2];
                                }     
                            } 
                            else {
                                $resposta["sucesso"] = 0;
                                $resposta["erro"] = "Campos requeridos para evento presencial não preenchidos";
                            }
                        }
                    } 
                    else {
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Campos requeridos para evento presencial ou online não preenchidos";
                    }
                }
                else {
                    // se houve erro na consulta para a tabela de evennto, indicamos que não houve sucesso
                    // na operação e o motivo no campo de erro.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela EVENTO: " . $consulta->errorInfo()[2];
                }
            } 
            else {
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "O email do criador do evento não foi encontrado.";
            }
        } 
        else {
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campos requeridos não preenchidos";
        }
    } 
    else {
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Email ou senha não conferem";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);

?>
