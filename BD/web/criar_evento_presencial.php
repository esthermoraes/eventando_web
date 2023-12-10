<?php
    include_once 'BD/web/evento_presencial.php';

    //Se a sessão não existir, então inicia a sessão
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function sanitizeString($input) {
        return preg_replace("/[^a-zA-Z0-9 ]/", "", $input);
    }

    // Verifica se foi enviado um arquivo
    if (isset($_POST["proximo_passo"])){
        $user = $_SESSION['email_txt'];
        // echo ("User: " . $user . "<br>");

        $nome = $_POST["nome"];
        // echo ("Nome: " . $nome . "<br>");

        $filename = $_FILES['imagem']['tmp_name'];
        $client_id = "373a5eedc23ad9b";

        $data = file_get_contents($filename);
        $base64 = base64_encode($data);

        $pvars = array('image' => $base64);
        $timeout = 30;

        $options = [
            'http' => [
                'header' => 'Authorization: Client-ID ' . $client_id,
                'method' => 'POST',
                'content' => http_build_query($pvars),
            ],
        ];

        $context = stream_context_create($options);
        $out = file_get_contents('https://api.imgur.com/3/image.json', false, $context);

        $pms = json_decode($out, true);
        if ($pms && isset($pms['data']['link'])) {
            $img_url = $pms['data']['link'];
            //echo ("Imagem: " . $img_url . "<br>");

        } else {
            $img_url = 'https://imgur.com/YXcvFRe.jpg';
        }

        $privacidade = $_POST["privacidade"];
        // echo ("Privacidade: " . $privacidade . "<br>");

        $objetivo = $_POST["objetivo"];
        // echo ("Objetivo: " . $objetivo . "<br>");

        $dataPrevista = $_POST["data_prevista"];
        // echo ("Data: " . $dataPrevista . "<br>");

        $horario = $_POST["hotario"];
        // echo ("Horario: " . $horario . "<br>");

        $atracoes = $_POST["atracoes"];
        // echo ("Atracoes: " . $atracoes . "<br>");
        
        $cep = $_POST["cep"];
        // echo ("Cep: " . $cep . "<br>");

        $estado = $_POST["estado"];
        // echo ("Estado: " . $estado . "<br>");

        $cidade = $_POST["cidade"];
        // echo ("Cidade: " . $cidade . "<br>");

        $bairro = $_POST["bairro"];
        // echo ("Bairro: " . $bairro . "<br>");

        $tipoLogradouro = $_POST["tipo_logradouro"];
        // echo ("Tipo Logradouro: " . $tipoLogradouro . "<br>");

        $logradouro = $_POST["logradouro"];
        // echo ("Logradouro: " . $logradouro . "<br>");

        $numero = $_POST["numero"];
        // echo ("Numero: " . $numero . "<br>");

        $buffet = $_POST["buffet"];
        // echo ("Buffet: " . $buffet . "<br>");

        $tipoContato = $_POST["tipo_contato"];
        // echo ("Tipo Contato: " . $tipoContato . "<br>");

        $contato = $_POST["contato"];
        // echo ("Contato: " . $contato . "<br>");

        $eventoP = new EventoPresencial($nome, $objetivo, $dataPrevista, $horario, $img_url, $atracoes, 
        $user, $buffet, $cep, $numero, $logradouro, $tipoLogradouro, $bairro, $cidade, $estado,
        $tipoContato, $contato);

        try{
            $eventoP->insert();
            echo "<script>alert('Evento criado com sucesso!');</script>";
            echo '<script>window.location.href = "menu.php";</script>';
            exit();
        }
        catch (Exception $e){
            echo "<script>alert('Erro ao criar evento. Tente novamente.');</script>";
        }
    }  
?>