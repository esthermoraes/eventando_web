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
        echo ("User: " . $user . "<br>");

        //$nome = $_POST["nome"];
        //$Nomesanitized = sanitizeString($nome);
        $nome = 'NOME DO EVENTO';
        echo ("Nome: " . $nome . "<br>");

        // $filename = $_FILES['imagem']['tmp_name'];
        // $client_id="373a5eedc23ad9b";
        // $handle = fopen($filename, "r");
        // $data = fread($handle, filesize($filename));
        // $pvars = array('image' => base64_encode($data));
        // $timeout = 30;
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        // curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        // $out = curl_exec($curl);
        // curl_close ($curl);
        // $pms = json_decode($out,true);
        $img_url = 'evento1.jpg';
        echo ("Imagem: " . $img_url . "<br>");

        $privacidade = $_POST["privacidade"];
        echo ("Privacidade: " . $privacidade . "<br>");

        $objetivo = $_POST["objetivo"];
        $Objetivosanitized = sanitizeString($objetivo);
        echo ("Objetivo: " . $Objetivosanitized . "<br>");

        $dataPrevista = $_POST["data_prevista"];
        echo ("Data: " . $dataPrevista . "<br>");

        $horario = $_POST["hotario"];
        echo ("Horario: " . $horario . "<br>");

        $atracoes = $_POST["atracoes"];
        $Atracoessanitized = sanitizeString($atracoes);
        echo ("Atracoes: " . $Atracoessanitized . "<br>");

        $evento = new Evento($nome, $Objetivosanitized, $dataPrevista, $horario, $img_url, $Atracoessanitized, $user);
        $evento->insert();
        $id_evento = $evento->getId();
        echo ("ID DO EVENTO: " . $id_evento . "<br>");
        
        $cep = $_POST["cep"];
        echo ("Cep: " . $cep . "<br>");

        $estado = $_POST["estado"];
        echo ("Estado: " . $estado . "<br>");

        $cidade = $_POST["cidade"];
        $Cidadesanitized = sanitizeString($cidade);
        echo ("Cidade: " . $Cidadesanitized . "<br>");

        $bairro = $_POST["bairro"];
        $Bairrosanitized = sanitizeString($bairro);
        echo ("Bairro: " . $Bairrosanitized . "<br>");

        $tipoLogradouro = $_POST["tipo_logradouro"];
        echo ("Tipo Logradouro: " . $tipoLogradouro . "<br>");

        $logradouro = $_POST["logradouro"];
        $Logradourosanitized = sanitizeString($logradouro);
        echo ("Logradouro: " . $Logradourosanitized . "<br>");

        $numero = $_POST["numero"];
        echo ("Numero: " . $numero . "<br>");

        $buffet = $_POST["buffet"];
        $Buffetsanitized = sanitizeString($buffet);
        echo ("Buffet: " . $Buffetsanitized . "<br>");

        $tipoContato = $_POST["tipo_contato"];
        echo ("Tipo Contato: " . $tipoContato . "<br>");

        $contato = $_POST["contato"];
        $Contatosanitized = sanitizeString($contato);
        echo ("Contato: " . $Contatosanitized . "<br>");

        $eventoP = new EventoPresencial($estado, $Cidadesanitized, $Bairrosanitized, $tipoLogradouro, $numero, $logradouro,
        $cep, $Buffetsanitized, $id_evento);
        $eventoP->insert();
    }   
?>