<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_POST['nome_evento']) && isset($_POST['objetivo_evento']) && isset($_FILES['img_evento']) && 
            isset($_POST['data_prevista_evento']) && isset($_POST['horario_evento']) && isset($_POST['privacidade_evento']) 
            && isset($_POST['criador_evento']) && isset($_POST['link_evento']) && isset($_POST['plataforma_evento'])) {
            
            // Obtenha o e-mail do criador do evento a partir do POST
            $criador_email = trim($_POST['criador_evento']);
            
            // Consulta SQL para obter o ID do criador com base no e-mail
            $sql = "SELECT id_usuario FROM USUARIO WHERE email = '$criador_email'";
            $consulta_criador_email = $db_con->prepare($sql);
            $consulta_criador_email->execute();
            
            if ($consulta_criador_email->rowCount() > 0) {
                $linha = $consulta_criador_email->fetch(PDO::FETCH_ASSOC);

                // O ID do criador do evento
                $criador_id = $linha['id_usuario'];
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

                $consulta_insert_evento_base = $db_con->prepare("INSERT INTO EVENTO(nome, objetivo, src_img, data_prevista, horario, privacidade_restrita, 
                FK_USUARIO_id_usuario) VALUES('$nome_evento', '$objetivo_evento', '$img_url', '$data_prevista_evento3', '$horario_evento', 
                '$privacidade_evento', '$criador_id')");

                if ($consulta_insert_evento_base->execute()) {
                    $evento_id = $db_con->lastInsertId(); // Obtém o ID do evento inserido

                    $link_evento = trim($_POST['link_evento']);
                    $plataforma_evento = trim($_POST['plataforma_evento']);

                    $consulta_insert_online = $db_con->prepare("INSERT INTO EVENTO_ONLINE(link, FK_plataforma_plataforma_PK, 
                    FK_EVENTO_id_evento) VALUES('$link_evento', '$plataforma_evento', '$evento_id')");
                    
                    if ($consulta_insert_online->execute()) {
                        $resposta["sucesso"] = 1;
                        $resposta["evento_id"] = $evento_id;
                    } 
                    else {
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro na inserção na tabela EVENTO_ONLINE: " . $consulta_insert_online->errorInfo()[2];
                    }
                }
                else {
                    // se houve erro na consulta para a tabela de evennto, indicamos que não houve sucesso
                    // na operação e o motivo no campo de erro.
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela EVENTO: " . $consulta_insert_evento_base->errorInfo()[2];
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
