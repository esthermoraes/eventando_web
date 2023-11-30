<?php
    include_once 'BD/web/evento_presencial.php';

    function sanitizeString($input) {
        return preg_replace("/[^a-zA-Z0-9 ]/", "", $input);
    }

    // Verifica se foi enviado um arquivo
    if (isset($_POST["proximo_passo"])){
        $user = $_POST[""];
        //$nome = $_POST["nome"];
        //$Nomesanitized = sanitizeString($nome);
        $nome = 'NOME';
        echo ("nome: " . $nome);

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
        echo ("imagem: " . $img_url);

        $privacidade = $_POST["privacidade"];
        echo ("imagem: " . $privacidade . " ");
        
        var_dump($_POST);

        $objetivo = $_POST["objetivo"];
        $Objetivosanitized = sanitizeString($objetivo);
        echo ("Objetivo: " . $Objetivosanitized . " ");

        $dataPrevista = $_POST["data_prevista"];
        echo ("Data: " . $dataPrevista . " ");

        $horario = $_POST["hotario"];
        echo ("horario: " . $horario . " ");

        $atracoes = $_POST["atracoes"];
        $Atracoessanitized = sanitizeString($atracoes);
        echo ("Atracoes: " . $Atracoessanitized . " ");

        $evento = new Evento($nome, $img_url, $Objetivosanitized, $dataPrevista, $horario, $Atracoessanitized);
        $evento->insert();

        // $id_evento = $evento.getId();
        // echo ("id: " . $id_evento . "           ");
        

        $cep = $_POST["cep"];
        echo ("cep: " . $cep . " ");

        $estado = $_POST["estado"];
        echo ("estado: " . $estado . " ");

        $cidade = $_POST["cidade"];
        $Cidadesanitized = sanitizeString($cidade);
        echo ("cidade: " . $Cidadesanitized . " ");

        $bairro = $_POST["bairro"];
        $Bairrosanitized = sanitizeString($bairro);
        echo ("bairro: " . $Bairrosanitized . " ");

        $tipoLogradouro = $_POST["tipo_logradouro"];
        echo ("tipoLogradouro: " . $tipoLogradouro . " ");

        $logradouro = $_POST["logradouro"];
        $Logradourosanitized = sanitizeString($logradouro);
        echo ("logradouro: " . $Logradourosanitized . " ");

        $numero = $_POST["numero"];
        echo ("numero: " . $numero . " ");

        $buffet = $_POST["buffet"];
        $Buffetsanitized = sanitizeString($buffet);
        echo ("buffet: " . $Buffetsanitized . " ");

        $tipoContato = $_POST["tipo_contato"];
        echo ("tipoContato: " . $tipoContato . " ");

        $contato = $_POST["contato"];
        $Contatosanitized = sanitizeString($contato);
        echo ("contato: " . $Contatosanitized . " ");

        //$eventoP = new EventoPresencial($cep, $estado, $Cidadesanitized, $Bairrosanitized, $tipoLogradouro, $numero, $Buffetsanitized, $tipoContato, $Contatosanitized);
    }   
?>