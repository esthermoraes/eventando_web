<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();

    // verifica se o usuário conseguiu autenticar
    if (autenticar($db_con)) {
        if (isset($_GET['evento_id'])){
            $evento_id = $_GET['evento_id'];

            if(isset($_POST['estilo_convite']) && isset($_POST['cor_convite']) && isset($_FILES['img_convite'])){
                $estilo_convite = trim($_POST['estilo_convite']);
                $cor_convite = trim($_POST['cor_convite']);

                $filename = $_FILES['img_convite']['tmp_name'];
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

                $consulta = $db_con->prepare("INSERT INTO CONVITE(estilo, cores, src_img, FK_EVENTO_id_evento) 
                VALUES('$estilo_convite', '$cor_convite', '$img_url', '$evento_id')");
                if($consulta->execute()){
                    $resposta["sucesso"] = 1;
                }
                else{
                    $resposta["sucesso"] = 0;
                    $resposta["erro"] = "Erro na inserção na tabela CONVITE: " . $consulta->errorInfo()[2];
                }
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Campos requeridos não preenchidos";
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