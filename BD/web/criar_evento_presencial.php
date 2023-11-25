<?php
    include_once 'BD/web/evento_presencial.php';

    // Verifica se foi enviado um arquivo
    if(!empty($_POST)){
        if (isset($_POST['nome_evento']) && isset($_POST['objetivo_evento']) && isset($_FILES['img_evento']) && 
        isset($_POST['data_prevista_evento']) && isset($_POST['horario_evento']) && isset($_POST['privacidade_evento']) 
        && isset($_POST['criador_evento'])) {

            // $filename = file_get_contents($_FILES['img_evento']['tmp_name']);
            $filename = $_FILES['imagem']['tmp_name'];
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
            var_dump($img_url);
        } 
        else {
            echo "Nenhum arquivo enviado.";
        }
    }   
?>